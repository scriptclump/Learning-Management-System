<?php
App::uses('AppModel', 'Model');
/**
 * Cmspage Model
 *
 */
class Cmspage extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'cmspages';

	public $actsAs = array(
				'Tree',
				'Sluggable.Sluggable' => array(
					'field' => 'title',
					'saveField' => 'slug',
					'override' => false,
					'separator' => '-',
					'length' => 100,
					'translation' => 'utf-8'
				),
				'Search.Searchable'
	);

	public $belongsTo = array(
		'ParentCmspage' => array(
			'className' => 'Cmspage',
			'foreignKey' => 'parent_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	public $hasMany = array(
		'ChildCmspage' => array(
			'className' => 'Cmspage',
			'foreignKey' => 'parent_id',
			'dependent' => false
		)
	);

////////////////////////////////////////////////////////////
	public $filterArgs = array(
        'title' => array(
            'type' => 'like',
            'field' => 'title'
        ),
        'status' => array(
            'type' => 'value',
            'field' => 'status'
        )

    );
}
