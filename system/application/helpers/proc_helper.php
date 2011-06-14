<?php

function getPilihanya() // nampilih gejala yg di pilih user
{
	$ci=& get_instance();
	$qr = $ci->db->get('tb_gejala');
	$rs = $qr->result_array();
		$no = 1;
		foreach ($ci->input->post('gejala') as $pl)
		{
			//$gjl =  $ci->input->post('gejala'.$pl['id_gejala']);  
			if (!empty($pl))
			{  
				$ci->db->where('kode_gejala',$pl);  
				$query = $ci->db->get('tb_gejala');
				$res = $query->result_array();
				
				foreach ($res as $pilihan):
					echo $no.'. ';
					echo $pilihan['nm_gejala']."<br />"; // langsung tampil ke view nya
				$no++;
				endforeach;
				
			}
			
		}
}
 
function getHasilPenyakit() // nah ini nih the key of process jiaah..bisa di adopsi 
{
	$ci=& get_instance();
	unset($pilih);
	$pilih = array();
  	$i = 0;
	$ci->db->order_by('id_gejala');
	$qr = $ci->db->get('tb_gejala');
	
	foreach ($ci->input->post('gejala') as $pl) // array inputan user di urai dlu
	{
		if (!empty($pl))
		{  
			foreach ($qr->result_array() as $row) // uray array gejala
			{
				if ($pl == $row['kode_gejala']) // cek kode nya 
				{
					$pilih[$i] = $row['kode_gejala']; // tho code has been detected 
					$i++;	
				}
			}
		}
	}
	
	unset($penyakit); 
	unset($persentase);		  
	$penyakit = array();
	$persentase = array();
  	$i = -1;

	$ci->db->order_by('id_penyakit');
	$qrPeny = $ci->db->get('tb_penyakit');
	
	foreach ($qrPeny->result_array() as $rowPeny) // urai array penyakit
	{
		$i++;
		$penyakit[$i] = $rowPeny['kode_penyakit'];
		$persentase[$i] = 0; // persen di set 0 dlu
		
		$ci->db->where('kode_penyakit',$penyakit[$i]);
		$qrRek = $ci->db->get('tb_rek_penyakit');
		
		if ($qrRek->num_rows()>0) // cek rows nya ada ndak??
		{
			foreach ($qrRek->result_array() as $rowRek)
			{
				unset($gej);
				$gej = array();
				$gej = explode(".",$rowRek['kode_gejala']); // ekplod kode kode nya 
				$jmltot = count($gej); // dijumlah kode2 nya
				
				$jml = 0;
				for ($j = 0; $j < count($gej); $j++)//mengambil semua gejala pada suatu penyakit
				{
					for ($k = 0; $k < count($pilih); $k++)//mengambil gejala-gejala yang dipilih oleh user
					{
						if ($gej[$j] == $pilih[$k])//proses pencocokan gejala yang dipilih dengan gejala suatu penyakit
						{
							$jml++; // get jumlah yg cocok
						}
					}
				}
				$persentase[$i] = $jml / $jmltot;//proses perhitungan persentase suatu gangguan
			}
		}
	}
	
	for ($i=0;$i<count($penyakit);$i++) // ribett
	{
		for ($j=$i+1;$j<count($penyakit);$j++)
		{
			if ($persentase[$j] > $persentase[$i])
			{
				$tmppersentase = $persentase[$i];
				$persentase[$i] = $persentase[$j];
				$persentase[$j] = $tmppersentase;
				$tmppenyakit = $penyakit[$i];
				$penyakit[$i] = $penyakit[$j];
				$penyakit[$j] = $tmppenyakit;
			} 
		}
	}
	$xx=0;//??
	for ($i=0;$i<count($penyakit);$i++)
	{
		$ci->db->where('kode_penyakit',$penyakit[$i]);// lets get the penyakkkit
		$qrR = $ci->db->get('tb_penyakit');
		
		foreach ($qrR->result_array() as $rowR) // urai 
		{	
			if ($persentase[$i] >= 0.5)// kalo gejala yg sama lebih dr setengah maka tampilah dia
			{  
			
				$xx=1;
				echo ($i + 1).'. ';
				echo $rowR['nm_penyakit']." ";
				$persen = sprintf("%0.2f",($persentase[$i] * 100)); // jadiin persen dulu
				echo $persen."%  ";
				echo '<a href='.base_url().'kon_penyakit/kon_detail/'.$rowR['kode_penyakit'].'>detail</a></td>';// link ke detail penyakitnya
				echo "<br />";

			}
		}
	}
	if($xx==0)
	{
		echo "Data yang anda masukan tidak valid, mohon ulangi";//
		echo '<br /><br /><h3><a href="'.base_url().'kon_penyakit"> &laquo; back</a></h3>';
	}
}

