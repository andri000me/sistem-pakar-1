<?
class Gejala_penyakit extends Controller {
	function Gejala_penyakit() {
		parent::Controller();
		$this->load->library('session');
		$this->load->model('Gejala_model');
		if(!$this->session->userdata('id_user') && !$this->session->userdata('user_display') ):
			redirect('admin');
		endif;
	}
	
	function index() 
	{
		$this->load->library('pagination');
		$offset = $this->uri->segment(4);
		$config['base_url'] = site_url().'/admin/gejala_penyakit/index';
		$config['total_rows'] = count($this->Gejala_model->getGejalaPenyakit('all',FALSE,FALSE,FALSE));
		$config['per_page'] = $this->config->item('per_page');
		$config['uri_segment'] = '4';
		
		$data['urut'] = $this->uri->segment(4);
		$data['title'] = 'Gejala Penyakit';
		$data['query'] = $this->Gejala_model->getGejalaPenyakit('all',FALSE,$config['per_page'],$offset);
		$data['main_view'] = 'admin/gejala_penyakit/index';
		$this->pagination->initialize($config);
		$this->load->view('admin/index',$data);
	}
	
	function add_gejala() 
	{
		$this->form_validation->set_rules('kode_gejala', 'Kode Gejala','required');
		$this->form_validation->set_rules('nm_gejala', 'Nama Gejala','required');
		
		if($this->form_validation->run() == FALSE)
		{
			$this->db->select_max('id_gejala');
			$query = $this->db->get('tb_gejala');
			$last_id = $query->row()->id_gejala;
			////////// generate new code/// apa apa niiihhh pake helper dong!!!!!!! arrgh
			$cek = strlen($last_id);
            if ($cek == 1):
				$code = "G00";
			elseif ($cek == 2):
				$code = "G0";
			elseif ($cek == 3):
				$code = "G";
			endif;
			
			$new_id = $last_id+1;
			$new_code = $code."".$new_id;

			$id_gej = $this->uri->segment(4);
			$data['title'] = 'Gejala Penyakit';
			$data['get_code'] = $new_code;
			$data['query'] = $this->Gejala_model->getGejalaPenyakit(FALSE,$id_gej,FALSE,FALSE);
			$data['main_view'] = 'admin/gejala_penyakit/add_gejala';
			$this->load->view('admin/index',$data);
		}
		else
		{
			$new_id = getNewId('tb_gejala','id_gejala');
			if(empty($_FILES['gbr_gejala']['name']))
			{
				$data = array(
							'id_gejala'=>$new_id,
							'kode_gejala'=>$this->input->post('kode_gejala'),
							'kode_bagian' =>$this->input->post('kode_bagian'),
							'nm_gejala' =>$this->input->post('nm_gejala'),
							'gbr_gejala' =>''
							);
				$this->Gejala_model->addGejala($data);

					/////////get last page, blm sempat masukin ke helper heehe
				$count = count($this->Gejala_model->getGejalaPenyakit('all',FALSE,FALSE,FALSE));
				getPage('gejala_penyakit','new',FALSE,$count);
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
				if (!$this->upload->do_upload('gbr_gejala'))
				{
					$this->session->set_flashdata('message_type','<div id="kotak">Data Gagal disimpan <br />Ukuran gambar terlalu besar</div>');
					redirect('admin/gejala_penyakit/add_gejala');
				}
				else
				{
					$uploaded_file = array('upload_data' => $this->upload->data());
					$file_uploaded = $uploaded_file['upload_data']['file_name'];
					$file_ext = $uploaded_file['upload_data']['file_ext'];
					$data = array (
								'id_gejala'=>$new_id,
								'kode_gejala'=>$this->input->post('kode_gejala'),
								'kode_bagian' =>$this->input->post('kode_bagian'),
								'nm_gejala' =>$this->input->post('nm_gejala'),
								'gbr_gejala' =>$file_uploaded
								);
					$this->Gejala_model->addGejala($data);
						/////////get last page, blm sempat masukin ke helper heehe
					$count = count($this->Gejala_model->getGejalaPenyakit('all',FALSE,FALSE,FALSE));
					getPage('gejala_penyakit','new',FALSE,$count);
				}
			}
		}
	}
	
