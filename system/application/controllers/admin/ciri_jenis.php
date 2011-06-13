<?
class Ciri_Jenis extends Controller {
	function Ciri_Jenis() {
		parent::Controller();
		$this->load->library('session');
		$this->load->model('Ciri_model');
	}
	
	function index() 
	{
		$this->load->library('pagination');
		$offset = $this->uri->segment(4);
		$config['base_url'] = site_url().'/admin/ciri_jenis/index';
		$config['total_rows'] = count($this->Ciri_model->getCiriJenis('all',FALSE,FALSE,FALSE));
		$config['per_page'] = $this->config->item('per_page');
		$config['uri_segment'] = '4';
		
		$data['urut'] = $this->uri->segment(4);
		$data['title'] = 'Ciri Jenis';
		$data['query'] = $this->Ciri_model->getCiriJenis('all',FALSE,$config['per_page'],$offset);
		$data['main_view'] = 'admin/ciri_jenis/index';
		$this->pagination->initialize($config);
		$this->load->view('admin/index',$data);
	}
	
	function add_ciri() 
	{
		$this->form_validation->set_rules('kode_ciri', 'Kode Ciri','required');
		$this->form_validation->set_rules('nm_gejala', 'Nama Ciri','required');
		
		if($this->form_validation->run() == FALSE)
		{
			$this->db->select_max('id_ciri');
			$query = $this->db->get('tb_ciri');
			$last_id = $query->row()->id_ciri;
			////////// generate new code/// apa apa niiihhh pake helper dong!!!!!!! arrgh
			$cek = strlen($last_id);
            if ($cek == 1):
				$code = "C00";
			elseif ($cek == 2):
				$code = "C0";
			elseif ($cek == 3):
				$code = "C";
			endif;
			
			$new_id = $last_id+1;
			$new_code = $code."".$new_id;

			$id_cr = $this->uri->segment(4);
			$data['title'] = 'Ciri Jenis';
			$data['get_code'] = $new_code;
			$data['query'] = $this->Ciri_model->getCiriJenis(FALSE,$id_cr,FALSE,FALSE);
			$data['main_view'] = 'admin/ciri_jenis/add_ciri';
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
							'kode_bagian' =>$this->input->post('kode_bagian'),
							'nm_ciri' =>$this->input->post('nm_ciri'),
							'gbr_ciri' =>''
							);
				$this->Ciri_model->addCiri($data);

					/////////get last page, blm sempat masukin ke helper heehe
				$count = count($this->Ciri_model->getCiriJenis('all',FALSE,FALSE,FALSE));
				getPage('ciri_jenis','new',FALSE,$count);
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
					redirect('admin/ciri_jenis/add_ciri');
				}
				else
				{
					$uploaded_file = array('upload_data' => $this->upload->data());
					$file_uploaded = $uploaded_file['upload_data']['file_name'];
					$file_ext = $uploaded_file['upload_data']['file_ext'];
					$data = array (
								'id_ciri'=>$new_id,
								'kode_ciriu'=>$this->input->post('kode_ciri'),
								'kode_bagian' =>$this->input->post('kode_bagian'),
								'nm_ciri' =>$this->input->post('nm_ciri'),
								'gbr_ciri' =>$file_uploaded
								);
					$this->Ciri_model->addCiri($data);
						/////////get last page, blm sempat masukin ke helper heehe
					$count = count($this->Ciri_model->getCiriJenis('all',FALSE,FALSE,FALSE));
					getPage('ciri_jenis,'new',FALSE,$count);
				}
			}
		}
	}
	
	function edit_ciri() 
	{
		$this->form_validation->set_rules('kode_ciri', 'Kode Ciri','required');
		$this->form_validation->set_rules('nm_ciri', 'Nama Ciri','required');
		
		if($this->form_validation->run() == FALSE)
		{
			$id_cr = $this->uri->segment(4);
			$data['title'] = 'Ciri Jenis';
			$data['query'] = $this->Ciri_model->getCiriJenis(FALSE,$id_cr,FALSE,FALSE);
			$data['main_view'] = 'admin/ciri_jenis/edit_ciri';
			$this->load->view('admin/index',$data);
		}
		else
		{
			$id_cr = $this->uri->segment(4);
			$uri = $this->uri->segment(5);
			if(empty($_FILES['gbr_ciri']['name']))
			{
				$data = array(
							'kode_ciri'=>$this->input->post('kode_ciri'),
							'kode_bagian' =>$this->input->post('kode_bagian'),
							'nm_ciri' =>$this->input->post('nm_ciri')
							);
				$this->Ciri_model->editCiri($id_cr,$data);
				////get edit page
				getPage('ciri_jenis','edit',$uri,FALSE);
			}
			else
			{
				$uri = $this->uri->segment(5);
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
					redirect('admin/ciri_jenis/edit_ciri/'.$id_cr.'/'.$p);
				}
				else
				{
					if ($this->Ciri_model->getCiriJenis(FALSE,$id_cr,FALSE,FALSE)->gbr_ciri != ''):
						unlink(FCPATH.'/uploads/'.$this->Ciri_model->getCiriJenis(FALSE,$id_cr,FALSE,FALSE)->gbr_ciri);
					endif;
					$uploaded_file = array('upload_data' => $this->upload->data());
					$file_uploaded = $uploaded_file['upload_data']['file_name'];
					$file_ext = $uploaded_file['upload_data']['file_ext'];
					$data = array (
								'kode_ciri'=>$this->input->post('kode_ciri'),
								'kode_bagian' =>$this->input->post('kode_bagian'),
								'nm_ciri' =>$this->input->post('nm_ciri'),
								'gbr_ciri' =>$file_uploaded
								);
					$this->Ciri_model->editCiri($id_cr,$data);
					////get edit page
					getPage('ciri_jenis','edit',$uri,FALSE);
				}
			}
		}
	}
	
	function delete_ciri()
	{
		$id_cr = $this->uri->segment(4);
		if ($this->Ciri_model->getCiriJenis(FALSE,$id_cr,FALSE,FALSE)->gbr_ciri!=''):
			unlink(FCPATH.'/uploads/'.$this->Ciri_model->getCiriJenis(FALSE,$id_cr,FALSE,FALSE)->gbr_ciri);// hapus gambarnya
			$this->ciri_model->deleteCiri($id_cr);
		else:
			$this->Ciri_model->deleteCiri($id_cr);
		endif;
		////get item delete page
		$count = count($this->Ciri_model->getCiriJenis('all',FALSE,FALSE,FALSE));
		$uri = $this->uri->segment(5);
		getPage('ciri_jenis','delete',$uri,$count);
	}
	function delete_image()
	{
		$id = $this->uri->segment(4);
		if ($this->Ciri_model->getCiriJenis(FALSE,$id,FALSE,FALSE)->gbr_ciri != ''):
			unlink(FCPATH.'/uploads/'.$this->ciri_model->getCiriJenis(FALSE,$id,FALSE,FALSE)->gbr_ciri);
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
		redirect('admin/ciri_jenis/edit_ciri/'.$id);
	}
}
?>