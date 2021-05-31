<?php
include "../inc/config.php";


$id = $_POST['id'];
 
$query = mysql_query("SELECT DISTINCT(bulan_tagihan) FROM t_tagihan WHERE id_pelanggan = '$id' AND tagihan != 0 ") or die(mysql_error());
// $hitung = mysql_num_rows($query);
echo "<option selected disable>Pilih Bulan</option>";
while($hasil =  mysql_fetch_array($query)){ 
  if (mysql_num_rows($query) >= 1) {
  	// echo json_encode(array("status" => TRUE,
  	// 						"bulan" => "<option value=".$hasil['bulan_tagihan'].">".$hasil['bulan_tagihan']."</option>",
  	// 						"tagihan" => $hasil['tagihan'])
  	// );

  	echo "<option value=".$hasil['bulan_tagihan'].">".$hasil['bulan_tagihan']."</option>";
  }else{
  	echo "<option value=''>Maaf tidak ada data</option>";
  }
  
}
?>
