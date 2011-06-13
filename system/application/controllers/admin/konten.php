<?php
class Konten extends Controller {
	function Konten() {
		parent::Controller();
		$this->load->library('session');
		$this->load->helper('proc_helper');
		$this->load->model('Konten_model');
		$this->load->library('image_lib');
		if(!$this->session->userdata('id_user') && !$this->session->userdata('user_display') ):
			redirect('admin');
		endif;
	}
	
	function index() 
	{
		$this->load->library('pagination');
		$offset = $this->uri->segment(4);
		$config['base_url'] = site_url().'/admin/konten/index';
		$config['total_rows'] = count($this->Konten_model->getKonten('all',FALSE,FALSE,FALSE));
		$config['per_page'] = $this->config->item('per_page');
		$config['uri_segment'] = '4';
		
		$data['urut'] = $this->uri->segment(4);
		$data['title'] = 'Data Konten';
		$data['query'] = $this->Konten_model->getKonten('all',FALSE,$config['per_page'],$offset);
		$data['main_view'] = 'admin/konten/index';
		$this->pagination->initialize($config);
		$this->load->view('admin/index',$data);
	}
	
	function add_konten() 
	{
		$this->form_validation->set_rules('title', 'Judul','required');
		$this->form_validation->set_rules('konten', 'Isi Konten','required');
		$this->form_validation->set_rules('page', 'Halaman','required');
		
		if($this->form_validation->run() == FALSE)
		{
			$data['title'] = 'Konten';
			$data['main_view'] = 'admin/konten/add_konten';
			$this->load->view('admin/index',$data);
		}
		else
		{
			
			if(empty($_FILES['image']['name']))
			{
				$data = array(
							'title'=>$this->input->post('title'),
							'konten' =>$this->input->post('konten'),
							'page' =>$this->input->post('page'),
							'image'=>'',
							'image_thumb'=>''
							);
				$this->Konten_model->addKonten($data);
					/////////get last page, blm sempat masukin ke helper heehe
				$count = count($this->Konten_model->getKonten('all',FALSE,FALSE,FALSE));
				getPage('konten','new',FALSE,$count);
			}
			else
			{
				// config untuk upload/////
				$this->load->helper('file');
				$config['upload_path'] = './temp_log_uploads/';
				$config['allowed_types'] = 'jpg|jpeg';
				$config['max_size']	= 2048;
				$config['max_width']  = 0;
				$config['max_height']  = 0;
				$this->load->library('upload', $config);
				if (!$this->upload->do_upload('image'))
				{
					$this->session->set_flashdata('message_type','<div id="kotak">Data Gagal disimpan <br />Ukuran gambar terlalu besar</div>');
					redirect('admin/koten/add_konten');
				}
				else
				{
					$uploaded_file = array('upload_data' => $this->upload->data());
					$file_uploaded = $uploaded_file['upload_data']['file_name'];
					$file_ext = $uploaded_file['upload_data']['file_ext'];
					$randName = 'img_'.mt_rand(100,999);
					$newName = $randName;
					while(file_exists($config['upload_path'].$newName)):
						$randName = 'img_'.mt_rand(100,999);
						$newName = $randName;
					endwhile;
					$fileDate = date("Ymd");
					$newFileName = $newName.'_'.$fileDate.$file_ext;
					if(!file_exists($config['upload_path'].$newFileName)):
						rename($config['upload_path'].$file_uploaded, $config['upload_path'].$newFileName);
					endif;

					// config untuk resize
					$config['media_path'] = './uploads/';
					$config['image_library'] = 'GD2';
					$config['width'] = 1024;
					//$config['height'] = 800;
					$config['maintain_ratio'] = TRUE;
					

					$config['source_image'] = $config['upload_path'].$newFileName;

					// inisialisasi library resize image
					$this->image_lib->initialize($config);
					// image resize
					if($this->image_lib->resize()){
						$this->image_lib->clear();
					}
					rename($config['source_image'], $config['media_path'].$newFileName);

					// set data to database
					$this->image_lib->clear();
					$thumbnail_size = 150;
					$thumbnail = inf_crop_box($config['media_path'].$newFileName,$thumbnail_size,
					$newName.'_'.$fileDate,$file_ext,$config['media_path']);
					$data = array (
								'title'=>$this->input->post('title'),
								'konten' =>$this->input->post('konten'),
								'page' =>$this->input->post('page'),
								'image'=>$newName.'_'.$fileDate.$file_ext,
								'image_thumb'=>$thumbnail
								);
					$this->Konten_model->addKonten($data);
						/////////get last page, blm sempat masukin ke helper heehe
					$count = count($this->Konten_model->getKonten('all',FALSE,FALSE,FALSE));
					getPage('konten','new',FALSE,$count);
				}
			}
		}
	}
	
