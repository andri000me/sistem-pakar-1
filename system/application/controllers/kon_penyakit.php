<?php
class Kon_Penyakit extends Controller {
	function Kon_Penyakit() {
		parent::Controller();
		$this->load->helper('url');
		$this->load->helper('proc_helper');
		$this->load->library('session');
		$this->load->model('Konsultasi_model');
		}
	function index() ///////// awal konsultasi
	{
		$data['title'] = "Konsultasi Penyakit";
		$data['template'] = 'kon_penyakit/kon_penyakit_awal';
		$this->load->view('/index',$data);
	}
	
	function kon_penyakit_first() ///////// metu pilihan konsltasi 
	{
		$data['title'] = "Gejala Penyakit";
		$data['gejala1'] = $this->Konsultasi_model->getGejalaPenyakit('byKodeBag','B001');
		$data['gejala2'] = $this->Konsultasi_model->getGejalaPenyakit('byKodeBag','B002');
		$data['gejala3'] = $this->Konsultasi_model->getGejalaPenyakit('byKodeBag','B003');
		$data['gejala4'] = $this->Konsultasi_model->getGejalaPenyakit('byKodeBag','B004');
		$data['gejala5'] = $this->Konsultasi_model->getGejalaPenyakit('byKodeBag','B005');
		$data['template'] = 'kon_penyakit/kon_penyakit_view';
		$this->load->view('/index',$data);	
	}
	
	function kon_process() ///////// kon_proses banyak yg ke helper biar ga ribeet
	{
		$this->form_validation->set_rules('gejala[]', 'Kode Penyakit','required');
		
		if($this->form_validation->run() == FALSE)
		{
			redirect('kon_penyakit/kon_penyakit_first');
		}
		else
		{
			$data['title'] = "Hasil Penelusuran";
			$data['template'] = 'kon_penyakit/kon_hasil';////////// hasil yg ajaibzzz zz zzz..zz
			$this->load->view('/index',$data);
		}
	}
	
	function kon_detail() // detail panyakit
	{
		$kode = $this->uri->segment(3); 
		$this->db->join('tb_penyakit','tb_penyakit.kode_penyakit = tb_rek_penyakit.kode_penyakit');
		$this->db->where('tb_rek_penyakit.kode_penyakit',$kode);
		$data['query'] = $this->db->get('tb_rek_penyakit')->row();// query yg nyasar jarene di contrler yo ra po2

		$data['title'] = "Detail Hasil Penelusuran";
		$data['template'] = 'kon_penyakit/kon_detail';
		$this->load->view('/index',$data);
		
	}
	
} 
