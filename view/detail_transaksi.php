<ul class="breadcrumb">
  <li><a href="./">Home</a></li>
  <li><a href="?page=<?php echo $page ;?>"><?php echo ucfirst($page) ; ?></a></li>
  <li class="active"><?php echo ucfirst($action) ; ?> <?php echo ucfirst($page) ; ?></li>
</ul>
 <?php
 include "./inc/config.php";
 include "./inc/function.php";
 $query=mysql_query("SELECT t_pelanggan.*, t_paket.id_paket,t_paket.nama as nama_paket,t_paket.harga, t_transaksi.* from t_pelanggan, t_paket, t_transaksi WHERE t_pelanggan.no_pelanggan=t_transaksi.id_pelanggan AND t_pelanggan.id_paket=t_paket.id_paket AND t_transaksi.id_transaksi='$_GET[id]'") or die(mysql_error());
 $data=mysql_fetch_array($query);
 ?>
<div class="panel panel-info">
  <div class="panel-heading">
    <h3 class="panel-title">Detail Transaksi</h3>
  </div>
  <div class="panel-body">
  					<div class="form-horizontal" role="form">
                			  
					  <div class="form-group">
						<label class="col-sm-2 control-label">No. Invoice</label>
						<div class="col-sm-10">
							<label class="col-sm-0 control-label">:</label>
							<?php echo $data['id_transaksi']; ?>
						</div>
					  </div>
					  <div class="form-group">
						<label class="col-sm-2 control-label">Nama Pelanggan</label>
						<div class="col-sm-10">
							<label class="col-sm-0 control-label">:</label>
							<?php echo $data['nama']; ?>
						</div>
					  </div>					  
					  <div class="form-group">
						<label class="col-sm-2 control-label">Jumlah </label>
						<div class="col-sm-10">
							<label class="col-sm-0 control-label">:</label>
							<?php echo "Rp." . number_format( $data['nominal'] , 0 , ',' , '.' ); ?>
						</div>
					  </div>					  
					  <div class="form-group">
						<label class="col-sm-2 control-label">Bulan Tagihan</label>
						<div class="col-sm-10">
							<label class="col-sm-0 control-label">:</label>
							<?php echo TanggalIndo($data['bulan_tagihan']); ?>
						</div>
					  </div>
					  <div class="form-group">
						<label class="col-sm-2 control-label">Tgl Bayar</label>
						<div class="col-sm-10">
							<label class="col-sm-0 control-label">:</label>
							<?php echo TanggalIndo($data['tgl_bayar']); ?>
						</div>
					  </div>
					  <div class="form-group">
						<label class="col-sm-2 control-label">Status</label>
						<div class="col-sm-10">
							<label class="col-sm-0 control-label">:</label>
							<strong><?php echo ucfirst($data['status']) ?></strong>
						</div>
					  </div>
					  <div class="btn-group">
						<?php 
							echo "<a href=\"?page=transaksi\" class=\"btn btn-primary\"><span class=\"glyphicon glyphicon-arrow-left\"></span> Kembali</a>"; 
						?> 
					  </div>
					</div>
  </div>
</div>


					