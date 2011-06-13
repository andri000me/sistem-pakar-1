<?
class Ciri extends Controller {
	function Ciri () {
		parent::Controller();
		$this->load->library('session');
		$this->load->helper('proc_helper');
		$this->load->model('Ciri_model');
		if(!$this->session->userdata('id_user') && !$this->session->userdata('user_display') ):
			redirect('admin');
		endif;
	}
	
	function index() 
	{
		$this->load->library('pagination');
		$offset = $this->uri->segment(4);
		$config['base_url'] = site_url().'/admin/ciri/index';
		$config['total_rows'] = count($this->Ciri_model->getCiri('all',FALSE,FALSE,FALSE));
		$config['per_page'] = $this->config->item('per_page');
		$config['uri_segment'] = '4';
		
		$data['urut'] = $this->uri->segment(4);
		$data['title'] = 'Data Ciri';
		$data['query'] = $this->Ciri_model->getCiri('all',FALSE,$config['per_page'],$offset);
		$data['main_view'] = 'admin/ciri/index';
		$this->pagination->initialize($config);
		$this->load->view('admin/index',$data);
	}
	
	function add_ciri() 
	{
		$this->form_validation->set_rules('kode_ciri', 'Kode Ciri','required');
		$this->form_validation->set_rules('nm_ciri', 'Nama Ciri','required');
		
		if($this->form_validation->run() == FALSE)
		{
			$id_ciri = $this->uri->segment(4);
			$data['title'] = 'Data Penyakit';
			$data['get_code'] = getGenerateCode('tb_ciri','id_ciri');
			$data['query'] = $this->Ciri_model->getCiri(FALSE,$id_ciri,FALSE,FALSE);
			$data['main_view'] = 'admin/ciri/add_ciri';
			$this->load->view('admin/index',$data);
		}
		else
		{
			$new_id = getNewId('tb_ciri','id_ciri');
			if(empty($_FILES['gbr_ciri']['name']))
			{
				$data = array(
							'id_ciri'=>$new_id,
							'kode_ciri'=>$this->input->post('kode_ciri'),
							'nm_ciri'=>$this->input->post('nm_ciri'),
							'kode_bagian' =>$this->input->post('kode_bagian'),
							'gbr_ciri' =>''
							);
				$this->Ciri_model->addCiri($data);
				$count = count($this->Ciri_model->getCiri('all',FALSE,FALSE,FALSE));
					/////////get last page from helpeerrr
				getPage('ciri','new',FALSE,$count);
			}
			else
			{
				$this->load->helper('file');
				$config['upload_path'] = './uploads/';
				$config['allowed_types'] = 'jpg';
				$config['max_size'] = 800;
				$config['max_width'] = 800;
				$config['max_height'] = 600;
				$this->load->library('upload', $config);
				if (!$this->upload->do_upload('gbr_ciri'))
				{
					$this->session->set_flashdata('message_type','<div id="kotak">Data Gagal disimpan <br />Ukuran gambar terlalu besar</div>');
					redirect('admin/ciri/add_ciri');
				}
				else
				{
					$uploaded_file = array('upload_data' => $this->upload->data());
					$file_uploaded = $uploaded_file['upload_data']['file_name'];
					$file_ext = $uploaded_file['upload_data']['file_ext'];
					$data = array(
							'id_ciri'=>$new_id,
							'kode_ciri'=>$this->input->post('kode_ciri'),
							'nm_ciri'=>$this->input->post('nm_ciri'),
							'kode_bagian' =>$this->input->post('kode_bagian'),
							'gbr_ciri' =>$file_uploaded
							);
					$this->Ciri_model->addCiri($data);
					$count = count($this->Ciri_model->getCiri('all',FALSE,FALSE,FALSE));
						/////////get last page from helpeerrr
					getPage('ciri','new',FALSE,$count);
				}
			}
		}
	}
	
