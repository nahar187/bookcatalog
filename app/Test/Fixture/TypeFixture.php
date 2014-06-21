<?php
/**
 * TypeFixture
 *
 */
class TypeFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 45, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
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
			'id' => '1',
			'name' => 'Music',
			'created' => '2013-02-06 17:27:44',
			'modified' => '2013-02-06 17:27:44'
		),
		array(
			'id' => '2',
			'name' => 'Economy',
			'created' => '2013-02-06 17:27:44',
			'modified' => '2013-02-06 17:27:44'
		),
		array(
			'id' => '3',
			'name' => 'Politics',
			'created' => '2013-02-06 17:27:59',
			'modified' => '2013-02-06 17:27:59'
		),
		array(
			'id' => '4',
			'name' => 'World',
			'created' => '2013-02-06 17:27:59',
			'modified' => '2013-02-06 17:27:59'
		),
	);

}
