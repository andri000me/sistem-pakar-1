<?php
class Penyebab_model extends Model {
	function Penyebab_model() {
		parent::Model();
	}
	
	function getPenyebab($query=FALSE,$id_pyb=FALSE,$limit=FALSE,$offset=FALSE)
	{
		if (!$query):
			$this->db->where('id_penyebab',$id_pyb);
			return $this->db->get('tb_penyebab')->row();
		elseif ($query == 'all'):
			$this->db->limit($limit,$offset);
			return $this->db->get('tb_penyebab')->result_array();
		endif;
	}
	
	function addPenyebab($data)
	{
		$this->db->insert('tb_penyebab',$data);
	}
	
	function editPenyebeb($id_pyb,$data)
	{
		$this->db->where('id_penyebab',$id_pyb);
		$this->db->update('tb_penyebab',$data);
	}
	
	function deletePenyebab($id_pyb)
	{
		$this->db->where('id_penyebab',$id_pyb);
		$this->db->delete('tb_penyebab');
	}
	

}
		
	