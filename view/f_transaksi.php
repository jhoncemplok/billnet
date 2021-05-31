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
    <legend>Tambah Data Transaksi</legend>
    
    <?php 
    include "./inc/config.php";
    // membaca id transaksi terbesar
    $carikode = mysql_query("SELECT max(id_transaksi) as no_invoice FROM t_transaksi") or die(mysql_error());
    $datakode = mysql_fetch_array($carikode);      
    
    $kodeinvoice = $datakode['no_invoice'];
    // mengambil angka atau bilangan dalam id transaksi terbesar, 
    // dengan cara mengambil substring mulai dari karakter ke-1 diambil 6 karakter 
    // misal 'INV001', akan diambil '001' 
    // setelah substring bilangan diambil lantas dicasting menjadi integer
    $noUrut = (int) substr($kodeinvoice, 3, 3);
    // bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
    $noUrut++;
    // membentuk id transaksi baru 
    // perintah sprintf("%03s", $noUrut); digunakan untuk memformat string sebanyak 3 karakter 
    // misal sprintf("%03s", 12); maka akan dihasilkan '012' 
    // atau misal sprintf("%03s", 1); maka akan dihasilkan string '001'
    $char = "INV";
    $newID = $char . sprintf("%03s",$noUrut);
    ?>
    <div class="form-group">
      <label class="col-sm-2 control-label">No Invoice</label>
      <div class="col-sm-3">
        <input type="text" class="form-control" name="id"  value="<?php echo $newID ?>" readonly placeholder="No Invoice">
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-2 control-label">ID Pelanggan</label>
      <div class="col-sm-3">
        <select name="id_pelanggan" id="id_pelanggan" required="" onclick="javascript:bulanTagihan();" class="form-control">
          <option value="" selected="" >--Pilih Pelanggan--</option>
          <?php  
          include "./inc/config.php";
          $q_pelanggan = mysql_query("SELECT no_pelanggan, nama FROM t_pelanggan ORDER BY nama ASC ") or die(mysql_error());
          while($r_pelanggan =  mysql_fetch_array($q_pelanggan)){
          ?>
          <option value="<?php echo $r_pelanggan['no_pelanggan']; ?>"><?php echo $r_pelanggan['nama']; ?></option>
          <?php } ?>
        </select>
      </div>
    </div>

    <div class="form-group">
      <label class="col-sm-2 control-label">Bulan Tagihan</label>
      <div class="col-sm-3">
        <select name="bulan" id="isi_bulan"  class="form-control">
          <option value="" selected="" disabled="">--Bulan Tagihan--</option>          
        </select>
      </div>
    </div>

    <div class="form-group">
      <label class="col-sm-2 control-label">Jumlah Tagihan</label>
      <div class="col-sm-3">
        <input type="text" id="jmlTagihan" class="form-control" name="jmlTagihan" readonly="">
      </div>
    </div>

    <div class="form-group">
      <label class="col-sm-2 control-label">Tanggal Bayar</label>
      <div class="col-sm-3">
        <input type="text" id="datepicker" class="form-control" name="tgl_bayar" readonly="" value="<?php echo date("Y-m-d"); ?>" placeholder="Tanggal Bayar">
      </div>
    </div>

    <div class="form-group">
      <label class="col-sm-2 control-label">Jumlah Bayar</label>
      <div class="col-sm-3">        
        <input type="text" class="form-control " id="inputku"  name="nominal" placeholder="Jumlah Bayar">
      </div>
    </div> 

    <div class="form-group">
      <label class="col-sm-2 control-label">Sisa Bayar</label>
      <div class="col-sm-3">        
        <input type="text" class="form-control " id="sisa" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);" name="sisa" placeholder="Sisa Bayar">
      </div>
    </div> 

    
    
    <!-- <div class="form-group">
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
          $('.date-picker').datepicker( {
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
      <input type="text" name="bulan" class="form-control date-picker" placeholder="Bulan Tagihan" required="" id="startDate" />
      </div>  
    </div>    -->
    <!-- <div class="form-group">
      <label class="col-sm-2 control-label">Bukti Pembayaran</label>
      <div class="col-sm-3">
        <input type="file" id="exampleInputFile" name="bukti">
      </div>
    </div> -->
    
    
    <div class="form-group">
      <div class="col-sm-10 col-sm-offset-2">
        <button type="reset" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span> Reset</button>
        <button type="submit" name="simpan" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Tambah</button>
        <a href="?page=transaksi" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span> Batal </a>
      </div>
    </div>
  </fieldset>


</form>


  <?php 
  
  if(isset($_POST['simpan'])){
    $id           = $_POST['id'];
    $id_pelanggan = $_POST['id_pelanggan'];
    $bulan        = $_POST['bulan'];
    $nominal      = $_POST['nominal'];
    $sisa         = $_POST['sisa'];
    $tgl_bayar    = $_POST['tgl_bayar'];

    // $fileName = $_FILES['bukti']['name'];

    // $cekdata="SELECT id_transaksi from t_transaksi where id_transaksi='".$_POST['id']."'"; 
    // $ada=mysql_query($cekdata) or die(mysql_error()); 
    $data="SELECT * from t_transaksi";
    $aya=mysql_query($data) or die(mysql_error());

    $cekTagihan ="SELECT * from t_tagihan WHERE id_pelanggan = '$id_pelanggan' AND bulan_tagihan = '$bulan' ";
    $dataTagihan = mysql_query($cekTagihan) or die(mysql_error());

    $rowTagihan = mysql_num_rows($dataTagihan);

    // echo $rowTagihan;

    if($sisa==0) { 
      mysql_query("UPDATE t_tagihan SET tagihan = '$sisa' WHERE id_pelanggan = '$id_pelanggan' AND bulan_tagihan = '$bulan' ") or die (mysql_error());

      $query="INSERT INTO t_transaksi (id_transaksi, id_pelanggan, tgl_bayar, nominal, bulan_tagihan, status, sisa) VALUES ('$id','$id_pelanggan','$tgl_bayar','".str_replace(".","",$nominal)."','$bulan','lunas','$sisa')";
      mysql_query($query) or die(mysql_error()); 
      // move_uploaded_file($_FILES['bukti']['tmp_name'], "upload/".$_FILES['bukti']['name']);
      echo '<META HTTP-EQUIV="Refresh" Content="0; URL=?page=transaksi">';
    }  else { 
      mysql_query("UPDATE t_tagihan SET tagihan = '$sisa', ket='sisa tagihan ".$bulan."' WHERE id_pelanggan = '$id_pelanggan' AND bulan_tagihan = '$bulan' ") or die (mysql_error());

      $query="INSERT INTO t_transaksi (id_transaksi, id_pelanggan, tgl_bayar, nominal, bulan_tagihan, status, sisa) VALUES ('$id','$id_pelanggan','$tgl_bayar','".str_replace(".","",$nominal)."','$bulan','pending','$sisa')";
      mysql_query($query) or die(mysql_error()); 
      // move_uploaded_file($_FILES['bukti']['tmp_name'], "upload/".$_FILES['bukti']['name']);
      echo '<META HTTP-EQUIV="Refresh" Content="0; URL=?page=transaksi">';
    } 
  } 

  ?>


<script>
  $( "#isi_bulan" ).change(function() {
    jmlTagihan();
  });

  $( "#inputku" ).keyup(function() {
    var x = $("#jmlTagihan").val();
    var y = $("#inputku").val();

    var res = y.replace(".", "");

    console.log(res);

    var z = x-res;
    $("#sisa").val(z);
  });

  function bulanTagihan() {
    var id = $("#id_pelanggan").val();
    var datas = "id="+id;
    var url = "view/bulan_tagihan.php";
    
    console.log(id);

    $.ajax({
          url : url,
          type: "POST",
          data : datas,
          dataType : 'html',
          success: function(data)
          {
            $('#isi_bulan').html(data); 
            console.log(data);
            
          }
      });

    // $.ajax({
    //     type: "POST",
    //     url: "view/bulan_tagihan.php",
    //     data: datas
    //     success:function(data){
    //       $('#isi_bulan').html(data);
    //     }
    // })

  }
  function jmlTagihan() {
    var id = $("#id_pelanggan").val();
    var bulan = $("#isi_bulan").val();
    // var datas = "id="+id;
    var datas = 'id='+id+'&bulan='+bulan;
    var url = "view/jumlah_tagihan.php";
    
    console.log(id);

    $.ajax({
          url : url,
          type: "POST",
          data : datas,
          dataType : 'html',
          success: function(data)
          {
            $('#jmlTagihan').val(data);  
            console.log(data);
            
          }
      });

    // $.ajax({
    //     type: "POST",
    //     url: "view/bulan_tagihan.php",
    //     data: datas
    //     success:function(data){
    //       $('#isi_bulan').html(data);
    //     }
    // })

  }
</script>