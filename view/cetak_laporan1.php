<?php  
require_once("../inc/plugins/dompdf/dompdf_config.inc.php");//memanggil file dompdf_config.inc.php
require_once('../inc/config.php');
include"../inc/function.php";
$dari= $_POST['dari'];
$sampai= $_POST['sampai']; //get the nama value from form
$id= $_POST['id_pelanggan'];
$level= $_POST['level'];

if($level=='admin'){
$q = "SELECT a.id_transaksi, a.id_pelanggan, a.tgl_bayar, a.tgl_validasi, a.bulan_tagihan, a.nominal, a.status, b.nama FROM t_transaksi as a, t_pelanggan as b  WHERE a.tgl_bayar >= '$dari' AND a.tgl_bayar <= '$sampai' AND a.id_pelanggan=b.no_pelanggan ORDER BY a.id_transaksi DESC";		
}else{
$q = "SELECT id_transaksi, id_pelanggan, tgl_bayar, tgl_validasi, bulan_tagihan, nominal, status FROM t_transaksi  WHERE tgl_bayar >= '$dari' AND tgl_bayar <= '$sampai' AND id_pelanggan = '$id' ORDER BY id_transaksi DESC";
}
$total = mysql_query("SELECT SUM(nominal) as total FROM t_transaksi  WHERE tgl_bayar >= '$dari' AND tgl_bayar <= '$sampai' ");
$row = mysql_fetch_array($total);

$result = mysql_query($q) or die(mysql_error());
$no=1; 

//yang akan ditampilkan
$html =
  '<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">'.
  '<html><body>'.
  '<h1>Rekap Pembayaran</h1>'.
  '<table class="table table-striped"';
  while($data = mysql_fetch_array($result)){
$html .= 
  '<tr><td>Nama</td><td> : </td><td>'.$data['id_transaksi'].'</td></tr>'.
  '<tr><td>alamat</td><td> : </td><td>'.$data['no_pelanggan'].'</td></tr>'.
  '<tr><td>Gaji</td><td> : </td><td>'.$data['nama'].'</td></tr>'.
  '<tr><td>potongan</td><td> : </td><td>'.$data['bulan_tagihan'].'</td></tr>';
  }
$html .=  '</table></body></html>';

$date = date('Y-m-d');
$dompdf = new DOMPDF();
$dompdf->load_html($html);
$dompdf->render();
$dompdf->stream('laporan_'.$date.'.pdf');

?>