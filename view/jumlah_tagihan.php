<?php
include "../inc/config.php";
mysql_connect($host,$user,$pass) or die (mysql_error());
mysql_select_db($db) or die (mysql_error());

$id 	= $_POST['id'];
$bulan  = $_POST['bulan'];

$query = mysql_query("SELECT SUM(tagihan) as jml_tagihan FROM t_tagihan WHERE id_pelanggan = '$id' AND bulan_tagihan = '$bulan' ") or die(mysql_error());
// $hitung = mysql_num_rows($query);
while($hasil =  mysql_fetch_array($query)){
  if (mysql_num_rows($query) >= 1) {
  	// echo json_encode(array("status" => TRUE,
  	// 						"bulan" => "<option value=".$hasil['bulan_tagihan'].">".$hasil['bulan_tagihan']."</option>",
  	// 						"tagihan" => $hasil['tagihan'])
  	// );
  	// echo "<option value=".$hasil['bulan_tagihan'].">".$hasil['bulan_tagihan']."</option>";
  	echo $hasil['jml_tagihan'];
  }else{
  	echo "data tidak ada";
  }

}
?>
