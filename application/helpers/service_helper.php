<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
// require './vendor/autoload.php';


function sendMail(){
	$ci = get_instance();

	$mail = new PHPMailer;
	
	$mail->isSMTP();
	$mail->Host 		= 'smtp.gmail.com';
	$mail->SMTPAuth 	= true;
	$mail->Username 	= 'okumura16rin@gmail.com';
	$mail->Password 	= 'voidgenome31';
	$mail->SMTPSecure   = 'tls';
	$mail->Port 		= 587;

	$mail->setFrom('andika.rach4@gmail.com', 'TEST');
	$mail->addReplyTo('no-reply@gmail.com', 'TEST');

	// Menambahkan penerima
	// $mail->addAddress('andika.rachadi@multifab.co.id'); 
	$mail->addAddress('okumura16rin@gmail.com'); 
	 

	// Menambahkan cc atau bcc 
	// $mail->addCC('admin@domain.co.id');
	// $mail->addBCC('bcc@contoh.com');

	// Subjek email
	$mail->Subject = 'TEST';
	 
	$mail->isHTML(true);

	// Konten/isi email
	$mailContent =  "<h1>Tess Kirim Email</h1> <p>JAJAL.</p>";
	$mail->Body  =  $mailContent;
	 
	// Kirim email
	if(!$mail->send()){
	    echo 'Pesan tidak dapat dikirim.';
	    echo 'Mailer Error: ' . $mail->ErrorInfo;
	}else{
	    echo 'Pesan telah terkirim';
	}
}