<?php
  error_reporting(0);
  session_start();
  include "./inc/function.php";
  $_SESSION['info'];
  $id = $_SESSION['id'];
//   if($_SESSION['level']=="pelanggan"){
//   header("location:index.php");
// }else{
  if($_SESSION['level']=="admin"){
    $total = mysql_query("SELECT SUM(tagihan) as total FROM t_tagihan  WHERE tagihan != 0 ");
    $row = mysql_fetch_array($total);
  }else{
    $total = mysql_query("SELECT SUM(tagihan) as total FROM t_tagihan  WHERE tagihan != 0 AND id_pelanggan = '$id' ");
    $row = mysql_fetch_array($total);
  }  
?>
<ul class="breadcrumb">
  <li><a href="./">Home</a></li>
  <li class="active"><?php echo ucfirst($page) ; ?></li>
</ul>
<?php if($_SESSION['level']=="admin"){ ?>
<div class="btn-group" >
  <a href="?page=<?php echo $page ; ?>&aksi=tambah" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Tambah Data</a>
</div>

<br/><br/>
<?php } ?>
<?php 
  if ($action == ""){
?>
<table id="example1" class="table table-hover table-bordered table-striped dataTable">
	<thead>
	    <tr class="info">
	      <th>#</th>
        <?php if($_SESSION['level'] == "admin"){ ?> 
        <th>Pelanggan</th>
	      <th>Nama</th>
        <?php } ?>
        <th>Bulan</th>
	      <th>Ket</th>
        <th>Tagihan</th>
        <?php if($_SESSION['level']=="admin"){ ?>
	      <th>Aksi</th>
        <?php } ?>
	    </tr>
  	</thead>
    <tfoot>
        <?php if($_SESSION['level'] == "admin"){ ?>
        <tr>
            <th colspan="5" style="text-align:right; color: white; background-color:#3498db;">Total:</th>
            <th colspan="2" style="color: white; background-color:#3498db;"><?php echo "Rp." . number_format( $row['total'] , 0 , ',' , '.' ); ?></th>
        </tr>
        <?php }else{ ?>
        <tr>
            <th colspan="3" style="text-align:right; color: white; background-color:#3498db;">Total:</th>
            <th style="text-align:right; color: white; background-color:#3498db;"><?php echo "Rp." . number_format( $row['total'] , 0 , ',' , '.' ); ?></th>
        </tr>
        <?php } ?>
    </tfoot>
  	<tbody>
  		<?php
        include "./inc/config.php";
        
        if($_SESSION['level']=="admin"){
          $query=mysql_query("SELECT a.*, b.nama FROM t_tagihan as a, t_pelanggan as b WHERE a.tagihan != 0 AND b.no_pelanggan = a.id_pelanggan ") or die (mysql_error());  //mengambil data tabel mahasiswa dan memasukkan nya ke variabel query

          
        }else{
          $query=mysql_query("SELECT a.*, b.nama FROM t_tagihan as a, t_pelanggan as b WHERE a.tagihan != 0 AND b.no_pelanggan = a.id_pelanggan AND a.id_pelanggan = '$id' ") or die (mysql_error());  //mengambil data tabel mahasiswa dan memasukkan nya ke variabel query

          
        }
        

        $no=1;                    //membuat nomor pada tabel
        while($lihat=mysql_fetch_array($query)){    //mengeluarkan isi data dengan mysql_fetch_array dengan perulangan
        ?>    
      <tr>
        <td><?php echo $no++; ?></td>  
        <?php if($_SESSION['level'] == "admin"){ ?>          
        <td><?php echo $lihat['id_pelanggan'] ?></td>     
        <td><?php echo $lihat['nama'] ?></td>   
        <?php } ?>   
        <td><?php echo $lihat['bulan_tagihan'] ?></td>    
        <td><?php echo $lihat['ket'] ?></td> 
        <td width="15%" style="<?php if($_SESSION['level']!="admin"){ echo "text-align:right;";} ?>"><?php echo "Rp ". number_format($lihat['tagihan'], 0, ',', '.'); ?></td>   
        <?php if($_SESSION['level']=="admin"){ ?>
        <td align="center">
  				<a href="?page=tagihan&aksi=edit&id=<?php echo $lihat['id_tagihan'] ;?>" class="btn btn-info btn-sm" title="Edit Data"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a> 
  				<a href="?page=tagihan&aksi=delete&id=<?php echo $lihat['id_tagihan'] ;?>" onclick="javascript: return confirm('Anda yakin akan menghapus data ini ?')" class="btn btn-danger btn-sm" title="Hapus Data"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
    		</td>
        <?php } ?>
		 
      </tr>
      <?php
        }
      ?>
      
  	</tbody>
    

</table>
<?php
}else if($action == "delete"){
$hapus=mysql_query("DELETE from t_tagihan WHERE id_tagihan='$_GET[id]'") or die(mysql_error());
echo '<META HTTP-EQUIV="Refresh" Content="0; URL=?page=tagihan">';
break;
}else{
  echo "maaf aksi tidak ditemukan";
}
?>
  <?php 
// }
  ?>