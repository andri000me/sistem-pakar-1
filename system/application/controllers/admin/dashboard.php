<?php

class Dashboard extends Controller {

	function Dashboard()
	{
		parent::Controller();
		$this->load->library('session');
	}

	function index() // login
	{
		if($this->session->userdata('user_display')):// nek user nya keadaan login
			$data['title'] = 'Dashboard';
			$data['main_view'] = 'admin/dashboard';// default cont admin 
			$this->load->view('admin/index',$data);
		else:
			$data['title'] = 'Login';
			$this->load->view('admin/login_view',$data);
		endif;

	}

	function doLogout(){
		$this->session->unset_userdata('id_user');
		$this->session->unset_userdata('user_display');
		//$this->session->sess_destroy();
		redirect('admin');
	}

	function login_process()
	{
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() == FALSE):
			$data['title'] = 'Login';
			$this->load->view('admin/login_view',$data);
		else:
			$username = $this->input->post('username');
			$password = md5($this->input->post('password'));
			$this->db->where('username',$username);
			$this->db->where('password',$password);
			$res = $this->db->get('tb_user')->result();

			if (count($res) > 0):
				$this->session->set_userdata('id_user',$res[0]->id_user );
				$this->session->set_userdata('user_display',$res[0]->user_display );
				redirect('admin');
			else:
				$thx='<div id="pesan">Maaf Username atau password anda salah</div>';
				$this->session->set_flashdata('message_type',$thx);
				redirect('admin/dashboard');
			endif;
		endif;
	}



}

?>