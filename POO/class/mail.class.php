<?php
/**
 * Class Mail
 *
 */
class mail {
	/**
	 * Indica si la conexión con el servidor de correo requiere autenticación
	 * @var <boolean>
	 */
	private $authentication = true;
	
	/**
	 * Indica el host donde se realizará la conexión con el servidor de correo
	 * @var <string>
	 */
	private $host = '192.168.1.33';
	
	/**
	 * Indica el usuario que se empleará en la autenticación con el servidor de correo
	 * @var <string>
	 */
	private $user = 'usuario';
	
	/**
	 * Indica el password que se empleará en la autenticación con el servidor de correo
	 * @var <string>
	 */
	private $password = 'pAss12345';
	
	public function __construct(){
	}
	
	/**
	 * Envia el email
	 * @param <string> $to Es la dirección de email del destinatario
	 * @param <string> $subject Es el asunto del mensaje
	 * @param <string> $body Es el cuerpo del mensaje
	 * @param <boolean> $is_html Indica si el cuerpo del mensaje está en formato html
	 * @param <array> $para_cc Un array de direcciones de email para copia Cc
	 * @param <array> $para_bcc Un array de direcciones de email para copia Bcc
	 * @return <boolean> Devuelve true si se envia el email y lanza una excepción en caso de fallo
	 */
	private function sendEmail($to, $subject, $body, $is_html=false, Array $para_cc=array(), Array $para_bcc=array())
	{
		//... Envia el email y devuelve true si todo ha ido bien o lanza una excepción si falla
	}

	/**
	 * Envía email cuando un usuario se registra en la aplicación web
	 * @param <string> $usu Nombre del usuario registrado
	 * @param <string> $email Correo del usuario registrado
	 * @return <boolean> Devuelve el resultado de la funcion sendEmail()
	 */
	public function registro($usu, $email)
	{
		$this->host = '192.168.1.66';
		$this->user = 'registro';
		$this->password = 'r3g1str0';
		$this->authentication = true;

		$body = "<p>Bienvenido <strong>".$usu."</strong>,<br>
			su registro se ha realizado con éxito.</p>
			<p>Esperemos que nustros servicios sean de su agrado</p>
			<p>Un saludo</p>";

		return $this->sendEmail($email, "Bienvenido", $body);
	}

	/**
	 * Envía email cuando un usuario se da de baja
	 * @param <string> $usu Nombre del usuario que se ha dado de baja
	 * @param <string> $email Correo del usuario que se ha dado de baja
	 * @return <boolean> Devuelve el resultado de la funcion sendEmail()
	 */
	public function baja($usu, $email)
	{
		$this->host = '192.168.1.33';
		$this->user = 'usuario';
		$this->password = 'pAss12345';
		$this->authentication = true;

		$body = "<p>Sentimos que se haya dado de baja, ".$usu.".<br>
			Esperamos volver a verle muy pronto.</p>";

		return $this->sendEmail($email, "Se ha dado de baja satisfactoriamente", $body);
	}

	/**
	 * Envía email cuando un usuario solicita "recuperar su password"
	 * @param <string> $usu Nombre del usuario que ha solicitado
	 * @param <string> $pass Password del usuario que ha solicitado
	 * @param <string> $email Correo del usuario que ha solicitado
	 * @return <boolean> Devuelve el resultado de la funcion sendEmail()
	 */
	public function recordarPassword($usu, $pass, $email)
	{
		$this->host = '192.168.1.22';
		$this->user = null;
		$this->password = null;
		$this->authentication = false;

		$body = "<p>Estimad@ usuario,<br>
			le recordamos que sus datos de acceso son los siguientes:</p>
			<p>usuario: ".$usu."<br>
			password: ".$pass."</p>
			<p>Un saludo.</p>";

		return $this->sendEmail($email, "Aqui tienen sus datos de sesión", $body);
	}
}
?>