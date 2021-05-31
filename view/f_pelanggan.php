<?php
  //session_start();
  error_reporting(0);
  include "./inc/function.php";
  if($_SESSION['level']=="operator"){
  header("location:index.php");
}else{
?>
<ul class="breadcrumb">
  <li><a href="./">Home</a></li>
  <li><a href="?page=<?php echo $page ;?>"><?php echo ucfirst($page) ; ?></a></li>
  <li class="active"><?php echo ucfirst($action) ; ?> Data</li>
</ul>
<fieldset>
	<legend>Tambah Data Pelanggan</legend>
	<?php  
    // membaca id transaksi terbesar
    $carikode = mysql_query("SELECT max(no_pelanggan) as kode FROM t_pelanggan") or die(mysql_error());
    $datakode = mysql_fetch_array($carikode);      
    
    $kodepelanggan = $datakode['kode'];
    // mengambil angka atau bilangan dalam id transaksi terbesar, 
    // dengan cara mengambil substring mulai dari karakter ke-1 diambil 6 karakter 
    // misal 'INV001', akan diambil '001' 
    // setelah substring bilangan diambil lantas dicasting menjadi integer
    $noUrut = (int) substr($kodepelanggan, 5, 4);
    // bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
    $noUrut++;
    // membentuk id transaksi baru 
    // perintah sprintf("%03s", $noUrut); digunakan untuk memformat string sebanyak 3 karakter 
    // misal sprintf("%03s", 12); maka akan dihasilkan '012' 
    // atau misal sprintf("%03s", 1); maka akan dihasilkan string '001'
    $char = "IDP";
    $newID = $char . sprintf("%04s",$noUrut);
    ?>
	<form class="form-horizontal"  method="post">
	  <div class="form-group">
	    <label class="col-sm-2 control-label">ID Pelanggan</label>
	    <div class="col-sm-3">
	      <input type="text" name="id" class="form-control" readonly="" value="<?php echo $newID ?>" placeholder="ID Pelanggan">
	    </div>
	  </div>
	  <div class="form-group">
	    <label class="col-sm-2 control-label">Nama</label>
	    <div class="col-sm-4">
	      <input type="text" name="nama" class="form-control" placeholder="Nama">
	    </div>
	  </div> 
	    <div class="form-group">
	      <label class="col-sm-2 control-label">Tgl Register</label>
	      <div class="col-sm-3">        
	        <style type="text/css">
			.ui-datepicker-calendar {
			/*display: none;*/
			}
			select{
			color:#000;
			}

			</style>
	        <script>    
	        $(function() {
	          $('.date-picker').datepicker( {
			        changeMonth: true,
			        changeYear: true,
			        showButtonPanel: true,
			        dateFormat: 'yy-mm-dd',
			        onClose: function(dateText, inst) { 
			            var month = $("#ui-datepicker-div .ui-datepicker-month :selected").val();
			            var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
			            $(this).datepicker('setDate', new Date(year, month, 1));
			        }
			    });
	        });
	        </script>
	      <input type="text" name="bulan" class="form-control date-picker" placeholder="Bulan Register" required="" id="bulan" />
	      </div>  
	    </div>	  
	  <div class="form-group">
	    <label class="col-sm-2 control-label">Alamat</label>
	    <div class="col-sm-5">
	      <textarea class="form-control" name="alamat" rows="3"></textarea>
	    </div>
	  </div>
	  <div class="form-group">
	    <label class="col-sm-2 control-label">Nama Corporate</label>
	    <div class="col-sm-3">
	      <input type="text" class="form-control" name="corporate" placeholder="Nama Corporate">
	    </div>
	  </div>
	  <div class="form-group">
	    <label class="col-sm-2 control-label">No. Telp</label>
	    <div class="col-sm-3">
	      <input type="text" class="form-control" name="telpon" placeholder="No. Telp">
	    </div>
	  </div>
	  <div class="form-group">
	    <label class="col-sm-2 control-label">Email</label>
	    <div class="col-sm-4">
	      <input type="email" class="form-control" name="email" placeholder="Email">
	    </div>
	  </div>
	  <div class="form-group">
	    <label class="col-sm-2 control-label">Paket</label>
	    <div class="col-sm-2">
	      	<select name="paket" onchange="showUser(this.value)" class="form-control">
				<option value="" selected="" disabled="">--Pilih Paket--</option>
				<?php
					include "./inc/config.php";
					$pos=mysql_query("SELECT * from t_paket order by id_paket");
					while($r_pos=mysql_fetch_array($pos)){
						
						?>
						<option value="<?php echo $r_pos['id_paket'] ?>"><?php echo $r_pos['nama']." (".$r_pos['harga'].")" ?></option>
					<?php
					}
                ?>
			</select>
	    </div>
	    <a href="?page=paket&aksi=tambah" class="btn btn-primary "><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a>
	  </div>
	  <div class="form-group">
	    <div class="col-sm-offset-2 col-sm-10">
	    <button type="reset" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span> Reset</button>
        <button type="submit" name="simpan" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Tambah</button>
        <a href="?page=pelanggan" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span> Batal </a>
	    </div>
	  </div>
	  <?php  
  	/*
	  if(isset($_POST['simpan']))
	  {
	      mysql_query("INSERT INTO t_pelanggan VALUES ('".$_POST['id']."','".$_POST['nama']."','".$_POST['alamat']."','".$_POST['telpon']."','".$_POST['email']."','".$_POST['paket']."')") or die (mysql_error());
	      
	      echo '<META HTTP-EQUIV="Refresh" Content="0; URL=?page=pelanggan">';
	  }*/
	  ?>
	</form>
</fieldset>

  <?php 
  $no_pelanggan = $_POST['id'];
  $nama = $_POST['nama'];
  $alamat = $_POST['alamat'];
  $corporate = $_POST['corporate'];
  $no_hp = $_POST['telpon'];
  $email = $_POST['email'];
  $paket = $_POST['paket'];
  $bulan = $_POST['bulan'];

  if(isset($_POST['simpan'])){
    $cekdata="SELECT no_pelanggan from t_pelanggan where no_pelanggan='".$_POST['id']."'"; 
    $ada=mysql_query($cekdata) or die(mysql_error()); 
    if(mysql_num_rows($ada)>0) { 
      writeMsg('pelanggan.sama');
    } else { 
      $query="INSERT INTO t_pelanggan (no_pelanggan, nama, alamat, corporate, no_hp, email, id_paket, register_date) VALUES ('$no_pelanggan', '$nama', '$alamat', '$corporate', '$no_hp', '$email', '$paket', '$bulan')"; 
      mysql_query($query) or die(mysql_error()); 
      print_r($query);
      echo '<META HTTP-EQUIV="Refresh" Content="0; URL=?page=pelanggan">';
    } 
  } 

  ?>

<?php
}
?>