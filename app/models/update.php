<?php

class Model_Update extends Model {

	public function update($id, $content) {
		return $this->db->update('code', $content, array("id[=]" => $id));
	}

	public function add($content) {
		return $this->db->insert('code', $content);
	}
	
	public function get($id) {
		$code = $this->db->select('code', array('id', 'code', 'type'), array("id[=]" => $id));
		
		if($code){
			return $code[0];
		}
		
		return false;
	}

}
