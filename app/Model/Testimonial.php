<?php
App::uses('AppModel', 'Model');
/**
 * Testimonial Model
 *
 */
class Testimonial extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'body';
	public $actsAs = array(
			'Search.Searchable'
	);

	public $filterArgs = array(
        'body' => array(
            'type' => 'like',
            'field' => 'body'
        ),
        'status' => array(
            'type' => 'value',
            'field' => 'status'
        )

    );


}
