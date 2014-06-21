<?php
/**
 * AuthorFixture
 *
 */
class AuthorFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 128, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'email' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 128, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'homepage' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 256, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => '1',
			'name' => 'shapan rahman',
			'email' => 'sp@gmail.com',
			'homepage' => 'sp.com'
		),
		array(
			'id' => '2',
			'name' => 'kamrun nahar',
			'email' => 'nahar@gmail.com',
			'homepage' => 'nahar.com'
		),
		array(
			'id' => '5',
			'name' => 'amin',
			'email' => '',
			'homepage' => ''
		),
		array(
			'id' => '6',
			'name' => 'ripu',
			'email' => '',
			'homepage' => ''
		),
	);

}
