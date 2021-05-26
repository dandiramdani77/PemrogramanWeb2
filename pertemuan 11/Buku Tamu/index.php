<?php 
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
date_default_timezone_set('Asia/Jakarta');
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link href="js/bootstrap.min.css" rel="stylesheet">
</head>
<body>
	<div class="panel panel-primary">
	<div class="panel-heading">
		<h3 class="panel-title">Buku Tamu</h3>
	</div>
	
<!-- KODING KE 1 -->  
<?php
	include "koneksi.php";
	$nama=$_POST['nama'];
	$hp=$_POST['hp'];
	$keperluan=$_POST['keperluan'];
	$tanggal=date("d-m-Y");
	$waktu=date("h:i:s");
	$tombol=$_POST['Submit'];
	if($tombol=='Submit'){
	$insdata=mysqli_query($koneksi,"INSERT INTO tamu VALUES   (NULL,'$nama','$hp','$keperluan','$tanggal','$waktu')");
	?>

	
        <table class="table" cellpadding="0" cellspacing="1" bgcolor="#B2E9FB">
            <tr>
                <td align="center" valign="middle" bgcolor="#F6FCFF"><strong>Sukses!!</strong> Anda telah mengisi Bukutamu </td>
            </tr>
            <tr>
            	<td><a href="index.php">Kembali ke buku tamu</a></td>
            </tr>
        </table>

<!-- KODING KE 2 -->	
    <?php  } else {    ?>
		
	<div class="panel-body">
    <form action="" method="post" name="form1">
        <table height="219" class="tg">
			<tr>
				<td width="89" valign="top">Nama</td>
				<td width="620"><input  name="nama" class="form-control" type="text" placeholder="Nama" id="nama" required/></td>
			</tr>
			<tr>
				<td valign="top">No. Hp</td>
				<td><input  name="hp" class="form-control" type="text" placeholder="No. Hp" id="hp" required/></td>
			</tr>
			<tr>
				<td valign="top">Keperluan</td>
				<td><textarea  name="keperluan" class="form-control" rows="7"   placeholder="Keperluan" id="keperluan" required/></textarea></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td><input name="Submit" type="submit" class="btn btn-xs btn-primary" value="Submit">
				<input name="Reset" type="reset" class="btn btn-xs btn-success" value="Reset">
				</td>
			</tr>
		</table>
	</form>

	</div>

<!-- KODING KE 3 --> 
    <?php  }  ?>
</div>
<hr>
<div class="panel panel-primary">
	<div class="panel-heading">
		<h3 class="panel-title">View GuestBook</h3>
	</div>
	<div class="panel-body">
<!-- KODING KE 4 -->
<?php		
$tmpbukutamu=mysqli_query($koneksi,"SELECT * FROM tamu ORDER BY no DESC LIMIT 0,5");
while($bukutm=mysqli_fetch_array($tmpbukutamu)){
?>


		<table width="452" border="0" cellpadding="0" cellspacing="1">
			<tr>
				<td height="47" align="center">
					<table width="431" border="0" cellpadding="2" cellspacing="0">
						<tr>
							<td><b style="color:#FF0000"><?=$gede=strtoupper($bukutm['nama'])?></b><br>
							<font style="font-size:15px; color:#999999; "><?=$bukutm['tgl']?> | <?=$bukutm['wkt']?></font>
							</td>
						</tr>
						<tr>
							<td><font style="font-size:15px; "><?=$bukutm['hp']?> </font></td>
						</tr>
						<tr>
							<td><?=$bukutm['keperluan']?></td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
		<br>
<!-- KODING KE 5 -->	
    <?php  }  ?>	
	</div>
</div>
<script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>