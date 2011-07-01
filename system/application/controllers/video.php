<?
class Video extends Controller {
	function Video() 
	{
		parent::Controller();
		$this->load->library('session');
		$this->load->helper('proc_helper');
		$this->load->model('Konten_model');
	}
	function index() 
	{
		//$this->load->library('pagination');
		//$offset = $this->uri->segment(3);
		//$config['base_url'] = site_url().'/video/index';
		//$config['total_rows'] = count($this->Konten_model->getKonten('galery',FALSE,FALSE,FALSE));
		//$config['per_page'] = 6;
		//$config['uri_segment'] = '3';
	
		//$data['query']=$this->Konten_model->getKonten('galery',FALSE,$config['per_page'],$offset);
		$data['title']='Video';
		$data['template']='video';
		//$this->pagination->initialize($config);
		$this->load->view('/index',$data);
	}
}
	