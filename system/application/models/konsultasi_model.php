<?
class Konsultasi_model extends Model {
	function Konsultasi_model() {
		parent::Model();
		
	}
	
	function getGejalaPenyakit($query=FALSE,$kd_bag=FALSE) {
		if ($query=='all'):
			return $this->db->get('tb_gejala')->result_array();
		elseif ($query=='byKodeBag'):
			$this->db->where('kode_bagian',$kd_bag);
			return $this->db->get('tb_gejala')->result_array();
		endif;
	}
	
	function getCiriJenis($query=FALSE,$kd_bag=FALSE) {
		if ($query=='all'):
			return $this->db->get('tb_ciri')->result_array();
		elseif ($query=='byKodeBag'):
			$this->db->where('kode_bagian',$kd_bag);
			return $this->db->get('tb_ciri')->result_array();
		endif;
	}
	
	function getPilihanGejala($kode_gejala)
	{
		foreach ($kode_gejala as $val => $kode){	
		$this->db->where('kode_gejala',$kode['kode']);
		return $this->db->get('tb_gejala')->result_array();
		}
	}
	function getPilihanCiri($kode_ciri)
	{
		foreach ($kode_ciri as $val => $kode){	
		$this->db->where('kode_ciri',$kode['kode']);
		return $this->db->get('tb_ciri')->result_array();
		}
	}
}
	

	