	function edit_ciri() 
	{
		$this->form_validation->set_rules('kode_ciri', 'Kode Penyakit','required');
		$this->form_validation->set_rules('nm_ciri', 'Nama Penyakit','required');
		
		if($this->form_validation->run() == FALSE)
		{
			$id_ciri = $this->uri->segment(4);
			$data['title'] = 'Edit Data Ciri';
			$data['query'] = $this->Ciri_model->getCiri(FALSE,$id_ciri,FALSE,FALSE);
			$data['main_view'] = 'admin/ciri/edit_ciri';
			$this->load->view('admin/index',$data);
		}
		else
		{
			$id_ciri = $this->uri->segment(4);
			$uri = $this->uri->segment(5);
			if(empty($_FILES['gbr_ciri']['name']))
			{
				$data = array(
							'kode_ciri'=>$this->input->post('kode_ciri'),
							'nm_ciri'=>$this->input->post('nm_ciri'),
							'kode_bagian' =>$this->input->post('kode_bagian'),
							);
				$this->Ciri_model->editCiri($id_ciri,$data);
				$count = count($this->Ciri_model->getCiri('all',FALSE,FALSE,FALSE));
					/////////get last page from helpeerrr
				getPage('ciri','edit',$uri,FALSE);
			}
			else
			{
				$this->load->helper('file');
				$config['upload_path'] = './uploads/';
				$config['allowed_types'] = 'jpg';
				$config['max_size'] = 800;
				$config['max_width'] = 800;
				$config['max_height'] = 600;
				$this->load->library('upload', $config);
				if (!$this->upload->do_upload('gbr_ciri'))
				{
					$this->session->set_flashdata('message_type','<div id="kotak">Data Gagal disimpan <br />Ukuran gambar terlalu besar</div>');
					redirect('admin/ciri/edit_ciri');
				}
				else
				{
					if ($this->Ciri_model->getCiri(FALSE,$id_ciri,FALSE,FALSE)->gbr_ciri != ''):
						unlink(FCPATH.'/uploads/'.$this->Ciri_model->getCiri(FALSE,$id_ciri,FALSE,FALSE)->gbr_ciri);
					endif;
					$uploaded_file = array('upload_data' => $this->upload->data());
					$file_uploaded = $uploaded_file['upload_data']['file_name'];
					$file_ext = $uploaded_file['upload_data']['file_ext'];
					$data = array(
							'kode_ciri'=>$this->input->post('kode_ciri'),
							'nm_ciri'=>$this->input->post('nm_ciri'),
							'kode_bagian' =>$this->input->post('kode_bagian'),
							'gbr_ciri' =>$file_uploaded
							);
					$this->Ciri_model->editCiri($id_ciri,$data);
					
						/////////get last page from helpeerrr
					getPage('ciri','edit',$uri,FALSE);
				}
			}
		}
	}
	
	function delete_ciri()
	{
		$id_ciri = $this->uri->segment(4);
		$uri = $this->uri->segment(5);
		if ($this->Ciri_model->getCiri(FALSE,$id_ciri,FALSE,FALSE)->gbr_ciri!=''):
			unlink(FCPATH.'/uploads/'.$this->Ciri_model->getCiri(FALSE,$id_ciri,FALSE,FALSE)->gbr_ciri);// hapus gambarnya
			$this->Ciri_model->deleteCiri($id_ciri);
		else:
			$this->Ciri_model->deleteCiri($id_ciri);
		endif;
		$count = count($this->Ciri_model->getCiri('all',FALSE,FALSE,FALSE));
		getPage('ciri','delete',$uri,$count);
	}
	function delete_image()
	{
		$id = $this->uri->segment(4);
		if ($this->Ciri_model->getCiri(FALSE,$id,FALSE,FALSE)->gbr_ciri != ''):
			unlink(FCPATH.'/uploads/'.$this->Ciri_model->getCiri(FALSE,$id,FALSE,FALSE)->gbr_ciri);
			$data = array (
								'gbr_ciri'=>''
								);
			$this->Ciri_model->editCiri($id,$data);
		else:
			$data = array (
								'gbr_ciri'=>''
								);
			$this->Ciri_model->editCiri($id,$data);
		endif;
		redirect('admin/ciri/edit_ciri/'.$id);
	}
}
?>