<?php
function writeMsg($tipe){
	if ($tipe=='save.sukses') {
		$MsgClass = "alert-success";
		$Msg = "<strong>Sukses!</strong> Data berhasil disimpan. Selamat yah!";	
	} else 
	if ($tipe == 'save.gagal') {
		$MsgClass = "alert-danger";
		$Msg = "<strong>Oops!</strong> Data gagal disimpan!";
	}
	else 
	if ($tipe == 'update.sukses') {
		$MsgClass = "alert-success";
		$Msg = "<strong>Sukses!</strong> Data berhasil diupdate. Selamat yah!";
	}
	else 
	if ($tipe == 'update.gagal') {
		$MsgClass = "alert-danger";
		$Msg = "<strong>Oops!</strong> Data gagal diupdate!";
	}
	else 
	if ($tipe == 'paket.sama') {
		$MsgClass = "alert-danger";
		$Msg = "<strong>Maaf!</strong> Kode paket sudah terpakai!";
	}
	else 
	if ($tipe == 'pelanggan.sama') {
		$MsgClass = "alert-danger";
		$Msg = "<strong>Maaf!</strong> ID Pelanggan sudah terpakai!";
	}
	else 
	if ($tipe == 'data.lebih') {
		$MsgClass = "alert-danger";
		$Msg = "<strong>Maaf!</strong> Anda cuma bisa input 5 data!";
	}
    else 
    if ($tipe == 'invoice.sama') {
        $MsgClass = "alert-danger";
        $Msg = "<strong>Maaf!</strong> No Invoice sudah ada!";
    }
	else 
	if ($tipe == 'bulan.sama') {
		$MsgClass = "alert-danger";
		$Msg = "<strong>Maaf!</strong> Tagihan untuk bulan tersebut sudah ada!";
	}
	else 
	if ($tipe == 'tagihan.kosong') {
		$MsgClass = "alert-warning";
		$Msg = "<strong>Maaf!</strong> Data Tidak Ada !";
	}


echo "<div class=\"alert alert-dismissible ".$MsgClass."\">
  	  <button type=\"button\" class=\"close\" data-dismiss=\"alert\">×</button>
  	  ".$Msg."
	  </div>";		  
}

//Format Tanggal Indonesia
function TanggalIndo($date){
	$BulanIndo = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
 
	$tahun = substr($date, 0, 4);
	$bulan = substr($date, 5, 2);
	$tgl   = substr($date, 8, 2);
 
	$result = $tgl . " " . $BulanIndo[(int)$bulan-1] . " ". $tahun;		
	return($result);
}

//Fungsi Terbilang Angka
function kekata($x) {
    $x = abs($x);
    $angka = array("", "satu", "dua", "tiga", "empat", "lima",
    "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
    $temp = "";
    if ($x <12) {
        $temp = " ". $angka[$x];
    } else if ($x <20) {
        $temp = kekata($x - 10). " belas";
    } else if ($x <100) {
        $temp = kekata($x/10)." puluh". kekata($x % 10);
    } else if ($x <200) {
        $temp = " seratus" . kekata($x - 100);
    } else if ($x <1000) {
        $temp = kekata($x/100) . " ratus" . kekata($x % 100);
    } else if ($x <2000) {
        $temp = " seribu" . kekata($x - 1000);
    } else if ($x <1000000) {
        $temp = kekata($x/1000) . " ribu" . kekata($x % 1000);
    } else if ($x <1000000000) {
        $temp = kekata($x/1000000) . " juta" . kekata($x % 1000000);
    } else if ($x <1000000000000) {
        $temp = kekata($x/1000000000) . " milyar" . kekata(fmod($x,1000000000));
    } else if ($x <1000000000000000) {
        $temp = kekata($x/1000000000000) . " trilyun" . kekata(fmod($x,1000000000000));
    }     
        return $temp;
}
 
 
function terbilang($x, $style=4) {
    if($x<0) {
        $hasil = "minus ". trim(kekata($x));
    } else {
        $hasil = trim(kekata($x));
    }     
    switch ($style) {
        case 1:
            $hasil = strtoupper($hasil);
            break;
        case 2:
            $hasil = strtolower($hasil);
            break;
        case 3:
            $hasil = ucwords($hasil);
            break;
        default:
            $hasil = ucfirst($hasil);
            break;
    }     
    return $hasil;
}

function xyz(){
	$me=("YnkgPGEgaHJlZj0iaHR0cDovL3N1cmRheXNvZnQuY29tIiB0YXJnZXQ9Il9ibGFuayIgdGl0bGU9InJCaWxsIj5yQmlsbDwvYT4=");
	echo base64_decode($me);
}

function bulan($bulan)
{
switch ($bulan){
    case 1 : $bulan="Januari";
        break;
    case 2 : $bulan="Februari";
        break;
    case 3 : $bulan="Maret";
        break;
    case 4 : $bulan="April";
        break;
    case 5 : $bulan="Mei";
        break;
    case 6 : $bulan="Juni";
        break;
    case 7 : $bulan="Juli";
        break;
    case 8 : $bulan="Agustus";
        break;
    case 9 : $bulan="September";
        break;
    case 10 : $bulan="Oktober";
        break;
    case 11 : $bulan="November";
        break;
    case 12 : $bulan="Desember";
        break;
    }
return $bulan;
}
?>