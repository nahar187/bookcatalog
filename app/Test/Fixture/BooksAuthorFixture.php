<?php
/**
 * BooksAuthorFixture
 *
 */
class BooksAuthorFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'book_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'author_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'indexes' => array(
			'PRIMARY' => array('column' => array('book_id', 'author_id'), 'unique' => 1),
			'fk_books_has_authors_author1' => array('column' => 'author_id', 'unique' => 0),
			'fk_books_has_authors_books' => array('column' => 'book_id', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'book_id' => '26',
			'author_id' => '5'
		),
		array(
			'book_id' => '26',
			'author_id' => '6'
		),
		array(
			'book_id' => '27',
			'author_id' => '7'
		),
		array(
			'book_id' => '28',
			'author_id' => '8'
		),
		array(
			'book_id' => '28',
			'author_id' => '9'
		),
	);

}