	function edit_konten() 
	{
		$this->form_validation->set_rules('title', 'Judul','required');
		$this->form_validation->set_rules('konten', 'Isi Konten','required');
		$this->form_validation->set_rules('page', 'Halaman','required');
		
		if($this->form_validation->run() == FALSE)
		{
			$id_konten = $this->uri->segment(4);
			$data['title'] = 'Edit Konten';
			$data['query'] = $this->Konten_model->getKonten(FALSE,$id_konten,FALSE,FALSE);
			$data['main_view'] = 'admin/konten/edit_konten';
			$this->load->view('admin/index',$data);
		}
		else
		{
			$id_konten = $this->uri->segment(4);
			if(empty($_FILES['image']['name']))
			{
				if (($this->Konten_model->getKonten(FALSE,$id_konten,FALSE,FALSE)->image != '') && ($this->Konten_model->getKonten(FALSE,$id_konten,FALSE,FALSE)->image_thumb != '')):
					$img = $this->Konten_model->getKonten(FALSE,$id_konten,FALSE,FALSE)->image;
					$img_tumb = $this->Konten_model->getKonten(FALSE,$id_konten,FALSE,FALSE)->image_thumb;
				else :
					$img = '';
					$img_tumb = '';
				endif;
				$data = array(
							'title'=>$this->input->post('title'),
							'konten' =>$this->input->post('konten'),
							'page' =>$this->input->post('page'),
							'image'=>$img,
							'image_thumb'=>$img_tumb
							);
				$this->Konten_model->editKonten($id_konten,$data);
					/////////get last page, blm sempat masukin ke helper heehe
				$uri = $this->uri->segment(5);
				getPage('konten','edit',$uri,FALSE);
			}
			else
			{
				// config untuk upload/////
				$this->load->helper('file');
				$config['upload_path'] = './temp_log_uploads/';
				$config['allowed_types'] = 'jpg|jpeg';
				$config['max_size']	= 2048;
				$config['max_width']  = 0;
				$config['max_height']  = 0;
				$this->load->library('upload', $config);
				if (!$this->upload->do_upload('image'))
				{
					$this->session->set_flashdata('message_type','<div id="kotak">Data Gagal disimpan <br />Ukuran gambar terlalu besar</div>');
					redirect('admin/koten/add_konten');
				}
				else
				{
					if (($this->Konten_model->getKonten(FALSE,$id_konten,FALSE,FALSE)->image != '') && ($this->Konten_model->getKonten(FALSE,$id_konten,FALSE,FALSE)->image_thumb != '')):
						unlink(FCPATH.'/uploads/'.$this->Konten_model->getKonten(FALSE,$id_konten,FALSE,FALSE)->image);
						unlink(FCPATH.'/uploads/'.$this->Konten_model->getKonten(FALSE,$id_konten,FALSE,FALSE)->image_thumb);
					endif;
					$uploaded_file = array('upload_data' => $this->upload->data());
					$file_uploaded = $uploaded_file['upload_data']['file_name'];
					$file_ext = $uploaded_file['upload_data']['file_ext'];
					$randName = 'img_'.mt_rand(100,999);
					$newName = $randName;
					while(file_exists($config['upload_path'].$newName)):
						$randName = 'img_'.mt_rand(100,999);
						$newName = $randName;
					endwhile;
					$fileDate = date("Ymd");
					$newFileName = $newName.'_'.$fileDate.$file_ext;
					if(!file_exists($config['upload_path'].$newFileName)):
						rename($config['upload_path'].$file_uploaded, $config['upload_path'].$newFileName);
					endif;

					// config untuk resize
					$config['media_path'] = './uploads/';
					$config['image_library'] = 'GD2';
					$config['width'] = 800;
					$config['height'] = 600;
					$config['maintain_ratio'] = TRUE;

					$config['source_image'] = $config['upload_path'].$newFileName;

					// inisialisasi library resize image
					$this->image_lib->initialize($config);
					// image resize
					if($this->image_lib->resize()){
						$this->image_lib->clear();
					}
					rename($config['source_image'], $config['media_path'].$newFileName);

					// set data to database
					$this->image_lib->clear();
					$thumbnail_size = 150;
					$thumbnail = inf_crop_box($config['media_path'].$newFileName,$thumbnail_size,
					$newName.'_'.$fileDate,$file_ext,$config['media_path']);
					$data = array (
								'title'=>$this->input->post('title'),
								'konten' =>$this->input->post('konten'),
								'page' =>$this->input->post('page'),
								'image'=>$newName.'_'.$fileDate.$file_ext,
								'image_thumb'=>$thumbnail
								);
					$this->Konten_model->editKonten($id_konten,$data);
										/////////get last page, blm sempat masukin ke helper heehe
					$uri = $this->uri->segment(5);
					getPage('konten','edit',$uri,FALSE);
				}
			}
		}
	}
	