///////////////////////// end of penakit

function getPilihJenis() // nampilih ciri yg di pilih user
{
	$ci=& get_instance();
	$qr = $ci->db->get('tb_ciri');
	$rs = $qr->result_array();
		$no = 1;
		foreach ($ci->input->post('ciri') as $pl)
		{
			if (!empty($pl))
			{  
				$ci->db->where('kode_ciri',$pl);  
				$query = $ci->db->get('tb_ciri');
				$res = $query->result_array();
				
				foreach ($res as $pilihan):
					echo $no.'. ';
					echo $pilihan['nm_ciri']."<br />"; // langsung tampil ke view nya
				$no++;
				endforeach;
				
			}
			
		}
}
 
function getHasilJenis() // nah ini nih the key of process jiaah..bisa di adopsi 
{
	$ci=& get_instance();
	unset($pilih);
	$pilih = array();
  	$i = 0;
	$ci->db->order_by('id_ciri');
	$qr = $ci->db->get('tb_ciri');
	
	foreach ($ci->input->post('ciri') as $pl) // array inputan user di urai dlu
	{
		if (!empty($pl))
		{  
			foreach ($qr->result_array() as $row) // uray array ciri
			{
				if ($pl == $row['kode_ciri']) // cek kode nya 
				{
					$pilih[$i] = $row['kode_ciri']; // tho code has been detected 
					$i++;	
				}
			}
		}
	}
	
	unset($jenis); 
	unset($persentase);		  
	$jenis = array();
	$persentase = array();
  	$i = -1;

	$ci->db->order_by('id_jenis');
	$qrJen = $ci->db->get('tb_jenis');
	
	foreach ($qrJen->result_array() as $rowJen) // urai array jenis
	{
		$i++;
		$jenis[$i] = $rowJen['kode_jenis'];
		$persentase[$i] = 0; // persen di set 0 dlu
		
		$ci->db->where('kode_jenis',$jenis[$i]);
		$qrRek = $ci->db->get('tb_rek_jenis');
		
		if ($qrRek->num_rows()>0) // cek rows nya ada ndak??
		{
			foreach ($qrRek->result_array() as $rowRek)
			{
				unset($cr);
				$cr = array();
				$cr = explode(".",$rowRek['kode_ciri']); // ekplod kode kode nya 
				$jmltot = count($cr); // dijumlah kode2 nya
				
				$jml = 0;
				for ($j = 0; $j < count($cr); $j++)//mengambil semua ciri pada suatu penyakit
				{
					for ($k = 0; $k < count($pilih); $k++)//mengambil ciri yang dipilih oleh user
					{
						if ($cr[$j] == $pilih[$k])//proses pencocokan ciri yang dipilih dengan ciri suatu jenids
						{
							$jml++; // get jumlah yg cocok
						}
					}
				}
				$persentase[$i] = $jml / $jmltot;//proses perhitungan persentase suatu gangguan
			}
		}
	}
	
	for ($i=0;$i<count($jenis);$i++) // ribett
	{
		for ($j=$i+1;$j<count($jenis);$j++)
		{
			if ($persentase[$j] > $persentase[$i])
			{
				$tmppersentase = $persentase[$i];
				$persentase[$i] = $persentase[$j];
				$persentase[$j] = $tmppersentase;
				$tmpjenis = $jenis[$i];
				$jenis[$i] = $jenis[$j];
				$jenis[$j] = $tmpjenis;
			} 
		}
	}
	$xx=0;//??
	for ($i=0;$i<count($jenis);$i++)
	{
		$ci->db->where('kode_jenis',$jenis[$i]);// lets get the jenis
		$qrR = $ci->db->get('tb_jenis');
		
		foreach ($qrR->result_array() as $rowR) // urai 
		{	
			if ($persentase[$i] >= 0.5)// kalo ciri yg sama lebih dr setengah maka tampilah dia
			{  
			
				$xx=1;
				echo ($i + 1).'. ';
				echo $rowR['nm_jenis']." ";
				$persen = sprintf("%0.2f",($persentase[$i] * 100)); // jadiin persen dulu
				echo $persen."%  ";
				echo '<a href='.base_url().'kon_jenis/kon_detail/'.$rowR['kode_jenis'].'>detail</a></td>';// link ke detail jenisnya
				echo "<br />";

			}
		}
	}
	if($xx==0)
	{
		echo "Data yang anda masukan tidak valid, mohon ulangi";//
		echo '<br /><br /><h3><a href="'.base_url().'kon_jenis"> &laquo; back</a></h3>';
	}
}
////////////////////// end of jenis

