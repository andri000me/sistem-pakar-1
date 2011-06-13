<?php
class Tips extends controller{
	function Tips()
	{
		parent::Controller();
		$this->load->library('session');
		$this->load->helper('proc_helper');
		$this->load->model('Konten_model');
		$this->load->helper('text');
	}
		
	function index()
	{
		$data['query']=$this->Konten_model->getKonten('tips',FALSE,FALSE,FALSE);
		$data['title']='Tips';
		$data['template']='tips';
		$this->load->view('/index',$data);
	}
	
	function detail ()
	{
		$id = $this->uri->segment(3);
		$data['query']=$this->Konten_model->getKonten(FALSE,$id,FALSE,FALSE);
		$data['title']='Tips';
		$data['template']='detail';
		$data['url']='tips';
		$this->load->view('/index',$data);
	}
}
?>