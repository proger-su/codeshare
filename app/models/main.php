<?php

class Model_Main extends Model {

	public function get($id) {
		$code = $this->db->select('code', array('id', 'code', 'type'), array("id[=]" => $id));

		if ($code) {
			return $code[0];
		}

		return false;
	}

}
