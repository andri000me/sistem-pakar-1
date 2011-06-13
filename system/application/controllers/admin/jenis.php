<?
class Jenis extends Controller {
	function Jenis () {
		parent::Controller();
		$this->load->library('session');
		$this->load->helper('proc_helper');
		$this->load->model('Jenis_model');
		if(!$this->session->userdata('id_user') && !$this->session->userdata('user_display') ):
			redirect('admin');
		endif;
	}
	
	function index() 
	{
		$this->load->library('pagination');
		$offset = $this->uri->segment(4);
		$config['base_url'] = site_url().'/admin/jenis/index';
		$config['total_rows'] = count($this->Jenis_model->getJenis('all',FALSE,FALSE,FALSE));
		$config['per_page'] = $this->config->item('per_page');
		$config['uri_segment'] = '4';
		
		$data['urut'] = $this->uri->segment(4);
		$data['title'] = 'Data Jenis';
		$data['query'] = $this->Jenis_model->getJenis('all',FALSE,$config['per_page'],$offset);
		$data['main_view'] = 'admin/jenis/index';
		$this->pagination->initialize($config);
		$this->load->view('admin/index',$data);
	}
	
	function indukan() 
	{
		$this->load->library('pagination');
		$offset = $this->uri->segment(4);
		$config['base_url'] = site_url().'/admin/jenis/indukan';
		$config['total_rows'] = count($this->Jenis_model->getJenis('indukan',FALSE,FALSE,FALSE));
		$config['per_page'] = $this->config->item('per_page');
		$config['uri_segment'] = '4';
		
		$data['urut'] = $this->uri->segment(4);
		$data['title'] = 'Data Jenis';
		$data['query'] = $this->Jenis_model->getJenis('indukan',FALSE,$config['per_page'],$offset);
		$data['main_view'] = 'admin/jenis/indukan';
		$this->pagination->initialize($config);
		$this->load->view('admin/index',$data);
	}
	
	function anakan() 
	{
		$this->load->library('pagination');
		$offset = $this->uri->segment(4);
		$config['base_url'] = site_url().'/admin/jenis/anakan';
		$config['total_rows'] = count($this->Jenis_model->getJenis('anakan',FALSE,FALSE,FALSE));
		$config['per_page'] = $this->config->item('per_page');
		$config['uri_segment'] = '4';
		
		$data['urut'] = $this->uri->segment(4);
		$data['title'] = 'Data Jenis';
		$data['query'] = $this->Jenis_model->getJenis('anakan',FALSE,$config['per_page'],$offset);
		$data['main_view'] = 'admin/jenis/anakan';
		$this->pagination->initialize($config);
		$this->load->view('admin/index',$data);
	}
	
