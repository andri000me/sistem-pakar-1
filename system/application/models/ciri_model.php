<?php
class Ciri_model extends Model {
	function Ciri_model() {
		parent::Model();
	}
	
	function getCiri($query=FALSE,$id_ciri=FALSE,$limit=FALSE,$offset=FALSE)
	{
		if (!$query):
			$this->db->where('id_ciri',$id_ciri);
			return $this->db->get('tb_ciri')->row();
		else:
			if ($query == 'all'):
				$this->db->limit($limit,$offset);
				$this->db->order_by('id_ciri');
				$this->db->join('tb_bagian','tb_bagian.kode_bagian = tb_ciri.kode_bagian');
				return $this->db->get('tb_ciri')->result_array();
			endif;
			if ($query == 'bunga'):
				$this->db->where('kode_bagian','B001');
			elseif ($query == 'batang'):
				$this->db->where('kode_bagian','B002');
			elseif ($query == 'daun'):
				$this->db->where('kode_bagian','B003');
			elseif ($query == 'akar'):
				$this->db->where('kode_bagian','B004');
			elseif ($query == 'bonggol'):
				$this->db->where('kode_bagian','B005');
			endif;
			return $this->db->get('tb_gejala')->result_array();
		endif;
	}
	
	function addCiri($data)
	{
		$this->db->insert('tb_ciri',$data);
	}
	
	function editCiri($id_ciri,$data)
	{
		$this->db->where('id_ciri',$id_ciri);
		$this->db->update('tb_ciri',$data);
	}
	
	function deleteCiri($id_ciri)
	{
		$this->db->where('id_ciri',$id_ciri);
		$this->db->delete('tb_ciri');
	}
	

}