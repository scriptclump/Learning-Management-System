<?php
App::uses('AppModel', 'Model');

class ContactUs extends AppModel{

	var $useTable = false;

	public $actsAs = array(
        'Captcha' => array(
            'field' => array('security_code'),
            'error' => 'Incorrect captcha code value'
        )
    );

	public $validate = array(
	    'fname' => array(
	        'rule' => 'notEmpty',
	        'required' => true,
	        'allowEmpty' => false,
	        'message' => 'Por favor ingrese su nombre'
	    ),
	    'lname' => array(
	        'rule' => 'notEmpty',
	        'required' => true,
	        'allowEmpty' => false,
	        'message' => 'Por favor, introduzca su apellido'
	    ),
	    'email' => array(
	    	'rule' => 'email',
	        'required' => true,
	        'allowEmpty' => false,
	        'message' => 'Por favor , introduce una dirección de correo electrónico válida'
	    ),
	    'phone' => array(
	        'rule' => 'notEmpty',
	        'required' => true,
	        'allowEmpty' => false,
	        'message' => 'Por favor, introduzca su número de teléfono'
	    ),
	    'enquiry' => array(
	        'rule' => 'notEmpty',
	        'required' => true,
	        'allowEmpty' => false,
	        'message' => 'Por favor escriba su consulta'
	    ),
    );
}