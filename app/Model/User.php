<?php


class User extends AppModel {
	var $name = 'User';
	var $useTable = 'admins';


	function check_login($data) {
		$valid = false;
		$user = $this->find('first', array(
			'conditions' => array(
				'User.username'=>$data['User']['username']
			)
		));

		if($user['User']['password'] == $data['User']['password']) {
			$valid = $user;
		}
		return $valid;
	}
}

?>
