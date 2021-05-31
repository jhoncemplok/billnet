<?php  
include "../inc/config.php";
include "../inc/function.php";
$id = $_POST['id'];
// echo $id;
$total = mysql_query("SELECT SUM(tagihan) as total FROM t_tagihan  WHERE tagihan != 0 AND id_pelanggan = '$id' ");
$row = mysql_fetch_array($total);

$query=mysql_query("SELECT a.*, b.nama FROM t_tagihan as a, t_pelanggan as b WHERE a.tagihan != 0 AND b.no_pelanggan = a.id_pelanggan AND a.id_pelanggan = '$id' ") or die (mysql_error());

$no=1;                    //membuat nomor pada tabel

?>
<table class="table table-hover table-bordered table-striped dataTable">
  <thead>
      <tr class="info">
        <th>#</th>
        
        <th>Bulan</th>
        <th>Ket</th>
        <th>Tagihan</th>
        
      </tr>
    </thead>
    <tfoot>
        
        <tr>
            <th colspan="3" style="text-align:right; color: white; background-color:#3498db;">Total:</th>
            <th style="text-align:right; color: white; background-color:#3498db;"><?php echo "Rp." . number_format( $row['total'] , 0 , ',' , '.' ); ?></th>
        </tr>
    </tfoot>
    <tbody>

    
<?php    
while($lihat=mysql_fetch_array($query)){

?>

<tr>
<td><?php echo $no++; ?></td>  

<td><?php echo $lihat['bulan_tagihan'] ?></td>    
<td><?php echo $lihat['ket'] ?></td> 
<td width="15%" style="<?php if($_SESSION['level']!="admin"){ echo "text-align:right;";} ?>"><?php echo "Rp ". number_format($lihat['tagihan'], 0, ',', '.'); ?></td>   

 
</tr>
<?php
}
?>
</tbody>
</table>