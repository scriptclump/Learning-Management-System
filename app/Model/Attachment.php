<?php
App::uses('AppModel', 'Model');
/**
 * Attachment Model
 *
 * @property Course $Course
 * @property Section $Section
 * @property Lecture $Lecture
 */
class Attachment extends AppModel {

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
		'Course' => array(
			'className' => 'Course',
			'foreignKey' => 'course_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Section' => array(
			'className' => 'Section',
			'foreignKey' => 'section_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Lecture' => array(
			'className' => 'Lecture',
			'foreignKey' => 'lecture_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
