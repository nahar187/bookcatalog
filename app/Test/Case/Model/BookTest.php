<?php
App::uses('Book', 'Model');

/**
* Book Test Case
*
*/
class BookTest extends CakeTestCase {

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
	* setUp method
	*
	* @return void
	*/
	public function setUp() {
		parent::setUp();
		$this->Book = ClassRegistry::init('Book');
	}

	/**
	* tearDown method
	*
	* @return void
	*/
	public function tearDown() {
		unset($this->Book);

		parent::tearDown();
	}

	public function testSaveWithEmptyName() {
		$result = $this->Book->Save(array('name' =>'','isbn' => 'First Article'));
		$this->assertFalse($result);

	}
	public function testSaveWithValidName() {
		$result = $this->Book->Save(array('name' =>'test','isbn' => 'First Article'));
		$this->assertFalse($result);

	}
	public function testSaveWithEmptyIsbn() {
		$result = $this->Book->Save(array('name' =>'test','isbn' => ''));
		$this->assertFalse($result);

	}
	public function testSaveWithValidIsbn() {
		$result = $this->Book->Save(array('name' =>'test','isbn' => 'First Article'));
		$this->assertFalse($result);

	}

	public function testSaveWithUnsupportedMimeType() {
		$result = $this->Book->Save(array('name' =>'test','isbn' => 'First','image'=>'/test/my-file.txt'));
		$this->assertFalse($result);

	}
	public function testSaveWithValidMimeType() {
		$result = $this->Book->Save(array('name' =>'test','isbn' => 'First','image'=>'/test/my-file.jpg'));
		$this->assertFalse($result);
	}

}
