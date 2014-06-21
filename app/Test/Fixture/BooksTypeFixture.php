<?php
/**
 * BooksTypeFixture
 *
 */
class BooksTypeFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'book_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'type_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'indexes' => array(
			'PRIMARY' => array('column' => array('book_id', 'type_id'), 'unique' => 1),
			'fk_books_has_types_type1' => array('column' => 'type_id', 'unique' => 0),
			'fk_books_has_types_books' => array('column' => 'book_id', 'unique' => 0)
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
			'book_id' => '6',
			'type_id' => '1'
		),
		array(
			'book_id' => '7',
			'type_id' => '1'
		),
		array(
			'book_id' => '8',
			'type_id' => '1'
		),
		array(
			'book_id' => '25',
			'type_id' => '1'
		),
		array(
			'book_id' => '26',
			'type_id' => '1'
		),
	);

}
