<?php
App::uses('AttachmentsController', 'Controller');

/**
 * AttachmentsController Test Case
 *
 */
class AttachmentsControllerTest extends ControllerTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.attachment',
		'app.course',
		'app.user',
		'app.group',
		'app.profile',
		'app.lecture',
		'app.section',
		'app.category',
		'app.categories_course',
		'app.tag',
		'app.courses_tag'
	);

}
