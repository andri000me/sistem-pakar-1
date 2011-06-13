<?php
class Silang extends Controller {
	function Silang() {
		parent::Controller();
		$this->load->library('session');
		$this->load->model('Silang_model');
		$this->load->model('Jenis_model');
		$this->load->helper('proc_helper');
		if(!$this->session->userdata('id_user') && !$this->session->userdata('user_display') ):
			redirect('admin');
		endif;
	}
	
	function index() 
	{
		$this->load->library('pagination');
		$offset = $this->uri->segment(4);
		$config['base_url'] = site_url().'/admin/silang/index';
		$config['total_rows'] = count($this->Silang_model->getSilang('all',FALSE,FALSE,FALSE));
		$config['per_page'] = $this->config->item('per_page');
		$config['uri_segment'] = '4';

		$data['urut'] = $this->uri->segment(4);
		$data['title'] = 'DataPerkawinan Silang';
		$data['query'] = $this->Silang_model->getSilang('all',FALSE,$config['per_page'],$offset);
		$data['main_view'] = 'admin/silang/index';
		$this->pagination->initialize($config);
		$this->load->view('admin/index',$data);
	}
	
	function add_silang() 
	{
		$this->form_validation->set_rules('kelj', 'Jantan','required');
		$this->form_validation->set_rules('kelb', 'Betina','required');
		$this->form_validation->set_rules('hasil', 'Anakan','required');
		
		if($this->form_validation->run() == FALSE)
		{
			$this->load->library('pagination');
			$offset = $this->uri->segment(4);
			$config['base_url'] = site_url().'/admin/silang/add_silang';
			$config['total_rows'] = count($this->Jenis_model->getJenis('anakan',FALSE,FALSE,FALSE));
			$config['per_page'] = $this->config->item('per_page');
			$config['uri_segment'] = '4';
			
			$data['urut'] = $this->uri->segment(4);
			$data['title'] = 'Tambah Perkawinan Silang';
			$data['query'] = $this->Jenis_model->getJenis('anakan',FALSE,$config['per_page'],$offset);
			$data['main_view'] = 'admin/silang/add_silang';
			$this->pagination->initialize($config);
			$this->load->view('admin/index',$data);
		}
		else
		{
			////////////// explod yang sangat memaksa hahha...
			$j = explode("-",$this->input->post('kelj'));
			$kdj = $j[0];
			$nmj = $j[1];
			
			$b = explode("-",$this->input->post('kelb'));
			$kdb = $b[0];
			$nmb = $b[1];
			
			$new_id = getNewId('tb_kawin_silang','id_silang');
			
			$qr = $this->db->where('kode_jantan',$kdj);
			$qr = $this->db->where('kode_betina',$kdb);
			$qr = $this->db->get('tb_kawin_silang');
			
			if($qr->num_rows() == 0)
			{
				$data = array(
							'id_silang'=>$new_id,
							'kode_jantan'=>$kdj,
							'kode_betina'=>$kdb,
							'kode_hasil'=>implode(".",$this->input->post('hasil')),
							'keterangan'=>$this->input->post('keterangan')
							);
				$this->Silang_model->addSilang($data);
				$count = count($this->Silang_model->getSilang('all',FALSE,FALSE,FALSE));
				$this->session->set_flashdata('message_type','<div id="kotak">Data Berhasil disimpan</div>');
				getPage('silang','new',FALSE,$count);
			}
			else
			{
				$this->session->set_flashdata('message_type','<div id="kotak">Data Sudah Ada, Silahkan Masukan Jenis Yang Lain</div>');
				redirect('admin/silang/add_silang');
			}
		}
	}
	
	function edit_silang() 
	{
		$this->form_validation->set_rules('kelj', 'Jenis','required');
		$this->form_validation->set_rules('kelb', 'Jenis','required');
		$this->form_validation->set_rules('hasil', 'Anakan','required');
		
		if($this->form_validation->run() == FALSE)
		{
			$id_silang = $this->uri->segment(4);
			$data['title'] = 'Edit Data Kawin Silang';
			$data['query'] = $this->Silang_model->getSilang(FALSE,$id_silang,FALSE,FALSE);
			$data['query2'] = fetchRow("tb_jenis","WHERE tipe='anakan'","*");//wew its from helper..
			$data['main_view'] = 'admin/silang/edit_silang';
			$this->load->view('admin/index',$data);
		}
		else
		{
			////////////// explod yang sangat memaksa hahha...
			$j = explode("-",$this->input->post('kelj'));
			$kdj = $j[0];
			$nmj = $j[1];
			
			$b = explode("-",$this->input->post('kelb'));
			$kdb = $b[0];
			$nmb = $b[1];
			$id_silang = $this->uri->segment(4);
			
			$query = $this->db->where('id_silang',$id_silang);
			$query = $this->db->get('tb_kawin_silang');
			$res = $query->row();
			
			if(($res->kode_jantan == $kdj) && ($res->kode_betina == $kdb))
			{
				$data = array(
							'kode_jantan'=>$kdj,
							'kode_betina'=>$kdb,
							'kode_hasil'=>implode(".",$this->input->post('hasil')),
							'keterangan'=>$this->input->post('keterangan')
							);
				$this->Silang_model->editSilang($id_silang,$data);
				$uri = $this->uri->segment(5);
				$this->session->set_flashdata('message_type','<div id="kotak">Data Berhasil disimpan</div>');
				getPage('silang','edit',$uri,FALSE);
			}
			else
			{
				$qr = $this->db->where('kode_jantan',$kdj);
				$qr = $this->db->where('kode_betina',$kdb);
				$qr = $this->db->get('tb_kawin_silang');

				if($qr->num_rows() == 0)
				{
					$data = array(
								'kode_jantan'=>$kdj,
								'kode_betina'=>$kdb,
								'kode_hasil'=>implode(".",$this->input->post('hasil')),
								'keterangan'=>$this->input->post('keterangan')
								);
					$this->Silang_model->editSilang($id_silang,$data);
					$uri = $this->uri->segment(5);
					$this->session->set_flashdata('message_type','<div id="kotak">Data Berhasil disimpan</div>');
					getPage('silang','edit',$uri,FALSE);
				}
				else
				{
					$uri = $this->uri->segment(5);
					$this->session->set_flashdata('message_type','<div id="kotak">Data Sudah Ada, Silahkan Masukan Jenis Yang Lain</div>');
					redirect('admin/silang/edit_silang/'.$id_silang.'/'.$uri);
				}
			}
		}
	}
	
	function delete_silang()
	{
		$id_silang = $this->uri->segment(4);
		
		$this->Silang_model->deleteSilang($id_silang);
		////get item delete page
		$count = count($this->Silang_model->getSilang('all',FALSE,FALSE,FALSE));
		getPage('silang','delete',FALSE,$count);
		
	}
}
?>