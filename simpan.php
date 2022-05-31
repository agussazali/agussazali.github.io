<html>
<head>
	<title>Kolom Komentar</title>
</head>
<body>
	<form id="form1" name="form1" method="post" action="simpan.php">
		<table width="200" border="1">
			<tr>
				<td colspan="2"><strong>Tingggalkan Komentar Anda : </strong></td>
			</tr>
			<tr>
				<td width="96">Nama</td>
				<td width="88"><label for="textfield"></label>
					<input type="text" name="nama" id="nama" /></td>
				</tr>
				<tr>
					<td>Website</td>
					<td><label for="textfield"></label>
						<input type="text" name="website" id="website" /></td>
					</tr>
					<tr>
						<td>Komentar</td>
						<td><label for="textfield"></label>
							 <label for="textarea"></label>
							<textarea name="pesan" id="pesan"></textarea></td>
						</tr>
						<tr><td>&nbsp;</td>
							<td><label for="Submit"></label>
								<input type="submit" name="Submit" value="Submit" id="Submit"/><label for="label"></label>
								<input type="reset" name="Submit2" value="Reset" id="label"/></td>
						</tr>
		</table>
		<p>Komentar Lainnya : </p>
	</form>
	<?php
	//konfigurasi koneksi
	mysql_connect ("localhost","root","kucing");
	mysql_select_db ("db_komentar");

	//inisialisasi tanggal
	$tanggal = date ("Ymd");
	//inisialisasi waktu
	$time = date ("H:i:s");
	//query untuk menambah data ke dalam tabel
	$kueri = mysql_query ("INSERT INTO tb_komentar(nama, website, pesan, tanggal, time) values('$_POST[nama]', '$_POST[website]', '$_POST[pesan]', '$tanggal','$time')");

	//query untuk menampilkan data ke dalam tabel
	$query = mysql_query ("SELECT * FROM tb_komentar ORDER BY time || tanggal DESC");while ($d = mysql_fetch_array ($query))
	{
		$psn = $d['pesan'];
		echo "<table>";
		echo "<tr><td><b>$d[nama] : $psn</b></td></tr>";
		echo "<tr><td><i>Website : $d[website]</i></td></tr>";
		echo "<tr><td align=right>$d[time]: $d[tanggal]</td></tr></table><hr>";
	}
	?>
</body>
</html>