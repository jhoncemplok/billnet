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

<form class="form-horizontal" method="POST" enctype="multipart/form-data">
  <fieldset>
    <legend>Tambah Data Tagihan</legend>

    <div class="form-group">
      <label class="col-sm-2 control-label">ID Pelanggan</label>
      <div class="col-sm-3">
        <select name="id_pelanggan" id="id_pelanggan" onchange="ambilTagihan()" required="" class="form-control">
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
    </div>
   
    <div class="form-group">
      <label class="col-sm-2 control-label">Jumlah Tagihan</label>
      <div class="col-sm-3">        
        <input type="text" class="form-control" readonly="" id="inputku" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);" name="tagihan" placeholder="Jumlah Tagihan">
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
      <input type="text" name="bulan" class="form-control date-picker" placeholder="Bulan Tagihan" required="" id="tagihan" />
      </div>  
    </div>   
    
    <div class="form-group">
      <div class="col-sm-10 col-sm-offset-2">
        <button type="reset" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span> Reset</button>
        <button type="submit" name="simpan" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Tambah</button>
        <a href="?page=tagihan" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span> Batal </a>
      </div>
    </div>
  </fieldset>


</form>


  <?php 
  
  if(isset($_POST['simpan'])){
    
    $pelanggan = $_POST['id_pelanggan'];
    $tagihan = $_POST['tagihan'];
    $bulan = $_POST['bulan'];

  $cekdata="SELECT bulan_tagihan from t_tagihan where bulan_tagihan = '$bulan' AND id_pelanggan='$pelanggan'"; 
  $ada=mysql_query($cekdata) or die(mysql_error()); 

    if(mysql_num_rows($ada)>0) { 
      writeMsg('bulan.sama');
    }  else { 
  	$query="INSERT INTO t_tagihan (tagihan, bulan_tagihan, id_pelanggan) VALUES ('".str_replace(".","",$tagihan)."','$bulan', '$pelanggan')";
  	mysql_query($query) or die(mysql_error()); 
  	echo '<META HTTP-EQUIV="Refresh" Content="0; URL=?page=tagihan">';
    }
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