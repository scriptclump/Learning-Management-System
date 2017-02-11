<?php
App::uses('AppModel', 'Model');
/**
 * Newsletter Model
 *
 */
class Newsletter extends AppModel {

	public $actsAs = array(
			'Search.Searchable'
	);

	public $filterArgs = array(
        'subject' => array(
            'type' => 'like',
            'field' => 'subject'
        ),
        'status' => array(
            'type' => 'value',
            'field' => 'status'
        )

    );
}
