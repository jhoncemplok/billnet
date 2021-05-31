<?php
include "./inc/config.php";
include "./inc/function.php";

?>
<ul class="breadcrumb">
  <li><a href="./">Home</a></li>
  <li><a href="?page=<?php echo $page ;?>"><?php echo ucfirst($page) ; ?></a></li>
  <li class="active"><?php echo ucfirst($action) ; ?> Data</li>
</ul>

<form class="form-horizontal" method="POST">
  <fieldset>
    <legend>Tambah Data Paket</legend>
    <?php  
    // membaca id transaksi terbesar
    $carikode = mysql_query("SELECT max(kode_paket) as no_paket FROM t_paket") or die(mysql_error());
    $datakode = mysql_fetch_array($carikode);      
    
    $kodepaket = $datakode['no_paket'];
    // mengambil angka atau bilangan dalam id transaksi terbesar, 
    // dengan cara mengambil substring mulai dari karakter ke-1 diambil 6 karakter 
    // misal 'INV001', akan diambil '001' 
    // setelah substring bilangan diambil lantas dicasting menjadi integer
    $noUrut = (int) substr($kodepaket, 3, 3);
    // bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
    $noUrut++;
    // membentuk id transaksi baru 
    // perintah sprintf("%03s", $noUrut); digunakan untuk memformat string sebanyak 3 karakter 
    // misal sprintf("%03s", 12); maka akan dihasilkan '012' 
    // atau misal sprintf("%03s", 1); maka akan dihasilkan string '001'
    $char = "PKT";
    $newID = $char . sprintf("%03s",$noUrut);
    ?>
    <div class="form-group">
      <label class="col-sm-2 control-label">Kode Paket</label>
      <div class="col-sm-3">
        <input type="text" class="form-control" readonly="" value="<?php echo $newID ?>" name="kode" required placeholder="Kode Paket">
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-2 control-label">Nama Paket</label>
      <div class="col-sm-3">
        <input type="text" class="form-control" name="nama" placeholder="Nama Paket">
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-2 control-label">Harga</label>
      <div class="col-sm-3">
        <input type="text" id="inputku" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);" class="form-control" name="harga" placeholder="Harga Paket">
      </div>
    </div>
    
    
   <input type="hidden" name="info" value="1">
    <div class="form-group">
      <div class="col-sm-10 col-sm-offset-2">
        <button type="reset" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span> Reset</button>
        <button type="submit" name="simpan" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Tambah</button>
        <a href="?page=paket" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span> Batal </a>
      </div>
    </div>
  </fieldset>


  <?php  
  /*
  if(isset($_POST['simpan']))
  {
      mysql_query("INSERT INTO t_paket (id_paket, nama, harga) VALUES ('".$_POST['kode']."','".$_POST['nama']."','".$_POST['harga']."')") or die (mysql_error());
      
      echo '<META HTTP-EQUIV="Refresh" Content="0; URL=?page=paket">';
  }*/
  ?>
</form>

  <?php 
  if(isset($_POST['simpan'])){
    $cekdata="SELECT kode_paket from t_paket where kode_paket='".$_POST['kode']."'";
    $ada=mysql_query($cekdata) or die(mysql_error()); 
    $data="SELECT * from t_paket";
    $aya=mysql_query($data) or die(mysql_error());
    if(mysql_num_rows($ada)>0) { 
      writeMsg('paket.sama');
    } else { 
      $query="INSERT INTO t_paket (kode_paket, nama, harga) VALUES ('".$_POST['kode']."','".$_POST['nama']."','".str_replace(".","",$_POST['harga'])."')";
      mysql_query($query) or die("Gagal menyimpan data karena :").mysql_error(); 
      echo '<META HTTP-EQUIV="Refresh" Content="0; URL=?page=paket">';
    } 
  } 

  ?>