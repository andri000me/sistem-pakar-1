<?
class Penyakit extends Controller {
	function Penyakit() {
		parent::Controller();
		$this->load->library('session');
		$this->load->model('Penyakit_model');
		$this->load->helper('proc_helper');
		if(!$this->session->userdata('id_user') && !$this->session->userdata('user_display') ):
			redirect('admin');
		endif;
	}
	
	function index() 
	{
		$this->load->library('pagination');
		$offset = $this->uri->segment(4);
		$config['base_url'] = site_url().'/admin/penyakit/index';
		$config['total_rows'] = count($this->Penyakit_model->getPenyakit('all',FALSE,FALSE,FALSE));
		$config['per_page'] = $this->config->item('per_page');
		$config['uri_segment'] = '4';
		
		$data['urut'] = $this->uri->segment(4);
		$data['title'] = 'Data Penyakit';
		$data['query'] = $this->Penyakit_model->getPenyakit('all',FALSE,$config['per_page'],$offset);
		$data['main_view'] = 'admin/penyakit/index';
		$this->pagination->initialize($config);
		$this->load->view('admin/index',$data);
	}
	
	function add_penyakit() 
	{
		$this->form_validation->set_rules('kode_penyakit', 'Kode Penyakit','required');
		$this->form_validation->set_rules('nm_penyakit', 'Nama Penyakit','required');
		$this->form_validation->set_rules('obat', 'Cara Penanggulangan','required');
		
		if($this->form_validation->run() == FALSE)
		{
			$id_gej = $this->uri->segment(4);
			$data['title'] = 'Data Penyakit';
			$data['get_code'] = getGenerateCode('tb_penyakit','id_penyakit');
			$data['query'] = $this->Penyakit_model->getPenyakit(FALSE,$id_gej,FALSE,FALSE);
			$data['main_view'] = 'admin/penyakit/add_penyakit';
			$this->load->view('admin/index',$data);
		}
		else
		{
			$new_id = getNewId('tb_penyakit','id_penyakit');
			if(empty($_FILES['gbr_penyakit']['name']))
			{
				$data = array(
							'id_penyakit'=>$new_id,
							'kode_penyakit'=>$this->input->post('kode_penyakit'),
							'nm_penyakit'=>$this->input->post('nm_penyakit'),
							'obat'=>$this->input->post('obat'),
							'keterangan' =>$this->input->post('keterangan')
							);
				$this->Penyakit_model->addPenyakit($data);
				$count = count($this->Penyakit_model->getPenyakit('all',FALSE,FALSE,FALSE));
				getPage('penyakit','new',FALSE,$count);
			}
			else
			{
				$this->load->helper('file');
				$config['upload_path'] = './uploads/';
				$config['allowed_types'] = 'jpg';
				$config['max_size'] = 2048;
				$config['max_width'] = 800;
				$config['max_height'] = 600;
				$this->load->library('upload', $config);
				if (!$this->upload->do_upload('gbr_penyakit'))
				{
					$this->session->set_flashdata('message_type','<div id="kotak">Data Gagal disimpan <br />Ukuran gambar terlalu besar</div>');
					redirect('admin/penyakit/add_penyakit');
				}
				else
				{
					$uploaded_file = array('upload_data' => $this->upload->data());
					$file_uploaded = $uploaded_file['upload_data']['file_name'];
					$file_ext = $uploaded_file['upload_data']['file_ext'];
					$data = array(
							'id_penyakit'=>$new_id,
							'kode_penyakit'=>$this->input->post('kode_penyakit'),
							'nm_penyakit'=>$this->input->post('nm_penyakit'),
							'obat'=>$this->input->post('obat'),
							'keterangan' =>$this->input->post('keterangan'),
							'gbr_penyakit' =>$file_uploaded,
							);
					$this->Penyakit_model->addPenyakit($data);
					$count = count($this->Penyakit_model->getPenyakit('all',FALSE,FALSE,FALSE));
					getPage('penyakit','new',FALSE,$count);
			
				}
			}
		}
	}
	
