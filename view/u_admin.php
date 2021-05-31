<?php
include "./inc/config.php";
include "./inc/function.php";
$id = $_SESSION['id'];
?>
<ul class="breadcrumb">
  <li><a href="./">Home</a></li>
  <li><a href="?page=<?php echo $page ;?>"><?php echo ucfirst($page) ; ?></a></li>
  <li class="active"><?php echo ucfirst($action) ; ?> Data</li>
</ul>
      <?php
        include "./inc/config.php";
        $query=mysql_query("SELECT * from t_user WHERE id='$_GET[id]' " ) or die (mysql_error());  //mengambil data tabel mahasiswa dan memasukkan nya ke variabel query
        $no=1;                    //membuat nomor pada tabel
        while($lihat=mysql_fetch_array($query)){    //mengeluarkan isi data dengan mysql_fetch_array dengan perulangan
      ?> 
<form class="form-horizontal" method="POST">
  <fieldset>
    <legend>Update Data Admin</legend>
    <div class="form-group">
      <label class="col-sm-2 control-label">Username</label>
      <div class="col-sm-3">
        <input type="text" class="form-control" readonly="" name="username" value="<?php echo $lihat['username'] ;?>">
        </select>
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-2 control-label">Password</label>
      <div class="col-sm-3">
        <input type="password" class="form-control" name="password" id="password" placeholder="masukkan password baru">
      </div>
      
    </div>
    <div class="form-group">
      <label class="col-sm-2 control-label">Nama</label>
      <div class="col-sm-3">
        <input type="text" class="form-control" readonly="" name="nama" value="<?php echo $lihat['nama'] ;?>">
        </select>
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-2 control-label">Level</label>
      <div class="col-sm-3">
          <select name="level" class="form-control">
        <option value="">--Pilih Level--</option>
        <option <?php if($lihat['level'] == "admin"){echo "selected";} ?> value="admin">Admin</option>
        <option <?php if($lihat['level'] == "operator"){echo "selected";} ?> value="operator">Operator</option>
      </select>
      </div>
    </div> 
    <div class="form-group">
      <label class="col-sm-2 control-label">Status</label>
      <div class="col-sm-3">
        <select name="status" class="form-control">
          <option <?php if( $lihat['aktif']=='1'){echo "selected"; } ?> value='1'>Aktif</option>
          <option <?php if( $lihat['aktif']=='0'){echo "selected"; } ?> value='0'>Non Aktif</option>          
        </select>
      </div>
    </div> 
   
   <input type="hidden" name="id" value="<?php echo $lihat['id'] ;?>">
    <div class="form-group">
      <div class="col-sm-10 col-sm-offset-2">
        <button type="reset" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span> Reset</button>
        <button type="submit" name="simpan" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Simpan</button>
        <a href="?page=admin" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span> Batal </a>
      </div>
    </div>
  </fieldset>


</form>
<?php
};
?>

  <?php 
  if(isset($_POST['simpan'])){
    $username = $_POST['username'];
    $nama = $_POST['nama'];
    $password = md5($_POST['password']);
    $level = $_POST['level'];
    $status = $_POST['status'];
    $id = $_POST['id'];

    $query=mysql_query("UPDATE t_user SET username='$username', password='$password', nama='$nama', level='$level', aktif='$status' WHERE id='id'")or die(mysql_error());
    
    echo '<META HTTP-EQUIV="Refresh" Content="0; URL=?page=admin">';
    } 


  ?>

  <script>
    function random() {

        var text = "";

        var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";



          for (var i = 0; i < 5; i++)

            text += possible.charAt(Math.floor(Math.random() * possible.length));



        return text;

    }

    function generatePass() {
      alert('Berhasil Generate Password');
      var x = random();

      console.log(x);

      $("#password").val(x);
    }
  </script>