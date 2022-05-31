<?php
$nama= $_POST['nama'];
$hp= $_POST['hp'];
$alamat= $_POST['alamat'];
$usermail= $_POST['usermail'];
$body= "
Nama : $nama <br/>
HP : $hp <br/>
Alamat: $alamat <br/>
Email: $usermail <br/>
";

function Send_Mail($to,$subject,$body)
{
require 'PHPmailer/class.phpmailer.php';

 

$usermail= $_POST['usermail'];
$mail = new PHPMailer();
$mail->IsMail(true); // SMTP
$mail->SMTPAuth = true; // SMTP authentication
$mail->Host= "smtp.gmail.com";
$mail->SMTPSecure = 'tls';
$mail->Port = 587;
$mail->SetFrom("email@gmail.com","email sender");
$mail->Username = "sazaliagus@gmail.com"; // username gmail yang akan digunakan untuk mengirim email
$mail->Password = "akusayangdwi"; // Password email
$mail->SetFrom($usermail, 'user');
$mail->AddReplyTo($usermail,'user');
$mail->Subject = $subject;
$mail->MsgHTML($body);
$address = $to;
$mail->AddAddress($address, $to);
$mail->AddAddress($usermail);
if(!$mail->Send())
return false;
else
return true;

}

$to = "emailtujuan@gmail.com"; //email tujuan
$subject = "New email"; // subject email
echo"<br/><br/><center><h3>email telah terkirim</h3></center>";
Send_Mail($to,$subject,$body);
?>

<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
</head>
<body>
	<br/><br/><br/>
	<div class="row">
		<div class="col-md-4"></div>
		<div class="col-md-4">
			<form action='kirim.php' method='post'>
				<div class="form-group">
					<label >Nama</label>
					<input type="text" class="form-control" name="nama">
				</div>
				<div class="form-group">
					<label >Nomer HP</label>
					<input type="text" class="form-control" name="hp">
				</div>
				<div class="form-group">
					<label >Alamat</label>
					<input type="text" class="form-control" name="alamat">
				</div>
				<div class="form-group">
					<label >Email</label>
					<input type="text" class="form-control" name="usermail"></div>
					<button type='Submit'>Submit</button>
				</form>
			</div>
</div>
</body>
</html>