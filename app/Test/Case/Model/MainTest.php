<?php
App::uses('Main', 'Model');

/**
 * Main Test Case
 *
 */
class MainTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.main',
		'app.item'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Main = ClassRegistry::init('Main');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Main);

		parent::tearDown();
	}

}
