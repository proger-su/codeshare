<?php

class Controller_Main extends Controller {

	function __construct() {
		$this->model = new Model_Main();
		$this->view = new View();
	}

	function action_index($params) {
		$data = array(
			'id' => '',
			'type' => '',
			'code' => ''
		);
		
		if ($params) {
			$data = $this->model->get($params[0]);
			if (!$data) {
				Route::ErrorPage404();
			}
		}
		
		$data['types'] = array(
			'ace/mode/php' => 'PHP',
			'ace/mode/javascript' => 'JS',
			'ace/mode/css' => 'CSS'
		);
		
		$this->view->renderTMP('main', 'wrap', $data);
	}

}