	function add_jenis() 
	{
		$this->form_validation->set_rules('kode_jenis', 'Kode Jenis','required');
		$this->form_validation->set_rules('nm_jenis', 'Nama Jenis','required');

		
		if($this->form_validation->run() == FALSE)
		{
			$data['dropkel'] = $this->uri->segment(4);
			$data['title'] = 'Tambah Data Jenis';
			$data['get_code'] = getGenerateCode('tb_jenis','id_jenis');
			$data['main_view'] = 'admin/jenis/add_jenis';
			$this->load->view('admin/index',$data);
		}
		else
		{
			$new_id = getNewId('tb_jenis','id_jenis');
			if(empty($_FILES['gbr_jenis']['name']))
			{
				if($this->uri->segment(4)=='indukan')
				{
					$data = array(
								'id_jenis'=>$new_id,
								'kode_jenis'=>$this->input->post('kode_jenis'),
								'nm_jenis'=>$this->input->post('nm_jenis'),
								'tipe' =>'indukan',
								'kel' =>$this->input->post('kel'),
								'keterangan' =>$this->input->post('keterangan')
								);
					$this->Jenis_model->addJenis($data);
					$count = count($this->Jenis_model->getJenis('indukan',FALSE,FALSE,FALSE));
					/////////get last page from helpeerrr
					getPageJenis('jenis/indukan','new',FALSE,$count,$this->uri->segment(4));
				}
				elseif ($this->uri->segment(4)=='anakan')
				{
					$data = array(
								'id_jenis'=>$new_id,
								'kode_jenis'=>$this->input->post('kode_jenis'),
								'nm_jenis'=>$this->input->post('nm_jenis'),
								'tipe' =>'anakan',
								'keterangan' =>$this->input->post('keterangan')
								);
					$this->Jenis_model->addJenis($data);
					$count = count($this->Jenis_model->getJenis('anakan',FALSE,FALSE,FALSE));
					/////////get last page from helpeerrr
					getPageJenis('jenis/anakan','new',FALSE,$count,$this->uri->segment(4));
				}
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
				if (!$this->upload->do_upload('gbr_jenis'))
				{
					$this->session->set_flashdata('message_type','<div id="kotak">Data Gagal disimpan <br />Ukuran gambar terlalu besar</div>');
					redirect('admin/jenis/add_jenis');
				}
				else
				{
					$uploaded_file = array('upload_data' => $this->upload->data());
					$file_uploaded = $uploaded_file['upload_data']['file_name'];
					$file_ext = $uploaded_file['upload_data']['file_ext'];
					
					if($this->uri->segment(4)=='indukan')
					{
						
						$data = array(
								'id_jenis'=>$new_id,
								'kode_jenis'=>$this->input->post('kode_jenis'),
								'nm_jenis'=>$this->input->post('nm_jenis'),
								'tipe' =>'indukan',
								'kel' =>$this->input->post('kel'),
								'keterangan' =>$this->input->post('keterangan'),
								'gbr_jenis' =>$file_uploaded
								);
						$this->Jenis_model->addJenis($data);
						$count = count($this->Jenis_model->getJenis('indukan',FALSE,FALSE,FALSE));
						/////////get last page from helpeerrr
						getPageJenis('jenis/indukan','new',FALSE,$count,$this->uri->segment(4));
					}
					elseif($this->uri->segment(4)=='anakan')
					{
						$data = array(
								'id_jenis'=>$new_id,
								'kode_jenis'=>$this->input->post('kode_jenis'),
								'nm_jenis'=>$this->input->post('nm_jenis'),
								'tipe' =>'anakan',
								'keterangan' =>$this->input->post('keterangan'),
								'gbr_jenis' =>$file_uploaded
								);
						$this->Jenis_model->addJenis($data);
						$count = count($this->Jenis_model->getJenis('anakan',FALSE,FALSE,FALSE));
						/////////get last page from helpeerrr
						getPageJenis('jenis/anakan','new',FALSE,$count,$this->uri->segment(4));
					}
					
				}
			}
		}
	}
	
