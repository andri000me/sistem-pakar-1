<?php
class Jenis_model extends Model {
	function Jenis_model() {
		parent::Model();
	}
	
	function getJenis($query=FALSE,$id_jen=FALSE,$limit=FALSE,$offset=FALSE)
	{
		if (!$query):
			$this->db->where('id_jenis',$id_jen);
			return $this->db->get('tb_jenis')->row();
		elseif ($query == 'all'):
			$this->db->limit($limit,$offset);
			$this->db->order_by('id_jenis');
			return $this->db->get('tb_jenis')->result_array();
		elseif ($query == 'anakan'):
			$this->db->limit($limit,$offset);
			$this->db->where('tipe','anakan');
			$this->db->order_by('id_jenis');
			return $this->db->get('tb_jenis')->result_array();
		elseif ($query == 'indukan'):
			$this->db->limit($limit,$offset);
			$this->db->where('tipe','indukan');
			$this->db->order_by('id_jenis');
			return $this->db->get('tb_jenis')->result_array();
		endif;
	}
	
	function addJenis($data)
	{
		$this->db->insert('tb_jenis',$data);
	}
	
	function editJenis($id_jen,$data)
	{
		$this->db->where('id_jenis',$id_jen);
		$this->db->update('tb_jenis',$data);
	}
	
	function deleteJenis($id_jen)
	{
		$this->db->where('id_jenis',$id_jen);
		$this->db->delete('tb_jenis');
	}
	

}