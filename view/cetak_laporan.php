
<html>
<head>
<style type="text/css" media="print">
	table {border: solid 1px #000; border-collapse: collapse; width: 100%}
	tr { border: solid 1px #000; page-break-inside: avoid;}
	td { padding: 7px 5px; font-size: 10px}
	th {
		font-family:Arial;
		color:black;
		font-size: 11px;
		background-color:lightgrey;
	}
	thead {
		display:table-header-group;
	}
	tbody {
		display:table-row-group;
	}
	h3 { margin-bottom: -17px }
	h2 { margin-bottom: 0px }
</style>
<style type="text/css" media="screen">
	table {border: solid 1px #000; border-collapse: collapse; width: 100%}
	tr { border: solid 1px #000}
	th {
		font-family:Arial;
		color:black;
		font-size: 11px;
		background-color: #999;
		padding: 8px 0;
	}
	td { padding: 7px 5px;font-size: 10px}
	h3 { margin-bottom: -17px }
	h2 { margin-bottom: 0px }
</style>
<title>Cetak Rekap Pembayaran</title>
</head>

<body onLoad="window.print()">
<center><b style="font-size: 20px">Rekap Laporan Pembayaran</b><br>

<table class="table table-hover table-bordered table-striped">
	<thead>
	    <tr class="info">
	      <th>#</th>
	      <th>No Invoice</th>
	      <th>ID Pelanggan</th>
	      <th>Nama</th>
	      <th>Tgl Bayar</th>
	      <th>Bulan Tagihan</th>
	      <th>Total</th>
	      <th>Status</th>     
	    </tr>
  	</thead>
  	<tbody align="center">
  		<?php
		require_once('../inc/config.php');
		include"../inc/function.php";
		$dari= $_POST['dari'];
		$sampai= $_POST['sampai']; //get the nama value from form
		$id= $_POST['id_pelanggan'];
		$level= $_POST['level'];

		if($level=='admin'){
		$q = "SELECT a.id_transaksi, a.id_pelanggan, a.tgl_bayar, a.tgl_validasi, a.bulan_tagihan, a.nominal, a.status, b.nama FROM t_transaksi as a, t_pelanggan as b  WHERE a.tgl_bayar >= '$dari' AND a.tgl_bayar <= '$sampai' AND a.id_pelanggan=b.no_pelanggan ORDER BY a.id_transaksi DESC";		
		}else{
		$q = "SELECT id_transaksi, id_pelanggan, tgl_bayar, tgl_validasi, bulan_tagihan, nominal, status FROM t_transaksi  WHERE tgl_bayar >= '$dari' AND tgl_bayar <= '$sampai' AND id_pelanggan = '$id' ORDER BY id_transaksi DESC";
		}
		$total = mysql_query("SELECT SUM(nominal) as total FROM t_transaksi  WHERE tgl_bayar >= '$dari' AND tgl_bayar <= '$sampai' ");
		$row = mysql_fetch_array($total);

		$result = mysql_query($q) or die(mysql_error());
		$no=1; 
		while ($data = mysql_fetch_array($result)) { //fetch the result from query into an array
		
		?>
      <tr>
        <td><?php echo $no++; ?></td>         <!--menampilkan nomor dari variabel no-->
        <td><?php echo $data['id_transaksi'] ?></td>    <!--menampilkan data nim dari tabel mahasiswa-->
        <td><?php echo $data['id_pelanggan'] ?></td> 
        <td><?php echo $data['nama'] ?></td> 
        <td><?php echo TanggalIndo($data['tgl_bayar']); ?></td>     <!--menampilkan data nama dari tabel mahasiswa-->
        
        <td><?php echo TanggalIndo($data['bulan_tagihan']); ?></td> 
        <td><?php echo "Rp." . number_format( $data['nominal'] , 0 , ',' , '.' ); ?></td>     <!--menampilkan data alamat dari tabel mahasiswa-->
        <td><?php echo ucfirst($data['status']) ?></td>     <!--menampilkan data alamat dari tabel mahasiswa-->
        
        
      </tr>
      
      <?php
        }
      ?>
      <tr>
      	<td colspan="7" align="right">Total</td>
      	<td><?php echo "Rp." . number_format( $row['total'] , 0 , ',' , '.' ); ?></td>
      </tr>
  	</tbody>
  	
</table>
</body>
</html>
