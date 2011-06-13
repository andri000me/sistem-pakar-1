<?
class Rek_jenis extends Controller {
	function Rek_jenis() {
		parent::Controller();
		$this->load->library('session');
		$this->load->helper('proc_helper');
		$this->load->model('Jenis_model');
		$this->load->model('Rekjenis_model');
		$this->load->model('Konsultasi_model');
		if(!$this->session->userdata('id_user') && !$this->session->userdata('user_display') ):
			redirect('admin');
		endif;
		
	}
	
	function index() 
	{
		$this->load->library('pagination');
		$offset = $this->uri->segment(4);
		$config['base_url'] = site_url().'/admin/rek_jenis/index';
		$config['total_rows'] = count($this->Rekjenis_model->getRekjenis('all',FALSE,FALSE,FALSE));
		$config['per_page'] = $this->config->item('per_page');
		$config['uri_segment'] = '4';
		
		$data['urut'] = $this->uri->segment(4);
		$data['title'] = 'Data Rekomendasi Jenis';
		$data['query'] = $this->Rekjenis_model->getRekjenis('all',FALSE,$config['per_page'],$offset);
		$data['main_view'] = 'admin/rek_jenis/index';
		$this->pagination->initialize($config);
		$this->load->view('admin/index',$data);
	}
	
	
	function add_rek_jenis()
	{
		
		$this->form_validation->set_rules('kode_jenis', 'Kode Jenis','required');
		$this->form_validation->set_rules('kode_ciri', 'Kode Ciri','required');
		
		if($this->form_validation->run() == FALSE)
		{
			$data['ciri1'] = $this->Konsultasi_model->getCiriJenis('byKodeBag','B001');
			$data['ciri2'] = $this->Konsultasi_model->getCiriJenis('byKodeBag','B002');
			$data['ciri3'] = $this->Konsultasi_model->getCiriJenis('byKodeBag','B003');
			$data['ciri4'] = $this->Konsultasi_model->getCiriJenis('byKodeBag','B005');
			//$data['ciri1'] = $this->Konsultasi_model->getGejalaPenyakit('byKodeBag','B005');

			$data['title'] = 'Data Rekomendasi Jenis';
			$data['main_view'] = 'admin/rek_jenis/add_rek_jenis';
			$this->load->view('admin/index',$data);	
		}
		else
		{
			
			$data = array(
						'kode_ciri'=> implode(".",$this->input->post('kode_ciri')),
						'kode_jenis'=>$this->input->post('kode_jenis')
						);
			
			$this->Rekjenis_model->addRekjenis($data);
			$this->session->set_flashdata('message_type','<div id="kotak">Data Berhasil disimpan</div>');
			$count = count($this->Rekjenis_model->getRekjenis('all',FALSE,FALSE,FALSE));
			getPage('rek_jenis','new',FALSE,$count);
		
		}
	}
	
	function edit_rek_jenis()
	{
		
		$this->form_validation->set_rules('kode_jenis', 'Kode Jenis','required');
		$this->form_validation->set_rules('kode_ciri', 'Kode Ciri','required');
		
		if($this->form_validation->run() == FALSE)
		{
			$id = $this->uri->segment(4);
			
			$data['qrrow'] = $this->Rekjenis_model->getRekjenis(FALSE,$id,FALSE,FALSE);
			
			$data['datamenu1'] = fetchRow("tb_ciri","WHERE kode_bagian='B001'","*");//wew its from helper..
			$data['datamenu2'] = fetchRow("tb_ciri","WHERE kode_bagian='B002'","*");
			$data['datamenu3'] = fetchRow("tb_ciri","WHERE kode_bagian='B003'","*");
			$data['datamenu4'] = fetchRow("tb_ciri","WHERE kode_bagian='B005'","*");
		
			$data['title'] = 'Data Rekomendasi Jenis';
			$data['main_view'] = 'admin/rek_jenis/edit_rek_jenis';
			$this->load->view('admin/index',$data);	
		}
		else
		{
			$id = $this->uri->segment(4);
			$data = array(
						'kode_ciri'=> implode(".",$this->input->post('kode_ciri')),
						'kode_jenis'=>$this->input->post('kode_jenis')
						);
			
			$this->Rekjenis_model->editRekjenis($id,$data);
			$this->session->set_flashdata('message_type','<div id="kotak">Data Berhasil disimpan</div>');
			$uri = $this->uri->segment(5);
			getPage('rek_jenis','edit',$uri,FALSE);
		
		}
	}
	
	function delete_rek_jenis()
	{
		$id = $this->uri->segment(4);
		$this->Rekjenis_model->deleteRekjenis($id);
		$this->session->set_flashdata('message_type','<div id="kotak">Data Berhasil dihapus</div>');
		////get item delete page
		$count = count($this->Rekjenis_model->getRekjenis('all',FALSE,FALSE,FALSE));
		$uri = $this->uri->segment(5);
		getPage('rek_jenis','delete',$uri,$count);
	}
}
?>