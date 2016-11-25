<?php 
require 'PHPMailer/PHPMailerAutoload.php';
$mail = new PHPMailer(); // create a new object
$mail->IsSMTP(); // enable SMTP
//$mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
$mail->SMTPAuth = true; // authentication enabled
$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
$mail->Host = "smtp.gmail.com";
$mail->Port = 465; // or 587
$mail->IsHTML(true);
$mail->SetFrom('name@yourdomain.com', 'Admin SoftDom');
$mail->Username = "admin@softdom.com.ar";
$mail->Password = "softdom2016";


if(isset($_POST['subject']) and isset($_POST['body']) and isset($_POST['destino']) ){
$mail->Subject = $_POST['subject'];
$mail->Body = $_POST['body'];
$mail->AddAddress($_POST['destino']);
 if(!$mail->Send()) {
    echo json_encode(array('estado'=>'error','mensaje'=>$mail->ErrorInfo));
 } else {
    echo json_encode(array('estado'=>'ok','mensaje'=>'Email enviado'));
 }
}else {
    echo json_encode(array('estado'=>'error','mensaje'=>'Verifique los parametros enviados'));
}


 ?>