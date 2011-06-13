<?
class Home extends Controller {
	function Home() 
	{
		parent::Controller();
		$this->load->library('session');
		$this->load->helper('proc_helper');
		$this->load->model('Konten_model');
	}
	function index() 
	{
		$data['query']=$this->Konten_model->getKonten('depan',FALSE,FALSE,FALSE);
		$data['title']='Beranda';
		$data['template']='konten';
		$this->load->view('/index',$data);
	}
}
	