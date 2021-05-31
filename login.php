<!-- 
************************************************
* Developer    : Hades
* Company      : Wong Ndeso
* Release Date : 1 Agustus 2016
* Website      : www.wongndeso.net
* E-mail       : rickyfirman2411@gmail.com
* Phone        : 083-863-676-540
-->
<?php
	error_reporting(0);	
	session_start();
	include "inc/function.php";
	if($_SESSION['username']){
	header("location:index.php");
}else{
?>

<html>
<head>
    <meta name="viewport" content="width=device-height">
	<title>Halaman Login - ExotisNet</title>
	<link rel="stylesheet" href="css/whhg.css">
	<style type="text/css">
	  .the-icons {
	      list-style: none outside none;
	      margin-left: 0;
	  }
	  .the-icons li {
	      float: left;
	      line-height: 25px;
	      width: 25%;
	  }
	  .the-icons i:hover {
	      background-color: rgba(255, 0, 0, 0.25);
	  }
	 </style>
	<link href="css/bootstrap.css" rel="stylesheet">
  	<link href="css/style.css" rel="stylesheet">  	
  	<script src="js/jquery.min.js"></script>
  	<script src="js/bootstrap.min.js"></script>

  	<!-- <link href="css/login.css" rel="stylesheet"> -->
  	
</head>
<body>

<div class="navbar navbar-inverse navbar-fixed-top">
    <center>
        <br>
      <div class="container">
          <div class="navbar-header">
            <span class="navbar-brand"><strong style="font-family: verdana; margin-center: 30px">INFORMASI TAGIHAN INTERNET</strong></span>
        </div>
       </div>
       </center>
    </div>

 <div class="container">
	
	<br><br>

	<div class="container-fluid" style="margin-top: 30px"><br>
			
		<div class="panel panel-info" style="width: 400px; margin: 20px auto; border: solid 1px #d9d9d9; padding: 30px 20px; border-radius: 8px">




		  <div class="panel-heading">
		    <h3 class="panel-title">Login Member</h3>
		  </div>
		  <div class="panel-body">
		    
          	<form method="POST" action="login-submit.php" class="form-signin">
          		<div class="form-group">
	          		<div class="input-group">
				        <label for="inputEmail" class="sr-only">Username</label>
				        <span class="input-group-addon"><span class="glyphicon glyphicon-user" aria-hidden="true"></span></span>
				        <input type="text" name="username" class="form-control" placeholder="Username" required="" autofocus="">
			        </div>
		    	</div>
		        <div class="form-group">
	          		<div class="input-group">
				        <label for="inputEmail" class="sr-only">Password</label>
				        <span class="input-group-addon"><span class="glyphicon glyphicon-lock" aria-hidden="true"></span></span>
				        <input type="password" name="password" class="form-control" placeholder="Password" required="" autofocus="">
			        </div>
		    	</div>		        
		        <button type="submit" name="btnSubmit" class="btn btn-success btn-block"><span class="glyphicon glyphicon-log-in" aria-hidden="true"></span> Masuk</button>
		        <br/>
		        <center>
		        	<a href="view/tagihan.php" class="btn btn-info" title="Cek Tagihan"><span class="glyphicon glyphicon-bell" aria-hidden="true"></span> Cek Tagihan</a>
		        	<!--<a href="#" class="btn btn-warning" data-toggle="modal" data-target="#myModal" title="Kontak Kami"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> Kontak Kami</a>-->
		        	<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#myModal" title="Kontak Kami"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> Kontak Kami</button>
			    </center>
			   
			    
		    </form>
		  </div>
		
		</div>
		
      </div><!--/row-->
      

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Kontak Kami</h4>
        </div>
        <div class="modal-body">
          <p><span class="glyphicon glyphicon-home" aria-hidden="true"><br></span>  Jl. vihara No.19 02/05 Balerejo Wlingi Blitar </p>
          <p><span class="glyphicon glyphicon-earphone" aria-hidden="true"><tr></span>  085853640186 </p>
          <p><span class="glyphicon glyphicon-envelope" aria-hidden="true"><tr></span>   mastoriq37@gmail.com </p>
          <!--<p><i class="icon-blackberry"></i> 77xxxx </p>-->
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
    
  </div>

    </div><!--/.fluid-container-->
   
   
<footer class="site-footer">
		
<center>
<div id="footer">
    <div class="container">
	Hak Cipta Terpelihara oleh ExotisNet
		<br>
		Jl. vihara No.19 02/05 Balerejo Wlingi Blitar<br>
Developed By <a href="https://www.facebook.com/virmansyah.ricky"><b>Fatkul Toriq</b>
		
		</script></a></p>
    </div>
	</footer>
</div>
   
   </center>
  
</html>
<?php 
}
?>