<?php
App::uses('UsersController', 'Controller');

/**
* UsersController Test Case
*
*/
class UsersControllerTest extends ControllerTestCase {

	/**
	* Fixtures
	*
	* @var array
	*/
	public $fixtures = array(
		'app.admin'
	);

	/**
	* testIndex method
	*
	* @return void
	*/
	public function testIndex() {
	}

	/**
	* testLogin method
	*
	* @return void
	*/
	public function testLogin() {
		$data = array('User' => array('username' => 'a','password' => 'a'));
		$result = $this->testAction('/users/login', array('data' => $data, 'method' => 'post'));
		$redirected_url = $this->headers['Location'];
		debug($redirected_url );
		$index_url = '/admin/books/';
		$endsWith = (strpos($redirected_url, $index_url, strlen($redirected_url) - strlen($index_url)) !== false);
		$this->assertTrue($endsWith);
	}

}