	function edit_jenis() 
	{
		$this->form_validation->set_rules('kode_jenis', 'Kode Jenis','required');
		$this->form_validation->set_rules('nm_jenis', 'Nama Jenis','required');
		
		if($this->form_validation->run() == FALSE)
		{
			$id_jenis = $this->uri->segment(5);
			$data['dropkel'] = $this->uri->segment(4);
			$data['title'] = 'Data Jenis';
			$data['query'] = $this->Jenis_model->getJenis(FALSE,$id_jenis,FALSE,FALSE);
			$data['main_view'] = 'admin/jenis/edit_jenis';
			$this->load->view('admin/index',$data);
		}
		else
		{
			$uri = $this->uri->segment(6);
			$id_jenis = $this->uri->segment(5);
			if(empty($_FILES['gbr_jenis']['name']))
			{
				if($this->uri->segment(4)=='indukan')
				{
					$data = array(
							'kode_jenis'=>$this->input->post('kode_jenis'),
							'nm_jenis'=>$this->input->post('nm_jenis'),
							'tipe' =>'indukan',
							'kel' =>$this->input->post('kel'),
							'keterangan' =>$this->input->post('keterangan'),
							);
					$this->Jenis_model->editJenis($id_jenis,$data);
					/////////get last page from helpeerrr
					getPageJenis('jenis/indukan','edit',$uri,FALSE);
				}
				elseif($this->uri->segment(4)=='anakan')
				{
					$data = array(
							'kode_jenis'=>$this->input->post('kode_jenis'),
							'nm_jenis'=>$this->input->post('nm_jenis'),
							'tipe' =>'anakan',
							'keterangan' =>$this->input->post('keterangan'),
							);
					$this->Jenis_model->editJenis($id_jenis,$data);
					/////////get last page from helpeerrr
					getPageJenis('jenis/anakan','edit',$uri,FALSE);
				}
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
				if (!$this->upload->do_upload('gbr_jenis'))
				{
					$this->session->set_flashdata('message_type','<div id="kotak">Data Gagal disimpan <br />Ukuran gambar terlalu besar</div>');
					redirect('admin/jenis/add_jenis');
				}
				else
				{
					$uploaded_file = array('upload_data' => $this->upload->data());
					$file_uploaded = $uploaded_file['upload_data']['file_name'];
					$file_ext = $uploaded_file['upload_data']['file_ext'];
					
					if($this->uri->segment(4)=='indukan')
					{
						$data = array(
								'kode_jenis'=>$this->input->post('kode_jenis'),
								'nm_jenis'=>$this->input->post('nm_jenis'),
								'tipe' =>'indukan',
								'kel' =>$this->input->post('kel'),
								'keterangan' =>$this->input->post('keterangan'),
								'gbr_jenis' =>$file_uploaded
								);
						$this->Jenis_model->editJenis($id_jenis,$data);
						/////////get last page from helpeerrr
						getPageJenis('jenis/indukan','edit',$uri,FALSE);
					}
					elseif($this->uri->segment(4)=='anakan')
					{
						$data = array(
								'kode_jenis'=>$this->input->post('kode_jenis'),
								'nm_jenis'=>$this->input->post('nm_jenis'),
								'tipe' =>'anakan',
								'keterangan' =>$this->input->post('keterangan'),
								'gbr_jenis' =>$file_uploaded
								);
						$this->Jenis_model->editJenis($id_jenis,$data);
						/////////get last page from helpeerrr
						getPageJenis('jenis/anakan','edit',$uri,FALSE);
					}
				}
			}
		}
	}
	
	
	function delete_jenis()
	{
		$id_jenis = $this->uri->segment(5);
		$uri = $this->uri->segment(6);
		if ($this->Jenis_model->getJenis(FALSE,$id_jenis,FALSE,FALSE)->gbr_jenis!=''):
			unlink(FCPATH.'/uploads/'.$this->Jenis_model->getJenis(FALSE,$id_jenis,FALSE,FALSE)->gbr_jenis);// hapus gambarnya
			$this->Jenis_model->deleteJenis($id_jenis);
		else:
			$this->Jenis_model->deleteJenis($id_jenis);
		endif;
		if($this->uri->segment(4)=='indukan')
		{
			$count = count($this->Jenis_model->getJenis('indukan',FALSE,FALSE,FALSE));
			getPage('jenis/indukan','delete',$uri,$count);
		}
		elseif($this->uri->segment(4)=='anakan')
		{
			$count = count($this->Jenis_model->getJenis('anakan',FALSE,FALSE,FALSE));
			getPage('jenis/anakan','delete',$uri,$count);
		}
	}
	function delete_image()
	{
		$id = $this->uri->segment(5);
		if ($this->Jenis_model->getJenis(FALSE,$id,FALSE,FALSE)->gbr_jenis != ''):
			unlink(FCPATH.'/uploads/'.$this->Jenis_model->getJenis(FALSE,$id,FALSE,FALSE)->gbr_jenis);
			$data = array (
								'gbr_jenis'=>''
								);
			$this->Jenis_model->editJenis($id,$data);
		else:
			$data = array (
								'gbr_jenis'=>''
								);
			$this->Jenis_model->editJenis($id,$data);
		endif;
		if($this->uri->segment(4)=='indukan')
		{
			redirect('admin/jenis/edit_jenis/indukan/'.$id);
		}
		if($this->uri->segment(4)=='anakan')
		{
			redirect('admin/jenis/edit_jenis/anakan/'.$id);
		}
		
	}
}
?>