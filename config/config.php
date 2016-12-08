<?php

	Config::set('site_name', 'MVC-проект');

	Config::set('languages', ['ru', 'en']);

	// Маршруты. Route name => method prefix

	Config::set('routes', [
		'default' => '',
		'admin' => 'admin_'
	]);

	Config::set('default_route', 'default');
	Config::set('default_language', 'ru');
	Config::set('default_controller', 'pages');
	Config::set('default_action', 'index');

	Config::set('db.host', 'localhost');
	Config::set('db.user', 'root');
	Config::set('db.password', '');
	Config::set('db.db_name', 'mvc');

	Config::set('salt' , 'eriu35356y23yiuio3445');