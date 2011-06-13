<?
class Penyebab extends Controller {
	function Penyebab() {
		parent::Controller();
		$this->load->library('session');
		$this->load->model('Penyebab_model');
		$this->load->helper('proc_helper');
		if(!$this->session->userdata('id_user') && !$this->session->userdata('user_display') ):
			redirect('admin');
		endif;
	}
	
	function index() 
	{
		$this->load->library('pagination');
		$offset = $this->uri->segment(4);
		$config['base_url'] = site_url().'/admin/penyebab/index';
		$config['total_rows'] = count($this->Penyebab_model->getPenyebab('all',FALSE,FALSE,FALSE));
		$config['per_page'] = $this->config->item('per_page');
		$config['uri_segment'] = '4';
		
		$data['urut'] = $this->uri->segment(4);
		$data['title'] = 'Data Penyebab';
		$data['query'] = $this->Penyebab_model->getPenyebab('all',FALSE,$config['per_page'],$offset);
		$data['main_view'] = 'admin/penyebab/index';
		$this->pagination->initialize($config);
		$this->load->view('admin/index',$data);
	}
	
	function add_penyebab() 
	{
		$this->form_validation->set_rules('kode_penyebab', 'Kode Penyebab','required');
		$this->form_validation->set_rules('nm_penyebab', 'Nama Penyebab','required');
		
		if($this->form_validation->run() == FALSE)
		{
			$id_obt = $this->uri->segment(4);
			$data['title'] = 'Data Penyebab';
			$data['get_code'] = getGenerateCode('tb_penyebab','id_penyebab');
			//$data['query'] = $this->Penyebab_model->getPenyebab(FALSE,$id_penyebab,FALSE,FALSE);
			$data['main_view'] = 'admin/penyebab/add_penyebab';
			$this->load->view('admin/index',$data);
		}
		else
		{
			$new_id = getNewId('tb_penyebab','id_penyebab');
			$data = array(
						'id_penyebab'=>$new_id,
						'kode_penyebab'=>$this->input->post('kode_penyebab'),
						'nm_penyebab'=>$this->input->post('nm_penyebab'),
					//	'pemakaian' =>$this->input->post('pemakaian')
						);
			$this->Penyebab_model->addPenyebab($data);
			$count = count($this->Penyebab_model->getPenyebab('all',FALSE,FALSE,FALSE));
			getPage('penyebab','new',FALSE,$count);
		}
	}
	
	function edit_penyebab() 
	{
		$this->form_validation->set_rules('kode_penyebab', 'Kode Penyebab','required');
		$this->form_validation->set_rules('nm_penyebab', 'Nama Penyebab','required');
		
		if($this->form_validation->run() == FALSE)
		{
			$id_penyebab = $this->uri->segment(4);
			$data['title'] = 'Edit Data Penyebab';
			$data['query'] = $this->Penyebab_model->getPenyebab(FALSE,$id_penyebab,FALSE,FALSE);
			$data['main_view'] = 'admin/penyebab/edit_penyebab';
			$this->load->view('admin/index',$data);
		}
		else
		{
			$id_pyb = $this->uri->segment(4);
			$data = array(
						'kode_penyebab'=>$this->input->post('kode_penyebab'),
						'nm_penyebab'=>$this->input->post('nm_penyebab'),
						//'pemakaian' =>$this->input->post('pemakaian')
						);
			$this->Penyebab_model->editPenyebab($id_pyb,$data);
			////get edit page
			$uri = $this->uri->segment(5);
			getPage('penyebab','edit',$uri,FALSE);
		}
	}
	
	function delete_penyebab()
	{
		$id_pyb= $this->uri->segment(4);
		
		$this->Penyebab_model->deletePenyebab($id_pyb);
		////get item delete page
		$uri = $this->uri->segment(5);
		$count = count($this->Penyebab_model->getPenyebab('all',FALSE,FALSE,FALSE));
		getPage('penyebab','delete',$uri,$count);
	}
}
?>