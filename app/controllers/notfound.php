<?php

class Controller_Notfound extends Controller
{
	
	function action_index()
	{
		$this->view->renderTMP('notfound', 'wrap');
	}

}
