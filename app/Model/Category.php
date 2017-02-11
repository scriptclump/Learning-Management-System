<?php
App::uses('AppModel', 'Model');
/**
 * Post Model
 *
 */
class Category extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	//public $useTable = 'categories';


	/**
	 * Display field
	 *
	 * @var string
	 */
	public $displayField = 'title';
	
	public $actsAs = array(
				'Tree',
				'Containable',
				'Sluggable.Sluggable' => array(
					'field'       => 'title',
					'saveField'   => 'slug',
					'override'    => false,
					'separator'   => '-',
					'length'      => 100,
					'translation' => 'utf-8'
				),
				'Search.Searchable'
	);

	public $belongsTo = array(
		'ParentCategory' => array(
			'className'  => 'Category',
			'foreignKey' => 'parent_id',
			'conditions' => '',
			'fields'     => '',
			'order'      => ''
		)
	);

	public $hasMany = array(
		'ChildCategory' => array(
			'className'  => 'Category',
			'foreignKey' => 'parent_id',
			'dependent'  => false
		)//,
		// 'CategoriesBusiness' => array(
		// 	'className' => 'CategoriesBusiness',
		// 	'foreignKey' => 'business_id',
		// 	'dependent' => false,
		// 	'conditions' => '',
		// 	'fields' => '',
		// 	'order' => '',
		// 	'limit' => '',
		// 	'offset' => '',
		// 	'exclusive' => '',
		// 	'finderQuery' => '',
		// 	'counterQuery' => ''
		// )
	);

	/**
	 * hasAndBelongsToMany associations
	 *
	 * @var array
	 */
    public $hasAndBelongsToMany = array(
		'Course' => array(
			'className' => 'Course',
			'joinTable' => 'categories_courses',
			'foreignKey' => 'category_id',
			'associationForeignKey' => 'course_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		)
	);


////////////////////////////////////////////////////////////
	public $filterArgs = array(
        'title' => array(
			'type'  => 'like',
			'field' => 'title'
        ),
        'status' => array(
			'type'  => 'value',
			'field' => 'status'
        )

    );
}