function bagianDropdown($func,$selected=FALSE) // dropdown bwt bagian like: daun,bunga dll
{
	$ci=& get_instance();
    $query = $ci->db->get('tb_bagian');
    $res = $query->result_array();

    if($func=='content'):
    	$output = "<select id='kode_bagian' name='kode_bagian' class='title'>";
		    foreach($res as $row):
		    	if($selected):
		    		if($row["kode_bagian"]==$selected):
						$output .= "<option value='".$row["kode_bagian"]."' selected='selected'>".$row['nm_bagian']."</option>";
					else:
						$output .= "<option value='".$row["kode_bagian"]."'>".$row['nm_bagian']."</option>";
					endif;
		    	else:
		    		$output .= "<option value='".$row["kode_bagian"]."'>".$row['nm_bagian']."</option>";
		    	endif;
		    endforeach;
	    $output .= "</select>";
    endif;
    return $output;
}

function jenisDropdown($tipe=FALSE,$kel=FALSE,$func=FALSE,$selected=FALSE) // drop down jenis kel, dipisah antara laki2 dan perempuan 
{
	$ci=& get_instance();
	if($kel):
		$query = $ci->db->where('tipe','indukan');
		$query = $ci->db->get('tb_jenis');
		$res = $query->result_array();
		if($kel == 'jantan'):
			$nm = 'kelj';
		elseif($kel == 'betina'):
			$nm = 'kelb';
		endif;
	else:
		$query = $ci->db->get('tb_jenis');
		$res = $query->result_array();
		$nm = 'kel';
	endif;
    if($func=='list'):
    	$output = "<select id='".$nm."' name='".$nm."' class='title'>";
		    foreach($res as $row):
		    	if($selected):
		    		if($row["kode_jenis"]==$selected):
						$output .= "<option value='".$row['kode_jenis']."-".$row['nm_jenis']."' selected='selected'>".$row['kode_jenis']." - ".$row['nm_jenis']."</option>";
					else:
						$output .= "<option value='".$row['kode_jenis']."-".$row['nm_jenis']."'>".$row['kode_jenis']." - ".$row['nm_jenis']."</option>";
					endif;
		    	else:
		    		$output .= "<option value='".$row['kode_jenis']."-".$row['nm_jenis']."'>".$row['kode_jenis']." - ".$row['nm_jenis']."</option>";
		    	endif;
		    endforeach;
	    $output .= "</select>";
		
	elseif($func=='list_edit'):
		$query = $ci->db->get('tb_jenis');
		$res = $query->result_array();
		$output = "<select id='kode_jenis' name='kode_jenis' class='title'>";
			foreach($res as $row):
					if($selected):
						if($row["kode_jenis"]==$selected):
							$output .= "<option value='".$row["kode_jenis"]."' selected='selected'>".$row['kode_jenis']." - ".$row['nm_jenis']."</option>";
						else:
							$output .= "<option value='".$row["kode_jenis"]."'>".$row['kode_jenis']." - ".$row['nm_jenis']."</option>";
						endif;
					else:
						$output .= "<option value='".$row["kode_jenis"]."'>".$row['kode_jenis']." - ".$row['nm_jenis']."</option>";
					endif;
			endforeach;
		$output .= "</select>";
		
	elseif($func=='list_add'):

		$query1 = $ci->db->get('tb_rek_jenis');
		$res1 = $query1->result_array();
		
		foreach($res1 as $row1):////////biar jenis yang tampil yg blm di pilh tok biar ga ke pilih 2 kali
			$ci->db->where('kode_jenis !=', $row1['kode_jenis']);// cek di rekomendasi jenis dah ada belum
			$ci->db->order_by('id_jenis');
		endforeach;
			$query = $ci->db->get('tb_jenis');
			$res = $query->result_array();
				$output = "<select id='kode_jenis' name='kode_jenis' class='title'>";
					foreach($res as $row):
						if($selected):
							if($row["kode_jenis"]==$selected):
								$output .= "<option value='".$row["kode_jenis"]."' selected='selected'>".$row['kode_jenis']." - ".$row['nm_jenis']."</option>";
							else:
								$output .= "<option value='".$row["kode_jenis"]."'>".$row['kode_jenis']." - ".$row['nm_jenis']."</option>";
							endif;
						else:
							$output .= "<option value='".$row["kode_jenis"]."'>".$row['kode_jenis']." - ".$row['nm_jenis']."</option>";
						endif;
					endforeach;
				$output .= "</select>";
    endif;
    return $output;
}

