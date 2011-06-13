<?php
class Kon_Jenis extends Controller {
	function Kon_Jenis() {
		parent::Controller();
		$this->load->helper('url');
		$this->load->helper('proc_helper');
		$this->load->library('session');
		$this->load->model('Konsultasi_model');
		}
	function index() ///////// awal konsultasi
	{
		$data['title'] = "Konsultasi Jenis Adenium";
		$data['template'] = 'kon_jenis/kon_jenis_awal';
		$this->load->view('/index',$data);
	}
	
	function kon_jenis_first() ///////// metu pilihan konsltasi 
	{
		$data['title'] = "Ciri - ciri";
		$data['ciri1'] = $this->Konsultasi_model->getCiriJenis('byKodeBag','B001');
		$data['ciri2'] = $this->Konsultasi_model->getCiriJenis('byKodeBag','B002');
		$data['ciri3'] = $this->Konsultasi_model->getCiriJenis('byKodeBag','B003');
		$data['ciri4'] = $this->Konsultasi_model->getCiriJenis('byKodeBag','B005');
		//$data['ciri1'] = $this->Konsultasi_model->getGejalaPenyakit('byKodeBag','B005');
		$data['template'] = 'kon_jenis/kon_jenis_view';
		$this->load->view('/index',$data);	
	}
	
	function kon_process() ///////// kon_proses banyak yg ke helper biar ga ribeet
	{
		$this->form_validation->set_rules('ciri[]', 'Kode Ciri','required');
		
		if($this->form_validation->run() == FALSE)
		{
			redirect('kon_penyakit/kon_penyakit_first');
		}
		else
		{
			$data['title'] = "Hasil Penelusuran";
			$data['template'] = 'kon_jenis/kon_hasil';////////// hasil yg ajaibzzz zz zzz..zz
			$this->load->view('/index',$data);
		}
	}
	
	function kon_detail() // detail jenis
	{
		$kode = $this->uri->segment(3); 
		$this->db->join('tb_jenis','tb_jenis.kode_jenis = tb_rek_jenis.kode_jenis');
		$this->db->where('tb_rek_jenis.kode_jenis',$kode);
		$data['query'] = $this->db->get('tb_rek_jenis')->row();// query yg nyasar jarene di contrler yo ra po2

		$data['title'] = "Detail Hasil Penelusuran";
		$data['template'] = 'kon_jenis/kon_detail';
		$this->load->view('/index',$data);
		
	}
	
} 
