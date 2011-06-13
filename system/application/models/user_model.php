<?php
class User_model extends Model {
	function User_model() {
		parent::Model();
		$this->load->helper('proc_helper');
	}
	
	function getUser($query=FALSE,$id_us=FALSE,$limit=FALSE,$offset=FALSE)
	{
		if (!$query):
			$this->db->where('id_user',$id_us);
			return $this->db->get('tb_user')->row();
		elseif ($query == 'all'):
			$this->db->limit($limit,$offset);
			$this->db->order_by('id_user');
			return $this->db->get('tb_user')->result_array();
		endif;
	}
	
	function addUser($data)
	{
		$this->db->insert('tb_user',$data);
	}
	
	function editUser($id_us,$data)
	{
		$this->db->where('id_user',$id_us);
		$this->db->update('tb_user',$data);
	}
	
	function deleteUser($id_us)
	{
		$this->db->where('id_user',$id_us);
		$this->db->delete('tb_user');
	}
	

}