function pageDropdown($func,$selected=FALSE) //dropdown untuk halaman
{
	$ci=& get_instance();
    $query = $ci->db->get('tb_page');
    $res = $query->result_array();

    if($func=='list'):
    	$output = "<select id='page' name='page' class='title'>";
		    foreach($res as $row):
		    	if($selected):
		    		if($row["nm_page"]==$selected):
						$output .= "<option value='".$row["nm_page"]."' selected='selected'>".$row['nm_page']."</option>";
					else:
						$output .= "<option value='".$row["nm_page"]."'>".$row['nm_page']."</option>";
					endif;
		    	else:
		    		$output .= "<option value='".$row["nm_page"]."'>".$row['nm_page']."</option>";
		    	endif;
		    endforeach;
	    $output .= "</select>";
    endif;
    return $output;
}

function kelDropdown($selected)// drop down jen kelamin
{
	$options = array(
                  'jantan'=>'Jantan',
                  'betina'=>'Betina'
                );
	return form_dropdown('kel',$options,$selected);
}

function tipeDropdown($selected)// drop down jen kelamin
{
	$options = array(
                  'indukan'=>'Indukan',
                  'anakan'=>'Anakan'
                );
	return form_dropdown('tipe',$options,$selected);
}

function penyakitDropdown($func,$selected=FALSE)//dropdown buat penyakittnya
{
	$ci=& get_instance();
	if($func=='list_edit'):
		$query = $ci->db->get('tb_penyakit');
		$res = $query->result_array();
		$output = "<select id='kode_penyakit' name='kode_penyakit' class='title'>";
			foreach($res as $row):
					if($selected):
						if($row["kode_penyakit"]==$selected):
							$output .= "<option value='".$row["kode_penyakit"]."' selected='selected'>".$row['kode_penyakit']." - ".$row['nm_penyakit']."</option>";
						else:
							$output .= "<option value='".$row["kode_penyakit"]."'>".$row['kode_penyakit']." - ".$row['nm_penyakit']."</option>";
						endif;
					else:
						$output .= "<option value='".$row["kode_penyakit"]."'>".$row['kode_penyakit']." - ".$row['nm_penyakit']."</option>";
					endif;
			endforeach;
		$output .= "</select>";
		
	elseif($func=='list_add'):

		$query1 = $ci->db->get('tb_rek_penyakit');
		$res1 = $query1->result_array();
		
		foreach($res1 as $row1):////////biar penyakit yang tampil yg blm di pilh tok biar ga ke pilih 2 kali
			$ci->db->where('kode_penyakit !=', $row1['kode_penyakit']);// cek di rekomendasi penyakitnya dah ada belum
			$ci->db->order_by('id_penyakit');
		endforeach;
			$query = $ci->db->get('tb_penyakit');
			$res = $query->result_array();
				$output = "<select id='kode_penyakit' name='kode_penyakit' class='title'>";
					foreach($res as $row):
						if($selected):
							if($row["kode_penyakit"]==$selected):
								$output .= "<option value='".$row["kode_penyakit"]."' selected='selected'>".$row['kode_penyakit']." - ".$row['nm_penyakit']."</option>";
							else:
								$output .= "<option value='".$row["kode_penyakit"]."'>".$row['kode_penyakit']." - ".$row['nm_penyakit']."</option>";
							endif;
						else:
							$output .= "<option value='".$row["kode_penyakit"]."'>".$row['kode_penyakit']." - ".$row['nm_penyakit']."</option>";
						endif;
					endforeach;
				$output .= "</select>";
	endif;
    return $output;
	
}


