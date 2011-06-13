<?php
class Profil extends controller{
	function Profil()
	{
		parent::Controller();
		$this->load->library('session');
		$this->load->helper('proc_helper');
		$this->load->model('Konten_model');
	}
		
	function index()
	{
		$data['query']=$this->Konten_model->getKonten('profil',FALSE,FALSE,FALSE);
		$data['title']='Profil';
		$data['template']='konten';
		$this->load->view('/index',$data);
	}
}
?>