<?php
class Rekpenyakit_model extends Model {
	function Rekpenyakit_model() {
		parent::Model();
		$this->load->helper('proc_helper');
	}
	
	function getRekpenyakit($query=FALSE,$id_rekp=FALSE,$limit=FALSE,$offset=FALSE)
	{
		if (!$query):
			$this->db->where('id_rek_penyakit',$id_rekp);
			return $this->db->get('tb_rek_penyakit')->row();
		elseif ($query == 'all'):
			$this->db->limit($limit,$offset);
			$this->db->join('tb_penyakit','tb_rek_penyakit.kode_penyakit = tb_penyakit.kode_penyakit');
			return $this->db->get('tb_rek_penyakit')->result_array();
		endif;
	}

	
	function addRekpenyakit($data)
	{
		$this->db->insert('tb_rek_penyakit',$data);
	}
	
	function editRekpenyakit($id,$data)
	{
		$this->db->where('id_rek_penyakit',$id);
		$this->db->update('tb_rek_penyakit',$data);
	}
	
	function deleteRekpenyakit($id)
	{
		$this->db->where('id_rek_penyakit',$id);
		$this->db->delete('tb_rek_penyakit');
	}
	

}