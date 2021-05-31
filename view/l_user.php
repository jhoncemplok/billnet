<?php
  error_reporting(0);
  session_start();
  if($_SESSION['level']=="pelanggan"){
  header("location:index.php");
}else{
?>
<ul class="breadcrumb">
  <li><a href="./">Home</a></li>
  <li class="active"><?php echo ucfirst($page) ; ?></li>
</ul>
<div class="btn-group" >
  <a href="?page=pelanggan&aksi=tambah" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Tambah Data</a>
</div>

<br/><br/>
<?php 
  if ($action == ""){
?>
<table id="example1" class="table table-hover table-bordered table-striped dataTable">
  <thead>
      <tr class="info">
        <th>#</th>
        <th>Username</th>
        <th>Nama</th>
        <th>No HP</th>
        <th>Status</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php
        include "./inc/config.php";
        $query=mysql_query("SELECT * from t_pelanggan") or die (mysql_error());  //mengambil data tabel mahasiswa dan memasukkan nya ke variabel query        
        $no=1;                    //membuat nomor pada tabel
        while($lihat=mysql_fetch_array($query)){    //mengeluarkan isi data dengan mysql_fetch_array dengan perulangan
        ?>    
      <tr>
        <td><?php echo $no++; ?></td>         
        <td><?php echo $lihat['no_pelanggan'] ?></td>    
        <td><?php echo ucwords($lihat['nama']) ?></td>
        <td><?php echo $lihat['no_hp'] ?></td>
        <td><?php if($lihat['aktif'] == "1"){echo "<span class='label label-success'>".ucwords("aktif")."</span>";}else{echo "<span class='label label-warning'>".ucwords("non aktif")."</span>";} ?></td>      
        
        <td align="center">
          <a href="?page=user&aksi=edit&id=<?php echo $lihat['id'] ;?>" class="btn btn-info btn-sm" title="Edit Data"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a> 
          
      </td>
   
      </tr>
      <?php
        }
      ?>
    </tbody>

</table>
<?php
}else if($action == "delete"){
$hapus=mysql_query("DELETE from t_pelanggan WHERE id='$_GET[id]'") or die(mysql_error());
echo '<META HTTP-EQUIV="Refresh" Content="0; URL=?page=admin">';
break;
}else{
  echo "maaf aksi tidak ditemukan";
}
?>
  <?php 
}
  ?>