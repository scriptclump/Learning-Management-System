<?php
App::uses('AppModel', 'Model');
/**
 * NewsletterSubscriber Model
 *
 * @property SentNewsletter $SentNewsletter
 */
class NewsletterSubscriber extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';
	public $actsAs = array(
			'Search.Searchable'
	);


	public $validate = array(
	    'name' => array(
	        'rule' => 'notEmpty',
	        'required' => true,
	        'allowEmpty' => false,
	        'message' => 'Your Error Message'
	    ),
	    'email' => array(
	        'rule' => 'isUnique',
	        'required' => true,
	        'allowEmpty' => false,
	        'on' => 'create', // validation work only on add.
	        'last' => false,
	        'message' => 'This email has already been used.'
	    )
    );

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'SentNewsletter' => array(
			'className' => 'SentNewsletter',
			'foreignKey' => 'newsletter_subscriber_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

	public $filterArgs = array(
        'name' => array(
            'type' => 'like',
            'field' => 'name'
        ),
        'email' => array(
            'type' => 'like',
            'field' => 'email'
        ),
        'status' => array(
            'type' => 'value',
            'field' => 'status'
        )
    );
}
