<?
class Kon_Silang extends Controller {
	function Kon_Silang() {
		parent::Controller();
		$this->load->helper('url');
		$this->load->helper('proc_helper');
		$this->load->library('session');
		$this->load->model('Konsultasi_model');
		$this->load->model('Silang_model');
		}
	function index()
	{
		$data['title'] = "Konsultasi Kawin Silang";
		$data['template'] = 'kon_silang/awal';
		$this->load->view('/index',$data);
	}
	
	
	function kon_process()
	{
		$this->form_validation->set_rules('kelj', 'Jenis','required');
		$this->form_validation->set_rules('kelb', 'Jenis','required');
		
		if($this->form_validation->run() == FALSE)
		{
			$id_silang = $this->uri->segment(4);
			$data['title'] = 'Konsultasi Kawin Silang';
			$data['query'] = $this->Silang_model->getSilang(FALSE,$id_silang,FALSE,FALSE);
			$data['template'] = 'kon_silang/view';
			$this->load->view('index',$data);
		}
		else
		{
			////// lets explosifff duaaaar
			$j = explode("-",$this->input->post('kelj'));
			$kdj = $j[0];
			$nmj = $j[1];
				
			$b = explode("-",$this->input->post('kelb'));
			$kdb = $b[0];
			$nmb = $b[1];
			
			$qr1 = $this->db->where('kode_jantan',$kdj);
			$qr1 = $this->db->where('kode_betina',$kdb);
			$qr1 = $this->db->get('tb_kawin_silang');
			
			if($qr1->num_rows()>0):
	
				$qrj = $this->db->where('kode_jenis',$kdj);
				$qrj = $this->db->get('tb_jenis');
				
				$qrb = $this->db->where('kode_jenis',$kdb);
				$qrb = $this->db->get('tb_jenis');
				
				$data['jantan'] = $qrj->row()->nm_jenis;
				$data['betina'] = $qrb->row()->nm_jenis;
				$data['betina'] = $qrb->row()->nm_jenis;
				$data['hasil'] = $qr1->row()->kode_hasil;
				$data['ket'] = $qr1->row()->keterangan;
				
				$data['title'] = 'Hasil Kawin Silang';
				$data['template'] = 'kon_silang/hasil';
				$this->load->view('index',$data);
			else:
				$data['title'] = 'Hasil Kawin Silang';
				$data['template'] = 'kon_silang/no_hasil';
				$this->load->view('index',$data);
			endif;
		
		}
	}
	
	function kon_detail()
	{
		$kode = $this->uri->segment(3);
		
		$this->db->where('kode_jenis',$kode);
		$data['query'] = $this->db->get('tb_jenis')->row();

		$data['title'] = "Detail Hasil Penelusuran";
		$data['template'] = 'kon_silang/kon_detail';
		$this->load->view('/index',$data);
		
	}
	
} 
