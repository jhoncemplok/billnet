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
	<legend>Tambah Data Admin</legend>
	<form class="form-horizontal"  method="post">
	  <div class="form-group">
	    <label class="col-sm-2 control-label">Username</label>
	    <div class="col-sm-3">
	      <input type="text" class="form-control" name="username" placeholder="Username">
	    </div>
	  </div>
	  <div class="form-group">
	    <label class="col-sm-2 control-label">Password</label>
	    <div class="col-sm-3">
	      <input type="password" class="form-control" name="password" placeholder="Password">
	    </div>
	  </div> 
	  <div class="form-group">
	    <label class="col-sm-2 control-label">Nama</label>
	    <div class="col-sm-3">
	      <input type="text" class="form-control" name="nama" placeholder="Nama">
	    </div>
	  </div> 
	  <div class="form-group">
	    <label class="col-sm-2 control-label">Level</label>
	    <div class="col-sm-3">
	      	<select name="level" class="form-control">
				<option value="">--Pilih Level--</option>
				<option value="admin">Admin</option>
				<option value="operator">Operator</option>
			</select>
	    </div>
	  </div> 
	  <div class="form-group">
	    <label class="col-sm-2 control-label">Status</label>
	    <div class="col-sm-3">
	      	<select name="status" class="form-control">
				<option value="">--Pilih Status--</option>
				<option value="1">Aktif</option>
				<option value="0">Non Aktif</option>
			</select>
	    </div>
	  </div> 
	  <div class="form-group">
	    <div class="col-sm-offset-2 col-sm-10">
	    <button type="reset" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span> Reset</button>
        <button type="submit" name="simpan" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Tambah</button>
        <a href="?page=admin" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span> Batal </a>
	    </div>
	  </div>
	  <?php  
  	
	  ?>
	</form>
</fieldset>

  <?php 
  if(isset($_POST['simpan'])){
    // $cekdata="SELECT id_pelanggan from t_user where id_pelanggan='".$_POST['id']."'"; 
    // $ada=mysql_query($cekdata) or die(mysql_error()); 
    // if(mysql_num_rows($ada)>0) { 
    //   writeMsg('pelanggan.sama');
    // } else { 
	  $username = $_POST['username'];
	  $nama = $_POST['nama'];
	  $password = md5($_POST['password']);
	  $level = $_POST['level'];
	  $status = $_POST['status'];

	  $query="INSERT INTO t_user (username, nama, password, level, aktif) VALUES ('$username', '$nama', '$password', '$level', '$status')"; 

      // $query="INSERT INTO t_user VALUES ('".$_POST['id']."','".$_POST['username']."','".md5($_POST['password'])."','".$_POST['level']."')"; 
      mysql_query($query) or die("Gagal menyimpan data karena :").mysql_error(); 
      echo '<META HTTP-EQUIV="Refresh" Content="0; URL=?page=admin">';
    // } 
  } 

  ?>

<?php
}
?>