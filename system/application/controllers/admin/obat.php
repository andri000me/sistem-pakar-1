<?
class Obat extends Controller {
	function Obat() {
		parent::Controller();
		$this->load->library('session');
		$this->load->model('Obat_model');
		$this->load->helper('proc_helper');
		if(!$this->session->userdata('id_user') && !$this->session->userdata('user_display') ):
			redirect('admin');
		endif;
	}
	
	function index() 
	{
		$this->load->library('pagination');
		$offset = $this->uri->segment(4);
		$config['base_url'] = site_url().'/admin/obat/index';
		$config['total_rows'] = count($this->Obat_model->getObat('all',FALSE,FALSE,FALSE));
		$config['per_page'] = $this->config->item('per_page');
		$config['uri_segment'] = '4';
		
		$data['urut'] = $this->uri->segment(4);
		$data['title'] = 'Data Obat';
		$data['query'] = $this->Obat_model->getObat('all',FALSE,$config['per_page'],$offset);
		$data['main_view'] = 'admin/obat/index';
		$this->pagination->initialize($config);
		$this->load->view('admin/index',$data);
	}
	
	function add_obat() 
	{
		$this->form_validation->set_rules('kode_obat', 'Kode Obat','required');
		$this->form_validation->set_rules('nm_obat', 'Nama Obat','required');
		
		if($this->form_validation->run() == FALSE)
		{
			//$id_obt = $this->uri->segment(4);
			$data['title'] = 'Data Obat';
			$data['get_code'] = getGenerateCode('tb_obat','id_obat');
			//$data['query'] = $this->Obat_model->getObat(FALSE,$id_obat,FALSE,FALSE);
			$data['main_view'] = 'admin/obat/add_obat';
			$this->load->view('admin/index',$data);
		}
		else
		{
			$new_id = getNewId('tb_obat','id_obat');
			$data = array(
						'id_obat'=>$new_id,
						'kode_obat'=>$this->input->post('kode_obat'),
						'nm_obat'=>$this->input->post('nm_obat'),
						'pemakaian' =>$this->input->post('pemakaian')
						);
			$this->Obat_model->addObat($data);
			$count = count($this->Obat_model->getObat('all',FALSE,FALSE,FALSE));
			getPage('obat','new',FALSE,$count);
		}
	}
	
	function edit_obat() 
	{
		$this->form_validation->set_rules('kode_obat', 'Kode Obat','required');
		$this->form_validation->set_rules('nm_obat', 'Nama Obat','required');
		
		if($this->form_validation->run() == FALSE)
		{
			$id_obat = $this->uri->segment(4);
			$data['title'] = 'Edit Data Obat';
			$data['query'] = $this->Obat_model->getObat(FALSE,$id_obat,FALSE,FALSE);
			$data['main_view'] = 'admin/obat/edit_obat';
			$this->load->view('admin/index',$data);
		}
		else
		{
			$id_obat = $this->uri->segment(4);
			$data = array(
						'kode_obat'=>$this->input->post('kode_obat'),
						'nm_obat'=>$this->input->post('nm_obat'),
						'pemakaian' =>$this->input->post('pemakaian')
						);
			$this->Obat_model->editObat($id_obat,$data);
			////get edit page
			$uri = $this->uri->segment(5);
			getPage('obat','edit',$uri,FALSE);
		}
	}
	
	function delete_obat()
	{
		$id_obat = $this->uri->segment(4);
		
		$this->Obat_model->deleteObat($id_obat);
		////get item delete page
		$uri = $this->uri->segment(5);
		$count = count($this->Obat_model->getObat('all',FALSE,FALSE,FALSE));
		getPage('obat','delete',$uri,$count);
	}
}
?>