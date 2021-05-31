<!-- 
************************************************
* Developer    : Hades
* Company      : Wong Ndeso
* Release Date : 1 Agustus 2016
* Website      : www.wongndeso.net
* E-mail       : rickyfirman2411@gmail.com
* Phone        : 083-863-676-540
-->
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Cek Tagihan Internet</title>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-height">
  <meta name="keywords" content="admin, dashboard, bootstrap, template, flat, modern, theme, responsive, fluid, retina, backend, html5, css, css3">
  <meta name="description" content="">
  <meta name="author" content="Iwan M Setiawan">
  <link rel="shortcut icon" href="image/favicon.ico">
  <link href="../css/bootstrap.css" rel="stylesheet">
  <link href="../js/jquery/jquery-ui.min.css" rel="stylesheet">
  <link href="../css/datepicker.css" rel="stylesheet">

  <link href="../css/style.css" rel="stylesheet">
  <style type="text/css">
.ui-datepicker-calendar {
display: none;
}
select{
color:#000;
}

</style>
  
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="../js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../js/bootstrap.min.js"></script>   
    <script src="../js/jquery/jquery-ui.min.js"></script>
    <script src="../js/angka.js"></script>
    <!--
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="http://code.jquery.com/jquery-1.10.2.js"></script>
    <script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script> -->
    
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

</head>
<body>
<div class="navbar navbar-inverse navbar-fixed-top">
      <div class="container"><br>
        <div class="navbar-header">
          <span class="navbar-brand"><strong style="font-family: verdana; margin-left: 30px; padding: 19.5px 15px;">M-Link Home Internet Service)</strong></span>
          <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div class="navbar-collapse collapse" id="navbar-main">
          

          <ul class="nav navbar-nav navbar-right">
            <li><a href="../index.php">Home</a></li>
            <li><a href="#">Help</a></li>
          </ul>

        </div>
        
      </div>
    </div>

 <div class="container">
	
	<br><br>

	<div class="container-fluid" style="margin-top: 30px">
			
		<div class="panel panel-info" style="width: 50%; margin: 20px auto; border: solid 1px #d9d9d9; padding: 30px 20px; border-radius: 8px">
		  <div class="panel-heading">
		    <h3 class="panel-title">Cek Tagihan</h3>
		  </div>
		  <div class="panel-body">
		    
          	<form method="POST" action="" class="form-signin">
          		<div class="form-group">
	          		<div class="input-group">
				        <label for="inputEmail" class="sr-only">ID Pelanggan</label>
				        <span class="input-group-addon"><span class="glyphicon glyphicon-user" aria-hidden="true"></span></span>
				        <input type="text" name="id" class="form-control" placeholder="ID Pelanggan" required="" autofocus="">
			        </div>
		    	</div>
		        <div class="form-group">
	          		<div class="input-group">
				        <label for="inputEmail" class="sr-only">Bulan Tagihan</label>
				        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span></span>
				        <!--<input type="text" name="bulan" class="form-control" id="date-picker" placeholder="Bulan Tagihan" required="" autofocus=""> -->
				        <input type="text" name="bulan" class="form-control date-picker" placeholder="Bulan Tagihan" required="" autofocus="" id="startDate" />
			        </div>
		    	</div>		        
		        <br/>
		        <center>
		        	<button type="submit" name="btnSubmit" class="btn btn-success btn-block"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> Cari</button>		        
		        	<!--<a href="../login.php" class="btn btn-info" title="Login"><span class="glyphicon glyphicon-log-in" aria-hidden="true"></span> Login</a>-->
		        	<!--<a href="#" class="btn btn-warning" data-toggle="modal" data-target="#myModal" title="Kontak Kami"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> Kontak Kami</a>-->
		        	
			    </center>
		    </form>
		  </div>
		  <?php
      		include "../inc/config.php";
      		include "../inc/function.php";
			if(isset($_POST['btnSubmit'])){
			$query=mysql_query("SELECT * from t_tagihan where id_pelanggan='$_POST[id]' and bulan_tagihan='$_POST[bulan]'") or die(mysql_error());	 //melakukan pengampilan data dari database untuk di cocokkan
			$data=mysql_num_rows($query);	 //melakukan pencocokan
			$r=mysql_fetch_array($query);

			if ($data == 1) { 		// melakukan pemeriksaan kecocokan dengan percabangan.?>
				<div class="panel-heading">
				    <h3 class="panel-title">Data Pelanggan</h3>
				  </div>
				  <div class="panel-body">	          	
		          		<div class="form-group">
			          		<div class="input-group">
						        <label for="inputEmail" class="sr-only">ID Pelanggan</label>
						        <span class="input-group-addon"><span class="glyphicon glyphicon-user" aria-hidden="true"></span></span>
						        <input type="text" class="form-control" value="<?php echo $r['id_pelanggan'] ?>" readonly >
					        </div>
				    	</div>
				        <div class="form-group">
			          		<div class="input-group">
						        <label for="inputEmail" class="sr-only">Bulan Tagihan</label>
						        <span class="input-group-addon"><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span></span>
						        <input type="text" class="form-control" id="date-picker" value="<?php echo TanggalIndo($r['bulan_tagihan']) ?>" readonly>
					        </div>
				    	</div>
				   
				</div>
				<div class="panel-heading">
				    <h3 class="panel-title">Info Tagihan</h3>
				  </div>
				  <div class="panel-body">	          	
		          		<div class="form-group">
			          		<div class="input-group">
						        <label for="inputEmail" class="sr-only">Nominal</label>
						        <span class="input-group-addon"><span class="glyphicon glyphicon-usd" aria-hidden="true"></span></span>
						        <input type="text" class="form-control" value="<?php echo "Rp." . number_format( $r['tagihan'] , 0 , ',' , '.' ); ?>" readonly >
					        </div>
				    	</div>
				        <div class="form-group">
			          		<div class="input-group">
						        <label for="inputEmail" class="sr-only">Terbilang</label>
						        <span class="input-group-addon"><span class="glyphicon glyphicon-font" aria-hidden="true"></span></span>
						        <input type="text" class="form-control" id="date-picker" value="<?php echo terbilang($r['tagihan'],$style=4) ?> rupiah" readonly>
					        </div>
				    	</div>
				    	<div class="form-group">
			          		<div class="input-group">
						        <label for="inputEmail" class="sr-only">Ket</label>
						        <span class="input-group-addon"><span class="glyphicon glyphicon-bell" aria-hidden="true"></span></span>
						        <input type="text" class="form-control" id="date-picker" value="<?php echo ucfirst($r['ket']) ?>" readonly>
					        </div>
				    	</div>
				    	<?php
				    	  error_reporting(0);
						  session_start();						  
						  if(empty($_SESSION['username'])){
						  ?>
						<center>
				    		<a href="#" class="btn btn-info btn-block disabled" title="Cetak Invoice" target="_blank"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> Cetak Invoice</a>				    	
						<?php  
						}else{
						?>
				    		<a href="cetak_invoice.php?&id=<?php echo $r['id_tagihan'] ?>" class="btn btn-info btn-block" title="Cetak Invoice" target="_blank"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> Cetak Invoice</a>
				    	</center> 
				    	<?php 
				    	}
				    	?>
				   
				</div>
			  <?php
			}else{   				
				writeMsg('tagihan.kosong');
		}
		
		}
	 
	  	?>
			
		</div>
		
      </div><!--/row-->
      
			
    </div><!--/.fluid-container-->
  
</body>
</html>