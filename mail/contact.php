<?php
if(empty($_POST['name']) || empty($_POST['subject']) || empty($_POST['message']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
  http_response_code(500);
  exit();
}

$name = strip_tags(htmlspecialchars($_POST['name']));
$email = strip_tags(htmlspecialchars($_POST['email']));
$m_subject = strip_tags(htmlspecialchars($_POST['subject']));
$message = strip_tags(htmlspecialchars($_POST['message']));

$to = "martoxxx100@gmail.com"; // Change this email to your //
$subject = "$m_subject:  $name";
$body = "recibiste un mensaje desde Una optica.\n\n"."estos son los detalles:\n\nNombre: $name\n\n\nEmail: $email\n\nMotivo: $m_subject\n\nMensaje: $message";
$header = "From: $email";
$header .= "Reply-To: $email";	

if(!mail($to, $subject, $body, $header))
  http_response_code(500);
?>
