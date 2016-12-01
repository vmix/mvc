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

			Lang::load(self::$router->getLanguage());

			$controller_class  = ucfirst(self::$router->getController()) . 'Controller';
			$controller_method = strtolower(self::$router->getMethodPrefix() . self::$router->getAction());

			// Вызов метода контроллера
			$controller_object = new $controller_class();

			if (method_exists($controller_object, $controller_method))
			{
				$view_path = $controller_object->$controller_method();
				$view_object = new View($controller_object->getData(), $view_path);
				$content = $view_object->render();
			}
			else
			{
				throw new Exception('Метод ' . $controller_method . ' класса ' . $controller_class . ' не существует');
			}
			$layout = self::$router->getRoute();
			$layout_path = VIEWS_PATH . DS . $layout . '.html';
			$layout_view_object = new View(compact('content'), $layout_path);

			echo $layout_view_object->render();

		}

	}