	function delete_konten()
	{
		$id_konten = $this->uri->segment(4);
		if (($this->Konten_model->getKonten(FALSE,$id_konten,FALSE,FALSE)->image != '') && ($this->Konten_model->getKonten(FALSE,$id_konten,FALSE,FALSE)->image_thumb != '')):
			unlink(FCPATH.'/uploads/'.$this->Konten_model->getKonten(FALSE,$id_konten,FALSE,FALSE)->image);
			unlink(FCPATH.'/uploads/'.$this->Konten_model->getKonten(FALSE,$id_konten,FALSE,FALSE)->image_thumb);
			$this->Konten_model->deleteKonten($id_konten);
		else:
			$this->Konten_model->deleteKonten($id_konten);
		endif;
		////get item delete page
		$count = count($this->Konten_model->getKonten('all',FALSE,FALSE,FALSE));
		$uri = $this->uri->segment(5);
		getPage('konten','delete',$uri,$count);
	}
	function delete_image()
	{
		$id_konten = $this->uri->segment(4);
		if (($this->Konten_model->getKonten(FALSE,$id_konten,FALSE,FALSE)->image != '') && ($this->Konten_model->getKonten(FALSE,$id_konten,FALSE,FALSE)->image_thumb != '')):
			unlink(FCPATH.'/uploads/'.$this->Konten_model->getKonten(FALSE,$id_konten,FALSE,FALSE)->image);
			unlink(FCPATH.'/uploads/'.$this->Konten_model->getKonten(FALSE,$id_konten,FALSE,FALSE)->image_thumb);
			$data = array (
								'image'=>'',
								'image_thumb'=>''
								);
			$this->Konten_model->editKonten($id_konten,$data);
		else:
			$data = array (
								'image'=>'',
								'image_thumb'=>''
								);
			$this->Konten_model->editKonten($id_konten,$data);
		endif;
		redirect('admin/konten/edit_konten/'.$id_konten);
	}
}
?>