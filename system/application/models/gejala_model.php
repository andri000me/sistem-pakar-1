<?php
class Gejala_model extends Model {
	function Gejala_model() {
		parent::Model();
		$this->load->helper('proc_helper');
	}
	
	function getGejalaPenyakit($query=FALSE,$id_gej=FALSE,$limit=FALSE,$offset=FALSE)
	{
		if (!$query):
			$this->db->where('id_gejala',$id_gej);
			return $this->db->get('tb_gejala')->row();
		else:
			if ($query == 'all'):
				$this->db->limit($limit,$offset);
				$this->db->join('tb_bagian','tb_bagian.kode_bagian = tb_gejala.kode_bagian');
				return $this->db->get('tb_gejala')->result_array();
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
	
	function addGejala($data)
	{
		$this->db->insert('tb_gejala',$data);
	}
	
	function editGejala($id_gej,$data)
	{
		$this->db->where('id_gejala',$id_gej);
		$this->db->update('tb_gejala',$data);
	}
	
	function deleteGejala($id_gej)
	{
		$this->db->where('id_gejala',$id_gej);
		$this->db->delete('tb_gejala');
	}
	

}
		
	