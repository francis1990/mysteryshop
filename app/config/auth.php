<?php

return array(
    'multi'=>array(
        'account' => array(
            'driver' => 'eloquent',
            'model' => 'Account'
        ),
        'user' => array(
            'driver' => 'eloquent',
            'model' => 'User',
            'table' => 'tb_user'

        ),
        'admin' => array(
            'driver' => 'database',
            'table' => 'tb_operador_sistema'
        )
    ),
    'reminder' => array(

        'email' => 'emails.auth.reminder',

        'table' => 'password_reminders',

        'expire' => 60,
    ),
);






/*return array(
	'driver' => 'eloquent',
	'model' => 'User',
	'table' => 'tb_usuario_wifi',
	'reminder' => array(

		'email' => 'emails.auth.reminder',

		'table' => 'password_reminders',

		'expire' => 60,

	),
);*/
