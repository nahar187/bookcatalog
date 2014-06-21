<?php
/**
 * BookFixture
 *
 */
class BookFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 45, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'isbn' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 45, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'image' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 128, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'created' => array('type' => 'timestamp', 'null' => true, 'default' => null),
		'modified' => array('type' => 'timestamp', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
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
			'id' => '6',
			'name' => 'test book1',
			'isbn' => 'test isbn',
			'image' => 'uploads/act_of_treason.jpg',
			'created' => '2014-06-20 17:10:22',
			'modified' => '2014-06-20 17:10:22'
		),
		array(
			'id' => '7',
			'name' => 'test book 2',
			'isbn' => 'isbn2',
			'image' => 'uploads/dark_celebration.jpg',
			'created' => '2014-06-20 17:11:18',
			'modified' => '2014-06-20 17:11:18'
		),
		array(
			'id' => '8',
			'name' => 'kii',
			'isbn' => 'kii',
			'image' => 'uploads/dark_celebration.jpg',
			'created' => '2014-06-20 17:11:38',
			'modified' => '2014-06-20 17:11:38'
		),
		array(
			'id' => '9',
			'name' => 'tab book',
			'isbn' => 'lkkkll',
			'image' => 'uploads/freakonomics.jpg',
			'created' => '2014-06-20 17:12:11',
			'modified' => '2014-06-20 17:12:11'
		),
		array(
			'id' => '10',
			'name' => 'book of politics',
			'isbn' => 'isbn pll',
			'image' => 'uploads/good_to_great.jpg',
			'created' => '2014-06-20 17:12:42',
			'modified' => '2014-06-20 17:12:42'
		),
	);

}
