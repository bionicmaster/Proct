<?php defined('SYSPATH') or die('No direct script access.');

return array
(

	'username' => array
	(
		'regex'         => 'Su usuario no es del formato requerido.',
		'unique'        => 'Su usuario ya existe.',
		'not_empty'     => 'Su usuario no puede estar en blanco',
		'min_length'    => 'Su usuario debe tener al menos :param1 caracteres.',
		'max_length'    => 'Su usuario debe tener menos de :param1 caracteres',

		'default'       => 'Hubo un error desconocido con su usuario.',
	),

	'email' => array
	(
		'email'         => 'Su direccion de correo es invalida.',
		'unique'        => 'Su direccion de correo ya esta registrada.',
                'not_empty'     => 'Su usuario no puede estar en blanco',
                'regex'	        => 'Su correo no pertenece a pg.com',
		'default'       => 'Hubo un error desconocido con su correo.',
	),

	'password' => array
	(
		'not_empty'     => 'Su contrase&ntilde;a no puede estar en blanco.',
		'min_length'    => 'Su contrase&ntilde;a debe ser de al menos :param1 caracteres.',
		'max_length'    => 'Su contrase&ntilde;a debe tener menos de :param1 caracteres.',
		'default'       => 'Hubo un error desconocido con su contrase&ntilde;a.',
	),

	'password_confirm' => array
	(
		'not_empty'     => 'Su confirmacion de contrase&ntilde;a no puede estar en blanco.',
		'min_length'    => 'Su confirmacion de contrase&ntilde;a debe ser de al menos :param1 caracteres.',
		'max_length'    => 'Su confirmacion de contrase&ntilde;a debe tener menos de :param1 caracteres.',
		'matches'       => 'Su confirmacion de contrase&ntilde;a no coincide con su contrase&ntilde;a.',

		'default'       => 'Hubo un error desconocido con su contrase&ntilde;a.',
	),

        'first_name' => array
	(
		'not_empty'     => 'Su nombre no puede estar en blanco',
		'min_length'    => 'Su nombre debe tener al menos :param1 caracteres.',
		'max_length'    => 'Su nombre debe tener menos de :param1 caracteres',
		'default'       => 'Hubo un error desconocido con su nombre.',
	),
        'last_name' => array
	(
		'not_empty'     => 'Su apellido no puede estar en blanco',
		'min_length'    => 'Su apellido debe tener al menos :param1 caracteres.',
		'max_length'    => 'Su apellido debe tener menos de :param1 caracteres',
		'default'       => 'Hubo un error desconocido con su apellido.',
	),
        'area' => array
	(
		'not_empty'     => 'Su departamento no puede estar en blanco',
		'min_length'    => 'Su departamento debe tener al menos :param1 caracteres.',
		'max_length'    => 'Su departamento debe tener menos de :param1 caracteres',
		'default'       => 'Hubo un error desconocido con su departamento.',
	),
);
