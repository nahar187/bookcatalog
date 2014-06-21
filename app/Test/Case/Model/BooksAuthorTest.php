<?php
App::uses('BooksAuthor', 'Model');

/**
 * BooksAuthor Test Case
 *
 */
class BooksAuthorTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.books_author'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->BooksAuthor = ClassRegistry::init('BooksAuthor');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->BooksAuthor);

		parent::tearDown();
	}

}
