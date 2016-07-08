<?php

class View {

	function renderTMP($content, $template = 'wrap', $data = null) {
		include 'app/views/' . $template . '.tpl.php';
	}
	
	function renderJson($data = null) {
		echo json_encode($data);
	}

}
