<?php
App::uses('AppModel', 'Model');
/**
 * SentNewsletter Model
 *
 * @property NewsletterSubscriber $NewsletterSubscriber
 * @property Newsletter $Newsletter
 */
class SentNewsletter extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'id';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'NewsletterSubscriber' => array(
			'className' => 'NewsletterSubscriber',
			'foreignKey' => 'newsletter_subscriber_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Newsletter' => array(
			'className' => 'Newsletter',
			'foreignKey' => 'newsletter_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
