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
  <a href="?page=<?php echo $page ; ?>&aksi=tambah" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Tambah Data</a>
</div>
<br/><br/>
<?php 
  if ($action == ""){
?>

<table id="example1" class="table table-hover table-bordered table-striped dataTable">
  <thead>
      <tr class="info">
        <th>#</th>
        <th>ID Pelanggan</th>
        <th>Nama</th>
        <th>Alamat</th>
        <th>Corporate</th>
        <th>No HP</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php
        include "./inc/config.php";
        $query=mysql_query("SELECT * from t_pelanggan ORDER BY no_pelanggan") or die (mysql_error());  //mengambil data tabel mahasiswa dan memasukkan nya ke variabel query        
        $no=1;                    //membuat nomor pada tabel
        while($lihat=mysql_fetch_array($query)){    //mengeluarkan isi data dengan mysql_fetch_array dengan perulangan
        ?>    
      <tr>
        <td><?php echo $no++; ?></td>         <!--menampilkan nomor dari variabel no-->
        <td><?php echo $lihat['no_pelanggan'] ?></td>    <!--menampilkan data nim dari tabel mahasiswa-->
        <td><?php echo $lihat['nama'] ?></td>     <!--menampilkan data nama dari tabel mahasiswa-->
        <td><?php echo $lihat['alamat'] ?></td>
        <td><?php echo $lihat['corporate'] ?></td>      <!--menampilkan data jurusan dari tabel mahasiswa-->
        <td><?php echo $lihat['no_hp'] ?></td>     <!--menampilkan data alamat dari tabel mahasiswa-->
        <td align="center">
          <a href="?page=pelanggan&aksi=detail&id=<?php echo $lihat['id'] ;?>" class="btn btn-success btn-sm" title="Lihat Data"><span class="glyphicon glyphicon-new-window" aria-hidden="true"></span></a> 
          <a href="?page=pelanggan&aksi=edit&id=<?php echo $lihat['id'] ;?>" class="btn btn-info btn-sm" title="Edit Data"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a> 
          <a href="?page=pelanggan&aksi=delete&id=<?php echo $lihat['id'] ;?>" onclick="javascript: return confirm('Anda yakin akan menghapus data ini ?')" class="btn btn-danger btn-sm" title="Hapus Data"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
      </td>
    <!--
    <td><a href="edit_mhs.php?id_mhs=<?php echo $lihat['id_mhs'] ?>">Edit</a> ||    <!--membuat link ke file dan hapus.php-->
         <!--<a href="hapus_mhs.php?id_mhs=<?php echo $lihat['id_mhs'] ?>">Hapus</a></td>    <!--membuat link ke file dan hapus.php-->
     
      </tr>
      <?php
        }
      ?>
    </tbody>

</table>
<?php
}else if($action == "delete"){
$hapus=mysql_query("DELETE from t_pelanggan WHERE id='$_GET[id]'") or die(mysql_error());
echo '<META HTTP-EQUIV="Refresh" Content="0; URL=?page=pelanggan">';
break;
}
?>
  <?php 
}
  ?>