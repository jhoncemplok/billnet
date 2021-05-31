<?php
include "./inc/config.php";
include "./inc/function.php";
$id = $_SESSION['id'];
$level = $_SESSION['level'];
?>
<ul class="breadcrumb">
  <li><a href="./">Home</a></li>
  <li class="active">Cek Tagihan></li>
</ul>



<form class="form-inline" method="post">
  <legend>Cek Data Tagihan Pelanggan</legend>  
  <div class="form-group">
    <label for="exampleInputName2">ID Pelanggan</label>
    <select name="id_pelanggan" id="id_pelanggan" required="" class="form-control">
      <option value="" selected="" disabled="">--Pilih Pelanggan--</option>
      <?php  
      include "./inc/config.php";
      $q_pelanggan = mysql_query("SELECT no_pelanggan, nama FROM t_pelanggan ORDER BY nama ASC ") or die(mysql_error());
      while($r_pelanggan =  mysql_fetch_array($q_pelanggan)){
      ?>
      <option value="<?php echo $r_pelanggan['no_pelanggan']; ?>"><?php echo $r_pelanggan['no_pelanggan']; ?> - <?php echo ucwords($r_pelanggan['nama']); ?></option>
      <?php } ?>
    </select>
  </div>

  <input type="hidden" name="id_pelanggan" value="<?php echo "$_SESSION[id]" ;?>">
  <input type="hidden" name="level" value="<?php echo "$_SESSION[level]" ;?>">
  <a id="btnCari" onclick="cariData()" class="btn btn-info">Cari</a>
</form>
<div class="row">
  <p id="waiting"></p>
</div>

<div id="isi_data"></div>
  


<script>
  function cariData() {
    var x = $("#id_pelanggan").val();  
    console.log(x);  

    var url = "view/cariData.php";

    $.ajax({
    url: url,
    type: "POST",
    dataType: "html",
    data: {id:x},
    beforeSend: function(){
    $('#waiting').text('Mohon Tunggu Sebentar').fadeIn('slow');
    },

    success: function(data){
    $('#waiting').fadeOut('slow');
    // $('#inputku').text(html).fadeIn('slow').fadeOut('slow').fadeIn('slow');
    $('#isi_data').html(data);
    console.log(data);
    }
    });
  }
</script>
