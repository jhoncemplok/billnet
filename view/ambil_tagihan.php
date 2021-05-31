<?php  
include "../inc/config.php";


$id = $_POST['id'];
// echo $id;

$cekdata="SELECT a.harga as nominal from t_paket as a, t_pelanggan as b where a.id_paket = b.id_paket AND no_pelanggan = '$id' "; 
$query=mysql_query($cekdata) or die(mysql_error()); 

while ($lihat=mysql_fetch_array($query)) {
	echo $lihat['nominal'];
}
?>