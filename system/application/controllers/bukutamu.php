<?php
class BukuTamu extends Controller {
	function BukuTamu() {
		parent::Controller();
		$this->load->model('buku_tamu_model');
		$this->load->library('session');
	}
	
	function index(){
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('komentar', 'Message', 'required');
		if ($this->form_validation->run() == FALSE){
			$data['title'] = 'Buku Tamu';
			$offset = $this->uri->segment(3);
			$this->load->library('pagination');
			$config['total_rows'] = $this->db->count_all('tb_buku_tamu');
			$config['base_url'] = base_url().'/bukutamu/index';
			$config['per_page'] = 3;
			$config['uri_segment'] = 3;
			$config['next_link'] = '&raquo;';
			$config['prev_link'] = '&laquo;';
			$this->pagination->initialize($config);
			$data['template'] = 'buku_tamu_view';
			$data['arrBuku'] = $this->buku_tamu_model->GetDataBukuTamu($config['per_page'],$offset);
			$this->load->view('/index',$data);
		}
		else{
			session_start();
			$data = array('nama' => $this->input->post('name'),
						'email' => $this->input->post('email'),
						'komentar' => $this->input->post('komentar'),
						);
			$this->buku_tamu_model->DoAddBukuTamu($data);
			$thx='<div id="pesan">Terimakasih atas partisipasi anda</div>';
			$this->session->set_flashdata('message_type',$thx);
			redirect('bukutamu');
			
		}
	}
	
}

		