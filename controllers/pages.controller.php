<?php

	class PagesController extends Controller
	{

		public function index()
		{
			echo "Сюда будет выводиться список страниц";
		}

		public function view()
		{

			$params = App::getRouter()->getParams();
			if (isset($params[0]))
			{
				$alias = strtolower($params[0]);

				echo "Для проверки: сюда будет выведена страница с алиасом " . $alias;

			}

		}

	}