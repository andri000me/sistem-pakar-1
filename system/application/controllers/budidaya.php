<?php
class Budidaya extends controller{
	function Budidaya()
	{
		parent::Controller();
		$this->load->library('session');
		$this->load->helper('proc_helper');
		$this->load->helper('text');
		$this->load->model('Konten_model');
	}
		
	function index()
	{
		$data['query']=$this->Konten_model->getKonten('profil',FALSE,FALSE,FALSE);
		$data['title']='Budidaya';
		$data['template']='konten';
		$this->load->view('/index',$data);
	}
	
	function generatif()
	{
		$data['query']=$this->Konten_model->getKonten('generatif',FALSE,FALSE,FALSE);
		$data['title']='Budidaya Generatif';
		$data['template']='konten';
		$this->load->view('/index',$data);
	}
	
	function vegetatif()
	{
		$data['query']=$this->Konten_model->getKonten('vegetatif',FALSE,FALSE,FALSE);
		$data['title']='Budidaya Vegetatif';
		$data['template']='budidaya';
		$this->load->view('/index',$data);
	}
	
	function kawin_silang()
	{
		$data['query']=$this->Konten_model->getKonten('kawin-silang',FALSE,FALSE,FALSE);
		$data['title']='Budidaya Kawin Silang';
		$data['template']='konten';
		$this->load->view('/index',$data);
	}
	
	function detail ()
	{
		$id = $this->uri->segment(3);
		$data['query']=$this->Konten_model->getKonten(FALSE,$id,FALSE,FALSE);
		$data['title']='Budidaya Vegetatif';
		$data['url']='budidaya/vegetatif';
		$data['template']='detail';
		$this->load->view('/index',$data);
	}
}

?>
