<?php
class User extends Controller {
	function User() {
		parent::Controller();
		$this->load->library('session');
		$this->load->model('User_model');
		if(!$this->session->userdata('id_user') && !$this->session->userdata('user_display') ):
			redirect('admin');
		endif;
	}
	
	function index() 
	{
		$this->load->library('pagination');
		$offset = $this->uri->segment(4);
		$config['base_url'] = site_url().'/admin/user/index';
		$config['total_rows'] = count($this->User_model->getUser('all',FALSE,FALSE,FALSE));
		$config['per_page'] = $this->config->item('per_page');
		$config['uri_segment'] = '4';

		$data['urut'] = $this->uri->segment(4);
		$data['title'] = 'Data User';
		$data['query'] = $this->User_model->getUser('all',FALSE,$config['per_page'],$offset);
		$data['main_view'] = 'admin/user/index';
		$this->pagination->initialize($config);
		$this->load->view('admin/index',$data);
	}
	
	function add_user() 
	{
		$this->form_validation->set_rules('username', 'User name','required');
		$this->form_validation->set_rules('user_display', 'Nama','required');
		$this->form_validation->set_rules('password', 'Password','required');
		
		if($this->form_validation->run() == FALSE)
		{
			$data['title'] = 'Data Kawin Silang';
			$data['main_view'] = 'admin/user/add_user';
			$this->load->view('admin/index',$data);
		}
		else
		{
			$data = array(
						'username'=>$this->input->post('username'),
						'user_display'=>$this->input->post('user_display'),
						'password'=>md5($this->input->post('password'))
						);
			$this->User_model->addUser($data);
			$count = count($this->User_model->getUser('all',FALSE,FALSE,FALSE));
			getPage('user','new',FALSE,$count);
		}
	}
	
	function edit_user() 
	{
		$this->form_validation->set_rules('username', 'User name','required');
		$this->form_validation->set_rules('user_display', 'Nama','required');
		$this->form_validation->set_rules('password', 'Password','required');
		
		if($this->form_validation->run() == FALSE)
		{
			$id_us = $this->uri->segment(4);
			$data['title'] = 'Edit User';
			$data['query'] = $this->User_model->getUser(FALSE,$id_us,FALSE,FALSE);
			$data['main_view'] = 'admin/user/edit_user';
			$this->load->view('admin/index',$data);
		}
		else
		{
			$id_us = $this->uri->segment(4);
			$uri = $this->uri->segment(5);
			$data = array(
						'username'=>$this->input->post('username'),
						'user_display'=>$this->input->post('user_display'),
						'password'=>md5($this->input->post('password'))
						);
			$this->User_model->editUser($id_us,$data);
			/////////get last page from helpeerrr
			getPage('user','edit',$uri,FALSE);
		}
	}
	
	function delete_user()
	{
		$id_user = $this->uri->segment(4);
		$uri = $this->uri->segment(5);
		$this->Silang_model->deleteUser($id_user);
		////get item delete page
		$count = count($this->Silang_model->getSilang('all',FALSE,FALSE,FALSE));
		getPage('user','delete',$uri,$count);
		
	}
}
?>