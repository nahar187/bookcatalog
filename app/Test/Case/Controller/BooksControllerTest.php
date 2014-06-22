<?php
App::uses('BooksController', 'Controller');

/**
* BooksController Test Case
*
*/
class BooksControllerTest extends ControllerTestCase {

	/**
	* Fixtures
	*
	* @var array
	*/
	public $fixtures = array(
		'app.book',
		'app.type',
		'app.books_type',
		'app.author',
		'app.books_author'
	);

	/**
	* testIndex method
	*
	* @return void
	*/
	public function testIndex() {
		$this->testAction('/books/index', array('method' => 'get'));
		$this->assertNotNull($this->vars['books']);
		$this->assertNotNull($this->vars['types']);
	}

	/**
	* testAdminIndex method
	*
	* @return void
	*/
	public function testAdminIndex() {
		$this->testAction('/books/index', array('method' => 'get'));
		$this->assertNotNull($this->vars['books']);
		$this->assertNotNull($this->vars['types']);
	}

	/**
	* testView method
	*
	* @return void
	*/
	public function testView() {
		$this->testAction('/books/index', array('method' => 'get'));
		$id = $this->vars['books'][0]['Book']['id'];
		$this->testAction('/books/view/'.$id, array('method' => 'get'));
		$this->assertEquals($id, $this->vars['book']['Book']['id']);
	}

	/**
	* testAdminView method
	*
	* @return void
	*/
	public function testAdminView() {
		$this->testAction('/admin/books/index', array('method' => 'get'));
		$id = $this->vars['books'][0]['Book']['id'];
		$this->testAction('/admin/books/view/'.$id, array('method' => 'get'));
		$this->assertEquals($id, $this->vars['book']['Book']['id']);
	}

	/**
	* testAdminAdd method
	*
	* @return void
	*/
	public function testAdminAddWithoutLogin() {
		$data = array(
			'Book' => array(
				'name' => 'test book1',
				'isbn' => 'test isbn',
				'image' => 'act_of_treason.jpg',
				'created' => '2014-06-20 17:10:22',
				'modified' => '2014-06-20 17:10:22'
			),
			'Author' => array('authors'=>array())
		);
		$this->testAction('/admin/books/add', array('data' => $data, 'method' => 'post'));
		$redirected_url = $this->headers['Location'];
		$index_url = '/users/login';
		$endsWithUrl = (strpos($redirected_url, $index_url, strlen($redirected_url) - strlen($index_url)) !== false);
		$this->assertTrue($endsWithUrl);
	}

	public function testAdminAddAfterLogin() {
		// mock session
		$Books = $this->generate('Books', array(
			'components' => array(
				'Session'
			)
		));
		$Books->Session
		->expects($this->once())
		->method('read')
		->will($this->returnValue(array('username','a')));

		$data = array(
			'Book' => array(
				'name' => 'test book1',
				'isbn' => 'test isbn',
				'image' => 'act_of_treason.jpg',
				'created' => '2014-06-20 17:10:22',
				'modified' => '2014-06-20 17:10:22'
			),
			'Author' => array('authors'=>array())
		);
		$this->testAction('/admin/books/add', array('data' => $data, 'method' => 'post'));

		$this->assertNotNull($this->vars['types']);
	}

	/**
	* testAdminEdit method
	*
	* @return void
	*/
	public function testAdminEditAfterLogin() {
		// mock session
		$Books = $this->generate('Books', array(
			'components' => array(
				'Session'
			)
		));
		$Books->Session
		->expects($this->once())
		->method('read')
		->will($this->returnValue(array('username','a')));
		$this->testAction('/admin/books/index', array('method' => 'get'));
		$id = $this->vars['books'][0]['Book']['id'];
		$data = array(
			'Book' => array(),
			'Type' => array(),
			'Author' => array()
		);
		$this->testAction('/admin/books/edit/'.$id, array('data' => $data, 'method' => 'post'));
		$this->assertNotNull($this->vars['types']);
	}

	/**
	* testAdminDelete method
	*
	* @return void
	*/
	public function testAdminDeleteAfterLogin() {
		// mock session
		$Books = $this->generate('Books', array(
			'components' => array(
				'Session'
			)
		));
		$Books->Session
		->expects($this->once())
		->method('read')
		->will($this->returnValue(array('username','a')));
		
		$this->testAction('/admin/books/index', array('method' => 'get'));
		$id = $this->vars['books'][0]['Book']['id'];
		$this->testAction('/admin/books/delete/'.$id, array('method' => 'post'));
		$this->assertContains('/admin/books', $this->headers['Location']);
	}

}
