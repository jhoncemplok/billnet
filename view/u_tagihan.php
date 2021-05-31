<?php  
$id = $_GET['id'];
?>
<ul class="breadcrumb">
  <li><a href="./">Home</a></li>
  <li><a href="?page=<?php echo $page ;?>"><?php echo ucfirst($page) ; ?></a></li>
  <li class="active"><?php echo ucfirst($action) ; ?> Data</li>
</ul>

      <?php
        include "./inc/config.php";
        $query=mysql_query("SELECT * from t_tagihan WHERE id_tagihan='$id' " ) or die (mysql_error());  //mengambil data tabel mahasiswa dan memasukkan nya ke variabel query
        $no=1;                    //membuat nomor pada tabel
        while($lihat=mysql_fetch_array($query)){    //mengeluarkan isi data dengan mysql_fetch_array dengan perulangan
      ?> 
<form class="form-horizontal" method="POST" action="" enctype="multipart/form-data">
  <fieldset>
    <legend>Update Data Tagihan</legend>
    
    <div class="form-group">
      <label class="col-sm-2 control-label">ID Pelanggan</label>
      <div class="col-sm-3">
        <select name="id_pelanggan" required="" id="id_pelanggan" onchange="ambilTagihan()"  class="form-control">
          <option value="" selected="" disabled="">--Pilih Pelanggan--</option>
          <?php  
          include "./inc/config.php";
          $q_pelanggan = mysql_query("SELECT no_pelanggan, nama FROM t_pelanggan ORDER BY nama ASC ") or die(mysql_error());
          while($r_pelanggan =  mysql_fetch_array($q_pelanggan)){
          ?>
          <option <?php if($lihat['id_pelanggan']==$r_pelanggan['no_pelanggan']){echo "selected";} ?> value="<?php echo $r_pelanggan['no_pelanggan']; ?>"><?php echo $r_pelanggan['no_pelanggan']; ?> - <?php echo ucwords($r_pelanggan['nama']); ?></option>
          <?php } ?>
        </select>
      </div>
    </div>

    <div class="form-group">
      <label class="col-sm-2 control-label">Jumlah Tagihan</label>
      <div class="col-sm-3">
        <input type="text" class="form-control" readonly="" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);" id="inputku" name="tagihan" value="<?php echo $lihat['tagihan'] ;?>">
      </div>
    </div>

    <div class="form-group">
      <label class="col-sm-2 control-label">Bulan Tagihan</label>
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
          $('#tagihan').datepicker( {
              changeMonth: true,
              changeYear: true,
              showButtonPanel: true,
              dateFormat: 'yy-mm',
              onClose: function(dateText, inst) { 
                  var month = $("#ui-datepicker-div .ui-datepicker-month :selected").val();
                  var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
                  $(this).datepicker('setDate', new Date(year, month, 1));
              }
          });
        });
        </script>
      <input type="text" name="bulan" class="form-control date-picker" placeholder="Bulan Tagihan" required="" id="tagihan" value="<?php echo $lihat['bulan_tagihan']; ?>" />
      </div>  
    </div>   
    

   <input type="hidden" name="id" value="<?php echo $lihat['id_tagihan'] ;?>">
    <div class="form-group">
      <div class="col-sm-10 col-sm-offset-2">
        <button type="reset" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span> Reset</button>
        <button type="submit" name="simpan" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Simpan</button>
        <a href="?page=tagihan" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span> Batal </a>
      </div>
    </div>
  </fieldset>


</form>
<?php
}
?>

  <?php 
  if(isset($_POST['simpan'])){

    $id_tagihan = $_POST['id'];
    $pelanggan = $_POST['id_pelanggan'];
    $tagihan = $_POST['tagihan'];
    $bulan = $_POST['bulan'];

    $query=mysql_query("UPDATE t_tagihan SET tagihan='".str_replace(".","",$tagihan)."', bulan_tagihan='$bulan', id_pelanggan='$pelanggan' WHERE id_tagihan='$id_tagihan'")or die(mysql_error());
    
    echo '<META HTTP-EQUIV="Refresh" Content="0; URL=?page=tagihan">';
  } 


  ?>

  <script>
  function ambilTagihan() {
    var x = $("#id_pelanggan").val();
    console.log(x);

    $.ajax({
    url: "view/ambil_tagihan.php",
    type: "POST",
    dataType: "html",
    data: {id:x},
    beforeSend: function(){
    $('#waiting').text('Mohon Tunggu Sebentar').fadeIn('slow');
    },

    success: function(html){
    $('#waiting').fadeOut('slow');
    // $('#inputku').text(html).fadeIn('slow').fadeOut('slow').fadeIn('slow');
    $('#inputku').val(html);
    console.log(html);
    }
    });
 
  }
</script>