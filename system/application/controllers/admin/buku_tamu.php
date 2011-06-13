<?
class Buku_tamu extends Controller {
	function Buku_tamu() {
		parent::Controller();
		$this->load->library('session');
		$this->load->model('Bukutamu_model');
		$this->load->helper('proc_helper');
		if(!$this->session->userdata('id_user') && !$this->session->userdata('user_display') ):
			redirect('admin');
		endif;
	}
	
	function index() 
	{
		$this->load->library('pagination');
		$offset = $this->uri->segment(4);
		$config['base_url'] = site_url().'/admin/buku_tamu';
		$config['total_rows'] = count($this->Bukutamu_model->getDataBukuTamu('all',FALSE,FALSE,FALSE));
		$config['per_page'] = $this->config->item('per_page');
		$config['uri_segment'] = '4';
		
		$data['urut'] = $this->uri->segment(4);
		$data['title'] = 'Data Buku Tamu';
		$data['query'] = $this->Bukutamu_model->getDataBukuTamu('all',FALSE,$config['per_page'],$offset);
		$data['main_view'] = 'admin/buku_tamu_view';
		$this->pagination->initialize($config);
		$this->load->view('admin/index',$data);
	}
	

	function delete_BukuTamu()
	{
		$id_bk = $this->uri->segment(4);
		
		$this->Bukutamu_model->deleteBukuTamu($id_bk);
		////get item delete page
		$uri = $this->uri->segment(5);
		$count = count($this->Bukutamu_model->getDataBukuTamu('all',FALSE,FALSE,FALSE));
		getPage('buku_tamu','delete',$uri,$count);
	}
	
}
?>