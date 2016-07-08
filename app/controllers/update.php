<?php

class Controller_Update extends Controller {

	function __construct() {
		$this->model = new Model_Update();
	}

	function action_index($params) {

		if (!isset($_POST['code']) || !isset($_POST['type'])) {
			Route::ErrorPage404();
		}

		$content = array(
			'code' => $_POST['code'],
			'type' => $_POST['type'],
		);

		if (isset($params[0])) {
			$code = $this->model->get($params[0]);
			if (!$code) {
				Route::ErrorPage404();
			}

			$this->model->update($code['id'], $content);

			Route::RedirectTo($code['id']);
		}

		$id = $this->model->add($content);
		Route::RedirectTo($id);
	}

}