	function edit_gejala() 
	{
		$this->form_validation->set_rules('kode_gejala', 'Kode Gejala','required');
		$this->form_validation->set_rules('nm_gejala', 'Nama Gejala','required');
		
		if($this->form_validation->run() == FALSE)
		{
			$id_gej = $this->uri->segment(4);
			$data['title'] = 'Gejala Penyakit';
			$data['query'] = $this->Gejala_model->getGejalaPenyakit(FALSE,$id_gej,FALSE,FALSE);
			$data['main_view'] = 'admin/gejala_penyakit/edit_gejala';
			$this->load->view('admin/index',$data);
		}
		else
		{
			$id_gej = $this->uri->segment(4);
			$uri = $this->uri->segment(5);
			if(empty($_FILES['gbr_gejala']['name']))
			{
				$data = array(
							'kode_gejala'=>$this->input->post('kode_gejala'),
							'kode_bagian' =>$this->input->post('kode_bagian'),
							'nm_gejala' =>$this->input->post('nm_gejala')
							);
				$this->Gejala_model->editGejala($id_gej,$data);
				////get edit page
				getPage('gejala_penyakit','edit',$uri,FALSE);
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
				if (!$this->upload->do_upload('gbr_gejala'))
				{
					$this->session->set_flashdata('message_type','<div id="kotak">Data Gagal disimpan <br />Ukuran gambar terlalu besar</div>');
					redirect('admin/gejala_penyakit/edit_gejala/'.$id_gej.'/'.$uri);
				}
				else
				{
					if ($this->Gejala_model->getGejalaPenyakit(FALSE,$id_gej,FALSE,FALSE)->gbr_gejala != ''):
						unlink(FCPATH.'/uploads/'.$this->Gejala_model->getGejalaPenyakit(FALSE,$id_gej,FALSE,FALSE)->gbr_gejala);
					endif;
					$uploaded_file = array('upload_data' => $this->upload->data());
					$file_uploaded = $uploaded_file['upload_data']['file_name'];
					$file_ext = $uploaded_file['upload_data']['file_ext'];
					$data = array (
								'kode_gejala'=>$this->input->post('kode_gejala'),
								'kode_bagian' =>$this->input->post('kode_bagian'),
								'nm_gejala' =>$this->input->post('nm_gejala'),
								'gbr_gejala' =>$file_uploaded
								);
					$this->Gejala_model->editGejala($id_gej,$data);
					////get edit page
					getPage('gejala_penyakit','edit',$uri,FALSE);
				}
			}
		}
	}
	
	function delete_gejala()
	{
		$id_gej = $this->uri->segment(4);
		if ($this->Gejala_model->getGejalaPenyakit(FALSE,$id_gej,FALSE,FALSE)->gbr_gejala!=''):
			unlink(FCPATH.'/uploads/'.$this->Gejala_model->getGejalaPenyakit(FALSE,$id_gej,FALSE,FALSE)->gbr_gejala);// hapus gambarnya
			$this->Gejala_model->deleteGejala($id_gej);
		else:
			$this->Gejala_model->deleteGejala($id_gej);
		endif;
		////get item delete page
		$count = count($this->Gejala_model->getGejalaPenyakit('all',FALSE,FALSE,FALSE));
		$uri = $this->uri->segment(5);
		getPage('gejala_penyakit','delete',$uri,$count);
	}
	function delete_image()
	{
		$id = $this->uri->segment(4);
		if ($this->Gejala_model->getGejalaPenyakit(FALSE,$id,FALSE,FALSE)->gbr_gejala != ''):
			unlink(FCPATH.'/uploads/'.$this->Gejala_model->getGejalaPenyakit(FALSE,$id,FALSE,FALSE)->gbr_gejala);
			$data = array (
								'gbr_gejala'=>''
								);
			$this->Gejala_model->editGejala($id,$data);
		else:
			$data = array (
								'gbr_gejala'=>''
								);
			$this->Gejala_model->editGejala($id,$data);
		endif;
		redirect('admin/gejala_penyakit/edit_gejala/'.$id);
	}
}
?>