<?php

class UsersController extends AppController {
	var $name = 'Users';
	var $helpers = array('Html', 'Form');


	function index() {
		$this->redirect('login');
	}

	function login() {
		if(!empty($this->data)) {
			if( ($user = $this->User->check_login($this->data)) ) {
				$this->Session->write('User', $user);
				$this->Session->setFlash(__('Your have successfully logged in.'));
				$this->redirect("/admin/books/");
			} else {
				$this->Session->setFlash(__('Invalid Username or Password.'));
			}
		}
	}

	function admin_logout(){
		if($this->Session->check('User')){
			$this->Session->delete('User');
			$this->Session->setFlash(__('You have logged out'));
			$this->redirect("/admin/books/");
		}
	}
}
?>
