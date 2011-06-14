<?
class Rek_penyakit extends Controller {
	function Rek_penyakit() {
		parent::Controller();
		$this->load->library('session');
		$this->load->helper('proc_helper');
		$this->load->model('Penyakit_model');
		$this->load->model('Rekpenyakit_model');
		$this->load->model('Konsultasi_model');
		$this->load->model('Penyebab_model');
		//$this->load->model('Obat_model');
		if(!$this->session->userdata('id_user') && !$this->session->userdata('user_display') ):
			redirect('admin');
		endif;
		
	}
	
	function index() 
	{
		$this->load->library('pagination');
		$offset = $this->uri->segment(4);
		$config['base_url'] = site_url().'/admin/rek_penyakit/index';
		$config['total_rows'] = count($this->Rekpenyakit_model->getRekpenyakit('all',FALSE,FALSE,FALSE));
		$config['per_page'] = $this->config->item('per_page');
		$config['uri_segment'] = '4';
		
		$data['urut'] = $this->uri->segment(4);
		$data['title'] = 'Data Rekomendasi Penyakit';
		$data['query'] = $this->Rekpenyakit_model->getRekpenyakit('all',FALSE,$config['per_page'],$offset);
		$data['main_view'] = 'admin/rek_penyakit/index';
		$this->pagination->initialize($config);
		$this->load->view('admin/index',$data);
	}
	
	
	function add_rek_penyakit()
	{
		
		$this->form_validation->set_rules('kode_penyakit', 'Kode Penyakit','required');
		$this->form_validation->set_rules('kode_gejala', 'Kode Gejala','required');
		$this->form_validation->set_rules('kode_penyebab', 'Kode Penyebab','required');
		//$this->form_validation->set_rules('kode_obat', 'Kode Obat','required');
		
		if($this->form_validation->run() == FALSE)
		{
			$data['gejala1'] = $this->Konsultasi_model->getGejalaPenyakit('byKodeBag','B001');
			$data['gejala2'] = $this->Konsultasi_model->getGejalaPenyakit('byKodeBag','B002');
			$data['gejala3'] = $this->Konsultasi_model->getGejalaPenyakit('byKodeBag','B003');
			$data['gejala4'] = $this->Konsultasi_model->getGejalaPenyakit('byKodeBag','B004');
			//$data['gejala5'] = $this->Konsultasi_model->getGejalaPenyakit('byKodeBag','B005');
			
			$data['query1'] = $this->Penyebab_model->getPenyebab('all',FALSE,FALSE,FALSE);
			//$data['query2'] = $this->Obat_model->getObat('all',FALSE,FALSE,FALSE);
		
			$data['title'] = 'Data Rekomendasi Penyakit';
			$data['main_view'] = 'admin/rek_penyakit/add_rek_penyakit';
			$this->load->view('admin/index',$data);	
		}
		else
		{
			
			$data = array(
						'kode_gejala'=> implode(".",$this->input->post('kode_gejala')),
						'kode_penyakit'=>$this->input->post('kode_penyakit'),
						'kode_penyebab' => implode(".",$this->input->post('kode_penyebab')),
						//'kode_obat' => implode(".",$this->input->post('kode_obat'))
						);
			
			$this->Rekpenyakit_model->addRekpenyakit($data);
			$this->session->set_flashdata('message_type','<div id="kotak">Data Berhasil disimpan</div>');
			$count = count($this->Rekpenyakit_model->getRekpenyakit('all',FALSE,FALSE,FALSE));
			getPage('rek_penyakit','new',FALSE,$count);
		
		}
	}
	
	function edit_rek_penyakit()
	{
		
		$this->form_validation->set_rules('kode_penyakit', 'Kode Gejala','required');
		$this->form_validation->set_rules('kode_gejala', 'Kode Gejala','required');
		$this->form_validation->set_rules('kode_penyebab', 'Kode Gejala','required');
	//	$this->form_validation->set_rules('kode_obat', 'Kode Gejala','required');
		
		if($this->form_validation->run() == FALSE)
		{
			$id = $this->uri->segment(4);
			
			$data['qrrow'] = $this->Rekpenyakit_model->getRekpenyakit(FALSE,$id,FALSE,FALSE);
			
			$data['datamenu1'] = fetchRow("tb_gejala","WHERE kode_bagian='B001'","*");//wew its from helper..
			$data['datamenu2'] = fetchRow("tb_gejala","WHERE kode_bagian='B002'","*");
			$data['datamenu3'] = fetchRow("tb_gejala","WHERE kode_bagian='B003'","*");
			$data['datamenu4'] = fetchRow("tb_gejala","WHERE kode_bagian='B004'","*");
			//$data['datamenu5'] = fetchRow("tb_gejala","WHERE kode_bagian='B005'","*");
			
			$data['query1'] = fetchRow("tb_penyebab","","*");
			//$data['query2'] = fetchRow("tb_obat","","*");
		
			$data['title'] = 'Data Rekomendasi Penyakit';
			$data['main_view'] = 'admin/rek_penyakit/edit_rek_penyakit';
			$this->load->view('admin/index',$data);	
		}
		else
		{
			$id = $this->uri->segment(4);
			$data = array(
						'kode_gejala'=> implode(".",$this->input->post('kode_gejala')),
						'kode_penyakit'=>$this->input->post('kode_penyakit'),
						'kode_penyebab' => implode(".",$this->input->post('kode_penyebab')),
						//'kode_obat' => implode(".",$this->input->post('kode_obat'))
						);
			
			$this->Rekpenyakit_model->editRekpenyakit($id,$data);
			$this->session->set_flashdata('message_type','<div id="kotak">Data Berhasil disimpan</div>');
			$uri = $this->uri->segment(5);
			getPage('rek_penyakit','edit',$uri,FALSE);
		
		}
	}
	
	function delete_rek_penyakit()
	{
		$id = $this->uri->segment(4);
		$this->Rekpenyakit_model->deleteRekpenyakit($id);
		$this->session->set_flashdata('message_type','<div id="kotak">Data Berhasil dihapus</div>');
		////get item delete page
		$count = count($this->Rekpenyakit_model->getRekpenyakit('all',FALSE,FALSE,FALSE));
		$uri = $this->uri->segment(5);
		getPage('rek_penyakit','delete',$uri,$count);
	}
}
?>