/*made in nyonto hahahah.....buat nampilin edit data rekomendasi penyakit,
buat nampilin yg lain jg bisa, cz nama tabel, where, trus, 
field yg di tampilin di jadiin object berguna bgt buat nampilin data edit */
function fetchRow($table, $where = "", $fieldName = "") 
{ 
	$arrResult = array();
	$fieldStr = "";
	if (empty($fieldName) ) {
		$fieldStr = "*  ";
	}
	else if (is_array($fieldName) ){
		foreach ($fieldName as $field) {
			$fieldStr .= $field.", ";
		}
	}
	else {
		for ($i = 2; $i < func_num_args(); $i++){
			$fieldStr	.= func_get_arg($i).", ";
		}
	}
	$fields = substr($fieldStr, 0, -2);

	$query = "SELECT ".$fields." FROM ".$table." ".$where;
	$result = mysql_query($query) or die("You have an error in your SQL syntax." . mysql_error());
	while ($row = mysql_fetch_assoc($result) ) {
		array_push($arrResult, $row);
	}
	return $arrResult;
}

function inf_crop_box($image,$size,$filename,$ext,$filepath)// fung si untuk crop image biar ukurannya ga terlalu besar
{
	$ci =& get_instance();

	$image_size = getimagesize($image);
	$image_width = $image_size['0'];
	$image_height = $image_size['1'];

	$config['image_library'] = 'gd2';
	$config['source_image'] = $image;
	$config['new_image'] = $filename.'_'.$size.'x'.$size.$ext;
	$config['maintain_ratio'] = FALSE;
	if($image_width > $image_height):
		$config['height'] = $image_height;
		$config['width'] = $image_height;
	elseif($image_width < $image_height):
		$config['height'] = $image_width;
		$config['width'] = $image_width;
	else:
		$config['height'] = $image_width;
		$config['width'] = $image_width;
	endif;

	if($image_width > $image_height):
		$config['x_axis'] = (10/100)*$image_width;
		$config['y_axis'] = '0';
	elseif($image_width < $image_height):
		$config['x_axis'] = '0';
		$config['y_axis'] = (10/100)*$image_height;
	else:
		$config['x_axis'] = (10/100)*$image_width;
		$config['y_axis'] = '0';
	endif;
	$ci->image_lib->initialize($config);
	$ci->image_lib->crop();

	$ci->image_lib->clear();

	$config2['image_library'] = 'gd2';// pake library resize
	$config2['source_image'] = $filepath.$config['new_image'];
	$config2['maintain_ratio'] = TRUE;
	$config2['height'] = $size;
	$config2['width'] = $size;

	$ci->image_lib->initialize($config2);
	$ci->image_lib->resize();

	return $config['new_image'];

}

