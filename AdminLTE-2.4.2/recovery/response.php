<?php
extract($_POST);
$email = "canalgeekgame@gmail.com"
 
ini_set('display_errors', 1);
 
error_reporting(E_ALL);
 
$from = "baguncabagunca5@gmail.com";
 
$to = $email;
 
$subject = "Verificando o correio do PHP";
 
$message = "O correio do PHP funciona bem";
 
$headers = "De:". $from;
 
if(mail($to, $subject, $message, $headers)){
 
	echo "A mensagem de e-mail foi enviada.";
 else{
 	echo "Não";
 }
?>