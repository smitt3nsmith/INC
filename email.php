<?php
require_once 'lib/PHPMailerAutoload.php';
session_start();
$emailAddress = $_POST['email'];
$emailBody=$_POST['message'];
$emailTitle=$_POST['name'];
$mail = new PHPMailer;

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'incafricaltd@gmail.com';                 // SMTP username
$mail->Password = '199119921993';                           // SMTP password
$mail->SMTPSecure = 'ssl';                            // Enable encryption, 'ssl' also accepted
$mail->Port = 465;   

$mail->From = $emailAddress;
$mail->FromName = $emailAddress;
$mail->addAddress("info@incconsulting.co.ke", "INC Consulting");     // Add a recipient


$mail->Subject = "CONTACT FORM from: ".$emailAddress;
$mail->Body    = "Dear ". $emailTitle ." \n\n ".$emailBody;

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
    sleep(2);
    header ('Location:contact.html');    
} else {

    header('Location:success.html');
   
}