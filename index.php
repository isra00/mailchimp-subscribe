<?php

define('MCAPI_KEY',			'');
define('WEBMASTER_EMAIL',	'')

require_once 'MCAPI.class.php';
require_once 'utils.php';

$api = new MCAPI(MCAPI_KEY);

$validation = array();
$notifications = array();

if (isset($_POST['sent']))
{
	if (!preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/', $_POST['email']))
	{
		$validation['email'] = 'El e-mail no es válido';
	}
	
	if (empty($validation))
	{

		$batch = array();
		$batch[] = array(
			'EMAIL'		=> $_POST['email'],
			'NOMBRE'	=> $_POST['nombre'],
			'MEDIO'		=> $_POST['medio'],
		);

		$vals = $api->listBatchSubscribe($_POST['lista'], $batch, false, true, false);

		if ($api->errorCode) 
		{
			mail(WEBMASTER_EMAIL, 'Fallo la suscripcion de Prensa con el formulario', 
				"code: " . $api->errorCode . "\nmsg: " . $api->errorMessage . "\n\nE-mail: " . $_POST['email'] . "\n\nNombre: " . $_POST['nombre'] . "\n\nMedio: " . $_POST['medio']);

			$notifications[] = array(
				'type'		=> 'alert',
				'message'	=> 'Lo siento, pero no se ha añadido la suscripción por un problema en el servidor. El webmaster ya está avisado.'
			);
		}
		else
		{
			$notifications[] = array(
				'type'		=> 'success',
				'message'	=> 'Suscriptor añadido correctamente'
			);
		}

		$_POST = array();
	}
	else
	{
		$notifications[] = array(
			'type'		=> 'alert',
			'message'	=> 'Por favor, revisa los errores en el formulario'
		);
	}
}

$lists = $api->lists();
$lists = $lists['data'];

include 'index.view.php';