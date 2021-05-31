<ul class="breadcrumb">
  <li class="active">Home</li>
</ul>
<div class="alert alert-info">
  <strong>Selamat Datang! </strong> <u><?php echo ucfirst($_SESSION['username'])  ;?> </u>di member area.
</div>
<?php  
include "./inc/function.php";
$bulan = date('Y-m');
$id = $_SESSION['id'];
$query=mysql_query("SELECT SUM(tagihan) as nominal FROM t_tagihan WHERE id_pelanggan = '$id' ") or die(mysql_error());	 
$data=mysql_num_rows($query);	
$r=mysql_fetch_array($query);
if ($data > 0) {
	
?>
<?php  
if ($_SESSION['level']=="pelanggan") {
	
?>
<p style="color: red;text-decoration: underline;">Notifikasi dari admin untuk pelanggan</p>
<p>Jumlah tagihan anda <?php //echo bulan(date("m")); ?> : <?php echo "Rp ". number_format($r['nominal'], 0, ',', '.'); ?></p>
<?php } }?>