function getPenyebab($kode)// fungsi buat nampilin obat
{
	$ci=& get_instance();
	$kd_pb = explode(".",$kode);
	$no = 1;
	for ($i=0;$i<count($kd_pb);$i++):
		$ci->db->where('kode_penyebab',$kd_pb[$i]);
		$qr_res = $ci->db->get('tb_penyebab')->row();
		echo '<p>'.$no.'. '.$qr_res->nm_penyebab.'<p/>' ;
	$no++;
	endfor;
}

function getObat($kode)
{
	$ci=& get_instance();
	$kd_ob = explode(".",$kode);
	$no = 1;
	for ($i=0;$i<count($kd_ob);$i++):
		$ci->db->where('kode_obat',$kd_ob[$i]);
		$qr_res = $ci->db->get('tb_obat')->row();
		echo '<p>'.$no.'. '.$qr_res->nm_obat.'<p/>' ;
	$no++;
	endfor;
}

function getTabelSilang()
{
	$ci=& get_instance();
	
	//$urut = $this->uri->segment(4);
	//$kd_ob = explode(".",$kode);
	/// the manual queeeeeeri
	$query = "SELECT  s.id_silang,j.kode_jenis,j.nm_jenis,b.kode_jenis,b.nm_jenis,s.kode_hasil
				FROM tb_kawin_silang s
				JOIN tb_jenis j ON j.kode_jenis = s.kode_jantan
				JOIN tb_jenis b ON b.kode_jenis = s.kode_betina
				ORDER BY s.id_silang
			";
	$hasil = mysql_query($query);
	$i = 1;
	while($data=mysql_fetch_row($hasil))
	{
		echo '<tr class=';
		if ($i %2 == 0) 
		echo 'zebra';
		echo '>';
		echo '<td>'.$i.'</td>';
		echo '<td>'.$data[2].'</td>';
		echo '<td>'.$data[4].'</td>';
		$k = array();
		$k = explode (".",$data[5]);

		$jml_k = count($k);
				echo $jml_k;
		echo '<td>';
			for ($x = 0; $x < count($k) ; $x++)
			{
				
				$qr = $ci->db->where('kode_jenis',$k[$x]);
				$qr = $ci->db->get('tb_jenis');
				foreach ($qr->result_array() as $row)
				{
					echo '<p>'.$row['nm_jenis'].'</p>';
				}
			}
		echo '</td>';
		echo '<td><div class="action"><a class="update" href="'.site_url().'admin/silang/edit_silang/'.$data[0].'/'.$i.'">Edit</a> |'; 
		echo '<a class="delete" href="'.site_url().'admin/silang/delete_silang/'.$data[0].'/'.$i.'">Hapus</a></div></td>';
		echo '</tr>';
		$i++;
	}

}

function getHasilSilang($kd_hsl)
{
	$ci=& get_instance();
	$k = explode(".",$kd_hsl);
	$no = 1;
	for ($i=0;$i<count($k);$i++):
		$ci->db->where('kode_jenis',$k[$i]);
		$qr_res = $ci->db->get('tb_jenis')->row();
		echo '<p>'.$no.'. '.$qr_res->nm_jenis.' '.anchor('kon_silang/kon_detail/'.$qr_res->kode_jenis,'detail');'<p/>' ;

	$no++;
	endfor;
}

