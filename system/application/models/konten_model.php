<?php
class Konten_model extends Model {
	function Konten_model() {
		parent::Model();
	}
	
	function getKonten($query=FALSE,$id_konten=FALSE,$limit=FALSE,$offset=FALSE)
	{
		if (!$query):
			$this->db->where('id_konten',$id_konten);
			return $this->db->get('tb_konten')->row();
		elseif ($query == 'all'):
			$this->db->limit($limit,$offset);
			return $this->db->get('tb_konten')->result_array();
		elseif ($query):
			$this->db->where('page',$query);
			$this->db->limit($limit,$offset);
			return $this->db->get('tb_konten')->result_array();
		endif;
	}
	
	function addKonten($data)
	{
		$this->db->insert('tb_konten',$data);
	}
	
	function editKonten($id_konten,$data)
	{
		$this->db->where('id_konten',$id_konten);
		$this->db->update('tb_konten',$data);
	}
	
	function deleteKonten($id_konten)
	{
		$this->db->where('id_konten',$id_konten);
		$this->db->delete('tb_konten');
	}
	

}
		
	