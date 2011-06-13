<?php

class Bukutamu_Model extends Model {
	function Bukutamu_Model() {
		parent::Model();
	}
	
	function getDataBukuTamu($qr=FALSE,$idBk=FALSE,$limit = FALSE,$offset = FALSE)
	{
		if(!$qr)
		{
			$this->db->where('id_bk_tamu',$idBk);
			return $this->db->get('tb_buku_tamu')->row();
		}
		elseif ($qr='all')
		{
			$this->db->limit($limit,$offset);
			$this->db->from('tb_buku_tamu');
			$this->db->order_by("id_bk_tamu", "desc"); 
			return $this->db->get()->result_array();
		}
	}
	
	function DoAddBukuTamu($data)
	{
		$this->db->insert('tb_buku_tamu',$data);
	}
	
	function deleteBukuTamu($id)
	{
		$this->db->where('id_bk_tamu',$id);
		$this->db->delete('tb_buku_tamu');
	}

}
?>