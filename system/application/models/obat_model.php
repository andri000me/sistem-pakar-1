<?php
class Obat_model extends Model {
	function Obat_model() {
		parent::Model();
	}
	
	function getObat($query=FALSE,$id_obat=FALSE,$limit=FALSE,$offset=FALSE)
	{
		if (!$query):
			$this->db->where('id_obat',$id_obat);
			return $this->db->get('tb_obat')->row();
		elseif ($query == 'all'):
			$this->db->limit($limit,$offset);
			return $this->db->get('tb_obat')->result_array();
		endif;
	}
	
	function addObat($data)
	{
		$this->db->insert('tb_obat',$data);
	}
	
	function editObat($id_obat,$data)
	{
		$this->db->where('id_obat',$id_obat);
		$this->db->update('tb_obat',$data);
	}
	
	function deleteObat($id_obat)
	{
		$this->db->where('id_obat',$id_obat);
		$this->db->delete('tb_obat');
	}
	

}
		
	