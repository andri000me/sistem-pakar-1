<?php
class Silang_model extends Model {
	function Silang_model() {
		parent::Model();
		$this->load->helper('proc_helper');
	}
	
	function getSilang($query=FALSE,$id_sil=FALSE,$limit=FALSE,$offset=FALSE)
	{
		if (!$query):
			$this->db->where('id_silang',$id_sil);
			return $this->db->get('tb_kawin_silang')->row();
		elseif ($query == 'all'):
			$query = $this->db->get('tb_kawin_silang');
		return $query->result_array();
		endif;
	}
	
	function addSilang($data)
	{
		$this->db->insert('tb_kawin_silang',$data);
	}
	
	function editSilang($id_sil,$data)
	{
		$this->db->where('id_silang',$id_sil);
		$this->db->update('tb_kawin_silang',$data);
	}
	
	function deleteSilang($id_sil)
	{
		$this->db->where('id_silang',$id_sil);
		$this->db->delete('tb_kawin_silang');
	}
	

}