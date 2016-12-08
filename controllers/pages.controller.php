<?php

	class PagesController extends Controller
	{

		public function __construct($data = [])
		{
			parent::__construct($data);
			$this->model = new Page();
		}

		public function index()
		{
			$this->data['pages'] = $this->model->getList();
		}

		public function view()
		{

			$params = App::getRouter()->getParams();
			if (isset($params[0]))
			{
				$alias = strtolower($params[0]);

				$this->data['page'] = $this->model->getByAlias($alias);

			}

		}

		public function admin_index()
		{
			$this->data['pages'] = $this->model->getList();
		}

		public function admin_edit() {

			if($_POST) {
				$id = isset($_POST['id']) ? $_POST['id'] : null; // определение id страницы

				$result = $this->model->save($_POST, $id); // здесь необходимо еще и учитывать id
				if($result) {
					Session::setFlash('Страница была отредактирована!');
				} else {
					Session::setFlash('Ошибка! ');
				}
				Router::redirect('/admin/pages/');
			}

			if (isset($this->params[0])) {
				$this->data['page'] = $this->model->getById($this->params[0]);
			} else {
				Session::setFlash('Неверный id страницы');
				Router::redirect('/admin/pages/');
			}
		}

		public function admin_add() {
			// Проверка того, что передается в POST запросе без записи в БД
			if($_POST) {
//				echo "<pre>";
//				print_r($_POST);
//				die();
				$result = $this->model->save($_POST);
				if($result) {
					Session::setFlash('Страница была сохранена!');
				} else {
					Session::setFlash('Ошибка! ');
				}
				Router::redirect('/admin/pages/');
			}
		}

		public function admin_delete()
		{
			if(isset($this->params[0])) {
				$result = $this->model->delete($this->params[0]);

				if($result) {
					Session::setFlash('Страница была удалена!');
				} else {
					Session::setFlash('Ошибка! ');
				}
			}
			Router::redirect('/admin/pages/');
		}

	}