function getGenerateCode($tabel,$id)// fungsi buat generate code otomatis upto 1000 code
{
	$ci=& get_instance();
	$ci->db->select_max($id);
	$query = $ci->db->get($tabel);
	$cek = $ci->db->get($tabel);
	if	($cek->num_rows() != 0)
	{
		//echo $query->num_rows();
		$last_id = $query->row()->$id;
		if ($last_id == 9 || $last_id == 99 || $last_id == 999 ):// limiter 
			$cek = strlen($last_id+1);
		else:
			$cek = strlen($last_id);
		endif;
		if($tabel == 'tb_penyakit'):
			if ($cek == 1):
				$code = "P00";
			elseif ($cek == 2):
				$code = "P0";
			elseif ($cek == 3):
				$code = "P";
			endif;
		elseif($tabel == 'tb_gejala'):
			if ($cek == 1):
				$code = "G00";
			elseif ($cek == 2):
				$code = "G0";
			elseif ($cek == 3):
				$code = "G";
			endif;
		elseif($tabel == 'tb_ciri'):
			if ($cek == 1):
				$code = "C00";
			elseif ($cek == 2):
				$code = "C0";
			elseif ($cek == 3):
				$code = "C";
			endif;
		elseif($tabel == 'tb_jenis'):
			if ($cek == 1):
				$code = "J00";
			elseif ($cek == 2):
				$code = "J0";
			elseif ($cek == 3):
				$code = "J";
			endif;
		elseif($tabel == 'tb_obat'):
			if ($cek == 1):
				$code = "K00";
			elseif ($cek == 2):
				$code = "K0";
			elseif ($cek == 3):
				$code = "K";
			endif;
		elseif($tabel == 'tb_penyebab'):
			if ($cek == 1):
				$code = "S00";
			elseif ($cek == 2):
				$code = "S0";
			elseif ($cek == 3):
				$code = "S";
			endif;
		endif;
		$new_id = $last_id+1;
		$new_code = $code."".$new_id;
		return $new_code;
	}
	else
	{
		if($tabel == 'tb_penyakit'):
				$code = "P00";
		elseif($tabel == 'tb_gejala'):
				$code = "G00";
		elseif($tabel == 'tb_ciri'):
				$code = "C00";
		elseif($tabel == 'tb_jenis'):
				$code = "J00";
		elseif($tabel == 'tb_obat'):
				$code = "K00";
		elseif($tabel == 'tb_penyebab'):
				$code = "S00";
		endif;
		$new_code = $code."".'1';
		return $new_code;

	}
	
	
}
function getNewId($tabel,$id)// buat bikin id baru bersyarat,,  ->field ga di autoincrement
{
	$ci=& get_instance();
	$ci->db->select_max($id);
	$query = $ci->db->get($tabel);
	$last_id = $query->row()->$id;
	if ($last_id == 0):
		$new_id = 1;
	else:
		$new_id = $last_id + 1;
	endif;
	return $new_id;
}

function getPage($control=FALSE,$page=FALSE,$uri=FALSE,$count=FALSE)// fungsi buat halaman tetangga// uri-> buat ndetek row ke berapa yg di pilih
{
	$ci=& get_instance();
	if ($page == 'new') // jka insert
	{
		$div = $count/$ci->config->item('per_page');// tergantung sama pagination nya.. 
		$mod = $count % $ci->config->item('per_page');// cari halaman yg ga ganjil
		
		$x = explode('.',$div);
		$y = $x[0];
		$last_page = $y * $ci->config->item('per_page');
		$minus = $last_page - $ci->config->item('per_page');
		$last_page2 = $minus;
		
		if ($mod == '0'):
		redirect('admin/'.$control.'/index/'.$last_page2);
		elseif ($count >= $ci->config->item('per_page')):
		redirect('admin/'.$control.'/index/'.$last_page);
		else:
		redirect('admin/'.$control.'/');
		endif;
	}
	elseif ($page == 'edit') // jika edit
	{
		$p = $uri - 1;
		if ($p == 0):
			$page = $uri;
		else:
			$page = $p;
		endif;
		
		$div = $page/$ci->config->item('per_page');
		$mod = $page % $page/$ci->config->item('per_page');
		$x = explode('.',$div);
		$y = $x[0];
		
		$edit_page = $y * $ci->config->item('per_page');
		$edit_page2 = $edit_page - $ci->config->item('per_page');
		$plus = $edit_page +1;

		if ($page < $ci->config->item('per_page')):
			redirect('admin/'.$control.'/');
		elseif ($page > $ci->config->item('per_page')):
			redirect('admin/'.$control.'/index/'.$edit_page);
		elseif (($page == $plus) || $mod == 0 ):
			redirect('admin/'.$control.'/index/'.$edit_page);
		endif;
	}
	elseif ($page == 'delete')// dan jika hapus
	{
		$p = $uri - 1;
		if ($p == 0):
			$page = $uri;
		else:
			$page = $p;
		endif;
					
		$div = $page/$ci->config->item('per_page');
		$mod = $page % $page/$ci->config->item('per_page');
		$x = explode('.',$div);
		$y = $x[0];
				
		$edit_page = $y * $ci->config->item('per_page');
		$edit_page2 = $edit_page - $ci->config->item('per_page');
		$plus = $edit_page +1;

		if ($page < $ci->config->item('per_page') || $count == $ci->config->item('per_page')):
			redirect('admin/'.$control.'/');
		elseif ($page >= $ci->config->item('per_page') ):
			redirect('admin/'.$control.'/index/'.$edit_page);
		elseif ((($page + 1) == $plus) || $mod == 0 ):
			redirect('admin/'.$control.'/index/'.$edit_page2);
		endif;
	}
}

