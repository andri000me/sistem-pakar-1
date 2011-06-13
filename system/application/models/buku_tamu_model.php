<?php

class Buku_Tamu_Model extends Model {
	function Buku_Tamu_Model() {
		parent::Model();
	}
	
	function GetDataBukuTamu($limit = FALSE,$offset = FALSE)
	{
		$this->db->limit($limit,$offset);
		$this->db->from('tb_buku_tamu');
		$this->db->order_by("id_bk_tamu", "desc"); 
		return $this->db->get()->result();
	}
	
	function DoAddBukuTamu($data)
	{
		$this->db->insert('tb_buku_tamu',$data);
	}
	

}
?>