<?php
class Penyakit_model extends Model {
	function Penyakit_model() {
		parent::Model();
		$this->load->helper('proc_helper');
	}
	
	function getPenyakit($query=FALSE,$id_peny=FALSE,$limit=FALSE,$offset=FALSE)
	{
		if (!$query):
			$this->db->where('id_penyakit',$id_peny);
			return $this->db->get('tb_penyakit')->row();
		elseif ($query == 'all'):
			$this->db->limit($limit,$offset);
			$this->db->order_by('id_penyakit');
			return $this->db->get('tb_penyakit')->result_array();
		endif;
	}
	
	function addPenyakit($data)
	{
		$this->db->insert('tb_penyakit',$data);
	}
	
	function editPenyakit($id_peny,$data)
	{
		$this->db->where('id_penyakit',$id_peny);
		$this->db->update('tb_penyakit',$data);
	}
	
	function deletePenyakit($id_peny)
	{
		$this->db->where('id_penyakit',$id_peny);
		$this->db->delete('tb_penyakit');
	}
	

}