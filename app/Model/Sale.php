<?php
App::uses('AppModel', 'Model');
/**
 * Sale Model
 *
 * @property User $User
 * @property Category $Category
 * @property Item $Item
 */
class Sale extends AppModel {

/**
 * Display field
 *
 * @var string
 */
public $displayField = array('item_id', 'sold_price');

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
//		'id' => array(
//			'blank' => array(
//				'rule' => array('blank'),
//				//'message' => 'Your custom message here',
//				//'allowEmpty' => false,
//				//'required' => false,
//				//'last' => false, // Stop validation after this rule
//				//'on' => 'create', // Limit validation to 'create' or 'update' operations
//			),
//		),
//		'item_id' => array(
//			'blank' => array(
//				'rule' => array('blank'),
//				//'message' => 'Your custom message here',
//				//'allowEmpty' => false,
//				//'required' => false,
//				//'last' => false, // Stop validation after this rule
//				//'on' => 'create', // Limit validation to 'create' or 'update' operations
//			),
//		),
//		'price' => array(
//			'notEmpty' => array(
//				'rule' => array('notEmpty'),
//				//'message' => 'Your custom message here',
//				//'allowEmpty' => false,
//				//'required' => false,
//				//'last' => false, // Stop validation after this rule
//				//'on' => 'create', // Limit validation to 'create' or 'update' operations
//			),
//		),
		'sold_price' => array(
			'rule' => array('naturalNumber', true),
                'message' => 'Please supply positive sold price.'
		),
		'date' => array(
			'datetime' => array(
				'rule' => array('datetime'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
                    'quantity' => array(
			'rule' => array('naturalNumber', true),
                        'message' => 'Please supply positive quantity.'
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
//		'Category' => array(
//			'className' => 'Category',
//			'foreignKey' => 'category_id',
//			'conditions' => '',
//			'fields' => '',
//			'order' => ''
//		),
		'Item' => array(
			'className' => 'Item',
			'foreignKey' => 'item_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
        //public $belongsTo=array('User','Item');
}