function getPageJenis($control=FALSE,$page=FALSE,$uri=FALSE,$count=FALSE)// fungsi buat halaman tetangga// uri-> buat ndetek row ke berapa yg di pilih
{
	$ci=& get_instance();
	if ($page == 'new') // jka insert
	{
		$div = $count/$ci->config->item('per_page');// tergantung sama pagination nya.. 
		$mod = $count % $ci->config->item('per_page');// cari halaman yg ga ganjil
		
		$x = explode('.',$div);
		$y = $x[0];
		$last_page = $y * $ci->config->item('per_page');
		$minus = $last_page - $ci->config->item('per_page');
		$last_page2 = $minus;
		
		if ($mod == '0'):
		redirect('admin/'.$control.'/'.$last_page2);
		elseif ($count >= $ci->config->item('per_page')):
		redirect('admin/'.$control.'/'.$last_page);
		else:
		redirect('admin/'.$control.'/');
		endif;
	}
	elseif ($page == 'edit') // jika edit
	{
		$p = $uri - 1;
		if ($p == 0):
			$page = $uri;
		else:
			$page = $p;
		endif;
		
		$div = $page/$ci->config->item('per_page');
		$mod = $page % $page/$ci->config->item('per_page');
		$x = explode('.',$div);
		$y = $x[0];
		
		$edit_page = $y * $ci->config->item('per_page');
		$edit_page2 = $edit_page - $ci->config->item('per_page');
		$plus = $edit_page +1;

		if ($page < $ci->config->item('per_page')):
			redirect('admin/'.$control.'/');
		elseif ($page > $ci->config->item('per_page')):
			redirect('admin/'.$control.'/'.$edit_page);
		elseif (($page == $plus) || $mod == 0 ):
			redirect('admin/'.$control.'/'.$edit_page);
		endif;
	}
	elseif ($page == 'delete')// dan jika hapus
	{
		$p = $uri - 1;
		if ($p == 0):
			$page = $uri;
		else:
			$page = $p;
		endif;
					
		$div = $page/$ci->config->item('per_page');
		$mod = $page % $page/$ci->config->item('per_page');
		$x = explode('.',$div);
		$y = $x[0];
				
		$edit_page = $y * $ci->config->item('per_page');
		$edit_page2 = $edit_page - $ci->config->item('per_page');
		$plus = $edit_page +1;

		if ($page < $ci->config->item('per_page') || $count == $ci->config->item('per_page')):
			redirect('admin/'.$control.'/');
		elseif ($page >= $ci->config->item('per_page') ):
			redirect('admin/'.$control.'/'.$edit_page);
		elseif ((($page + 1) == $plus) || $mod == 0 ):
			redirect('admin/'.$control.'/'.$edit_page2);
		endif;
	}
}

/// pertolongan pertama pada check box

function multi_implode($array, $glue) {
    $ret = '';

    foreach ($array as $item) {
        if (is_array($item)) {
            $ret .= multi_implode($item, $glue) . $glue;
        } else {
            $ret .= $item . $glue;
        }
    }

    $ret = substr($ret, 0, 0-strlen($glue));

    return $ret;
}