	function edit_penyakit() 
	{
		$this->form_validation->set_rules('kode_penyakit', 'Kode Penyakit','required');
		$this->form_validation->set_rules('nm_penyakit', 'Nama Penyakit','required');
		$this->form_validation->set_rules('obat', 'Cara Penanggulangan','required');
		
		if($this->form_validation->run() == FALSE)
		{
			$id_peny = $this->uri->segment(4);
			$data['title'] = 'Edit Data Penyakit';
			$data['query'] = $this->Penyakit_model->getPenyakit(FALSE,$id_peny,FALSE,FALSE);
			$data['main_view'] = 'admin/penyakit/edit_penyakit';
			$this->load->view('admin/index',$data);
		}
		else
		{
			$id_peny = $this->uri->segment(4);
			if(empty($_FILES['gbr_penyakit']['name']))
			{
				$data = array(
							'kode_penyakit'=>$this->input->post('kode_penyakit'),
							'nm_penyakit'=>$this->input->post('nm_penyakit'),
							'obat'=>$this->input->post('obat'),
							'keterangan' =>$this->input->post('keterangan')
							);
				$this->Penyakit_model->editPenyakit($id_peny,$data);
				////get edit page
				$uri = $this->uri->segment(5);
				getPage('penyakit','edit',$uri,FALSE);
			}
			else
			{
				$this->load->helper('file');
				$config['upload_path'] = './uploads/';
				$config['allowed_types'] = 'jpg';
				$config['max_size'] = 2048;
				$config['max_width'] = 800;
				$config['max_height'] = 600;
				$this->load->library('upload', $config);
				if (!$this->upload->do_upload('gbr_penyakit'))
				{
					$this->session->set_flashdata('message_type','<div id="kotak">Data Gagal disimpan <br />Ukuran gambar terlalu besar</div>');
					redirect('admin/penyakit/edit_penyakit');
				}
				else
				{
					$uploaded_file = array('upload_data' => $this->upload->data());
					$file_uploaded = $uploaded_file['upload_data']['file_name'];
					$file_ext = $uploaded_file['upload_data']['file_ext'];
					
					$data = array(
							'kode_penyakit'=>$this->input->post('kode_penyakit'),
							'nm_penyakit'=>$this->input->post('nm_penyakit'),
							'obat'=>$this->input->post('obat'),
							'keterangan' =>$this->input->post('keterangan'),
							'gbr_penyakit' =>$file_uploaded
							);
					$this->Penyakit_model->editPenyakit($id_peny,$data);
					////get edit page
					$uri = $this->uri->segment(5);
					getPage('penyakit','edit',$uri,FALSE);
					
				}
			}
		}
	}
	
	function delete_penyakit()
	{
		$id_peny = $this->uri->segment(4);
		
		$this->Penyakit_model->deletePenyakit($id_peny);
		////get item delete page
		$uri = $this->uri->segment(5);
		$count = count($this->Penyakit_model->getPenyakit('all',FALSE,FALSE,FALSE));
		getPage('penyakit','delete',$uri,$count);
	}
	function delete_image()
	{
		$id = $this->uri->segment(4);
		if ($this->Penyakit_model->getPenyakit(FALSE,$id,FALSE,FALSE)->gbr_penyakit != ''):
			unlink(FCPATH.'/uploads/'.$this->Penyakit_model->getPenyakit(FALSE,$id,FALSE,FALSE)->gbr_penyakit);
			$data = array (
								'gbr_penyakit'=>''
								);
			$this->Penyakit_model->editPenyakit($id,$data);
		else:
			$data = array (
								'gbr_penyakit'=>''
								);
			$this->Penyakit_model->editPenyakit($id,$data);
		endif;
		redirect('admin/penyakit/edit_penyakit/'.$id);
	}
}
?>