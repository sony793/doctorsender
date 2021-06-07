<?php
/**
 * La aplicación web necesita enviar 3 tipos de correo:
 * 	• Email de "registro". Que se enviaría cuando un usuario se registrara a la aplicación web
 * 	• Email de "baja". Se enviaría cuando un usuario se da de baja
 * 	• Email de "recordar password". Se enviaría cuando un usuario solicita "recuperar su password"
 * El objetivo es diseñar la clase mail para que pueda enviar estos tres tipos de correos.
 */
require 'class/mail.class.php';

//Guardamos los datos del usuario recibidos como parametros
$usu = $_REQUEST['usu'];
$pass = $_REQUEST['pass'];
$email = $_REQUEST['email'];

//Creamos un objeto de la clase mail
$mail = new mail();

/**
 * Llamamos a las 3 funciones con los datos del usuario para enviar los 3 tipos de email de la clase Mail
 * Mostramos el mensaje 'Se ha enviado el mail correctamente' si todo ha ido ok en la funcion sendMail()
 */
$result = $mail->registro($usu, $email);
echo $result;

$result = $mail->baja($usu, $email);
echo $result;

$result = $mail->recordarPassword($usu, $pass, $email);
echo $result;
?>