<?php
App::uses('BooksType', 'Model');

/**
 * BooksType Test Case
 *
 */
class BooksTypeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.books_type'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->BooksType = ClassRegistry::init('BooksType');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->BooksType);

		parent::tearDown();
	}

}
