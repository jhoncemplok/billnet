<?php
include "./inc/function.php";
$id = $_SESSION['id'];
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
        <th>No Invoice 
        <?php  
        if ($_SESSION['level'] == 'admin') {          
        ?>
        <br> Pelanggan</th>
        <?php } ?>
	      <th>Tgl Bayar</th>
	      <th>Total</th>
	      <th>Status</th>
        <th>Bulan Tagihan</th>                          
	      <th>Aksi</th>       
	    </tr>
  	</thead>
  	<tbody align="center">
  		<?php
        include "./inc/config.php";        
        if($_SESSION['level'] == 'admin'){
        $query=mysql_query("SELECT a.no_pelanggan, a.nama, b.* from t_pelanggan as a, t_transaksi as b where a.no_pelanggan=b.id_pelanggan order by b.id_transaksi ASC") or die (mysql_error());  //mengambil data tabel mahasiswa dan memasukkan nya ke variabel query        
        }else{
        $query=mysql_query("SELECT * from t_transaksi WHERE id_pelanggan='$_SESSION[id]' order by id_transaksi ASC ") or die (mysql_error());  //mengambil data tabel mahasiswa dan memasukkan nya ke variabel query
        }
        $no=1;                    //membuat nomor pada tabel
        while($lihat=mysql_fetch_array($query)){    //mengeluarkan isi data dengan mysql_fetch_array dengan perulangan
        ?>    
      <tr>
        <td><?php echo $no++; ?></td>         <!--menampilkan nomor dari variabel no-->
        <td><?php echo $lihat['id_transaksi'] ?><br><?php echo ucwords($lihat['nama']) ?></td>    <!--menampilkan data nim dari tabel mahasiswa-->
        <td><?php echo TanggalIndo($lihat['tgl_bayar']); ?></td>     <!--menampilkan data nama dari tabel mahasiswa-->
        
        <td><?php echo "Rp." . number_format( $lihat['nominal'] , 0 , ',' , '.' ); ?></td>     <!--menampilkan data alamat dari tabel mahasiswa-->
        <td><?php if ($lihat['status']=='lunas'){ ?>
          <span class="label label-success"><?php echo ucfirst($lihat['status']) ?></span>
          <?php }else{ ?>
          <span class="label label-danger"><?php echo ucfirst($lihat['status']) ?></span>
          <?php }?>
        </td>     <!--menampilkan data alamat dari tabel mahasiswa-->
        <td>
        <?php if(empty($lihat['bukti'])){
            echo TanggalIndo($lihat['bulan_tagihan']);?>             
        <?php 
            }else{
            echo TanggalIndo($lihat['bulan_tagihan']);?>
            <!-- / <a href="upload/<?php echo $lihat['bukti'] ?>" target="_blank">Lihat -->    <!--menampilkan data alamat dari tabel mahasiswa-->
        <?php } ?>        
        
        </td> 
        <td align="center">          
  				<a href="?page=transaksi&aksi=detail&id=<?php echo $lihat['id_transaksi'] ;?>" class="btn btn-success btn-sm" title="Lihat Data"><span class="glyphicon glyphicon-new-window" aria-hidden="true"></span></a> 
  				<!-- <a href="?page=transaksi&aksi=edit&id=<?php echo $lihat['id_transaksi'] ;?>" class="btn btn-info btn-sm" title="Edit Data"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>  -->
  				<a href="?page=transaksi&aksi=delete&id=<?php echo $lihat['id_transaksi'] ;?>" onclick="javascript: return confirm('Anda yakin akan menghapus data ini ?')" class="btn btn-danger btn-sm" title="Hapus Data"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>  		    
          <?php if($lihat['status']=='lunas'){
          ?>
          <a href="view/cetak_invoice.php?&id=<?php echo $lihat['id_transaksi'] ;?>" name="cetak" target="_blank" class="btn btn-info btn-sm" title="Cetak"><span class="glyphicon glyphicon-print" aria-hidden="true"></span></a>
          <?php
          }else{
          ?>
          <a href="#" target="_blank" class="btn btn-info btn-sm disabled" title="Cetak"><span class="glyphicon glyphicon-print" aria-hidden="true"></span></a>
          <?php
          }
          ?>
        </td>      
      </tr>
      <?php
        }
      ?>
  	</tbody>

</table>
<?php
}else if($action == "delete"){
$hapus=mysql_query("DELETE from t_transaksi WHERE id_transaksi='$_GET[id]'") or die(mysql_error());
echo '<META HTTP-EQUIV="Refresh" Content="0; URL=?page=transaksi">';
break;
}else{
  echo "maaf aksi tidak ditemukan";
}
?>
