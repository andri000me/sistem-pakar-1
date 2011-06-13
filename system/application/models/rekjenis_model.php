<?php
class Rekjenis_model extends Model {
	function Rekjenis_model() {
		parent::Model();
		$this->load->helper('proc_helper');
	}
	
	function getRekjenis($query=FALSE,$id_rekj=FALSE,$limit=FALSE,$offset=FALSE)
	{
		if (!$query):
			$this->db->where('id_rek_jenis',$id_rekj);
			return $this->db->get('tb_rek_jenis')->row();
		elseif ($query == 'all'):
			$this->db->limit($limit,$offset);
			$this->db->join('tb_jenis','tb_rek_jenis.kode_jenis = tb_jenis.kode_jenis');
			return $this->db->get('tb_rek_jenis')->result_array();
		endif;
	}

	
	function addRekjenis($data)
	{
		$this->db->insert('tb_rek_jenis',$data);
	}
	
	function editRekjenis($id,$data)
	{
		$this->db->where('id_rek_jenis',$id);
		$this->db->update('tb_rek_jenis',$data);
	}
	
	function deleteRekjenis($id)
	{
		$this->db->where('id_rek_jenis',$id);
		$this->db->delete('tb_rek_jenis');
	}
	

}