<?php

/*
  Класс-маршрутизатор для определения запрашиваемой страницы.
  > цепляет классы контроллеров и моделей;
  > создает экземпляры контролеров страниц и вызывает действия этих контроллеров.
 */

class Route {

	static function start() {
		// контроллер и действие по умолчанию
		$controller_name = 'Main';
		$action_name = 'index';

		$routes = explode('/', $_SERVER['REQUEST_URI']);

		// получаем имя контроллера
		if (!empty($routes[1]) && !is_numeric($routes[1])) {
			$controller_name = $routes[1];
			unset($routes[1]);
		}

		// получаем имя экшена
		if (!empty($routes[2]) && !is_numeric($routes[2])) {
			$action_name = $routes[2];
			unset($routes[2]);
		}

		$model_name = $controller_name;

		// подцепляем файл с классом модели (файла модели может и не быть)
		$model_file = strtolower($model_name) . '.php';
		$model_path = "app/models/" . $model_file;
		if (file_exists($model_path)) {
			include "app/models/" . $model_file;
		}

		$action_name = 'action_' . $action_name;

		// подцепляем файл с классом контроллера
		$controller_file = strtolower($controller_name) . '.php';
		$controller_path = "app/controllers/" . $controller_file;
		if (file_exists($controller_path)) {
			include "app/controllers/" . $controller_file;
		} else {
			/*
			  правильно было бы кинуть здесь исключение,
			  но для упрощения сразу сделаем редирект на страницу 404
			 */
			Route::ErrorPage404();
		}

		$controller_name = 'Controller_' . $controller_name;

		// создаем контроллер
		$controller = new $controller_name;
		$action = $action_name;

		if (method_exists($controller, $action)) {
			// вызываем действие контроллера
			$controller->$action($params = array_values(array_diff($routes, array(''))));
		} else {
			// здесь также разумнее было бы кинуть исключение
			Route::ErrorPage404();
		}
	}

	function ErrorPage404() {
		$host = 'http://' . $_SERVER['HTTP_HOST'] . '/';
		header('HTTP/1.1 404 Not Found');
		header("Status: 404 Not Found");
		header('Location:' . $host . 'notfound');
		die();
	}

	function RedirectTo($url) {
		$host = 'http://' . $_SERVER['HTTP_HOST'] . '/';
		header('Location:' . $host . $url);
		die();
	}

}
