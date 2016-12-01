<?php

	class App
	{
		protected static $router;

		public static function getRouter()
		{
			return self::$router;
		}

		public static function run($uri)
		{
			self::$router = new Router($uri);

			$controller_class  = ucfirst(self::$router->getController()) . 'Controller';
			$controller_method = strtolower(self::$router->getMethodPrefix() . self::$router->getAction());

			// Вызов метода контроллера
			$controller_object = new $controller_class();

			if (method_exists($controller_object, $controller_method))
			{
				$result = $controller_object->$controller_method();
			}
			else
			{
				throw new Exception('Метод ' . $controller_method . ' класса ' . $controller_class . ' не существует');
			}

		}

	}