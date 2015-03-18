<?php
/**
 * MainFixture
 *
 */
class MainFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'main';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'main_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => false, 'key' => 'primary'),
		'main_name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 50, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'main_id', 'unique' => 1)
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
			'main_id' => 1,
			'main_name' => 'Lorem ipsum dolor sit amet'
		),
	);

}
