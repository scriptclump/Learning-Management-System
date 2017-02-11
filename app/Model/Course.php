<?php
App::uses('AppModel', 'Model');
/**
 * Course Model
 *
 * @property User $User
 * @property Attachment $Attachment
 * @property Lecture $Lecture
 * @property Section $Section
 * @property Category $Category
 * @property Tag $Tag
 */
class Course extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'title';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'User' => array(
			'className'  => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields'     => '',
			'order'      => ''
		)
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Attachment' => array(
			'className'    => 'Attachment',
			'foreignKey'   => 'course_id',
			'dependent'    => false,
			'conditions'   => '',
			'fields'       => '',
			'order'        => '',
			'limit'        => '',
			'offset'       => '',
			'exclusive'    => '',
			'finderQuery'  => '',
			'counterQuery' => ''
		),
		'Lecture' => array(
			'className'    => 'Lecture',
			'foreignKey'   => 'course_id',
			'dependent'    => false,
			'conditions'   => '',
			'fields'       => '',
			'order'        => '',
			'limit'        => '',
			'offset'       => '',
			'exclusive'    => '',
			'finderQuery'  => '',
			'counterQuery' => ''
		),
		'Section' => array(
			'className'    => 'Section',
			'foreignKey'   => 'course_id',
			'dependent'    => false,
			'conditions'   => '',
			'fields'       => '',
			'order'        => '',
			'limit'        => '',
			'offset'       => '',
			'exclusive'    => '',
			'finderQuery'  => '',
			'counterQuery' => ''
		)
	);


/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'Category' => array(
			'className'             => 'Category',
			'joinTable'             => 'categories_courses',
			'foreignKey'            => 'course_id',
			'associationForeignKey' => 'category_id',
			'unique'                => 'keepExisting',
			'conditions'            => '',
			'fields'                => '',
			'order'                 => '',
			'limit'                 => '',
			'offset'                => '',
			'finderQuery'           => '',
		),
		'Tag' => array(
			'className'             => 'Tag',
			'joinTable'             => 'courses_tags',
			'foreignKey'            => 'course_id',
			'associationForeignKey' => 'tag_id',
			'unique'                => 'keepExisting',
			'conditions'            => '',
			'fields'                => '',
			'order'                 => '',
			'limit'                 => '',
			'offset'                => '',
			'finderQuery'           => '',
		)
	);

}
