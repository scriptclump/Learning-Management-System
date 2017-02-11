<?php
App::uses('AppModel', 'Model');
App::uses('AuthComponent', 'Controller/Component');
/**
 * User Model
 *
 * @property Group $Group
 * @property Communication $Communication
 * @property Post $Post
 * @property UserDetail $UserDetail
 */
class User extends AppModel {

	public $displayField = 'username';
	public $actsAs = array(
		'Acl' => array('type' => 'requester'),
		'Captcha' => array(
            'field' => array('security_code'),
            'error' => 'Incorrect captcha code value'
        )
    );

    public function parentNode() {
        if (!$this->id && empty($this->data)) {
            return null;
        }
        if (isset($this->data['User']['group_id'])) {
            $groupId = $this->data['User']['group_id'];
        } else {
            $groupId = $this->field('group_id');
        }
        if (!$groupId) {
            return null;
        } else {
            return array('Group' => array('id' => $groupId));
        }
    }

    public function bindNode($user) {
	    return array('model' => 'Group', 'foreign_key' => $user['User']['group_id']);
	}

	public function beforeSave($options = array()) {
		$password = @$this->data['User']['password'];
        if( $password != "" && isset($password) ){
	        $this->data['User']['password'] = AuthComponent::password(
	          $password
	        );
        }
        return true;
    }

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		// 'username' => array(
		// 	'notEmpty' => array(
		// 		'rule' => array('isUnique'),
		// 		'message' => 'This username is already taken!',
		// 		'allowEmpty' => false,
		// 		'required' => true,
		// 		'last' => false, // Stop validation after this rule
		// 		'on' => 'create', // Limit validation to 'create' or 'update' operations
		// 	)
		// ),
		'email' => array(
			'notEmpty' => array(
				'rule' => array('isUnique'),
				'message' => 'This email address is already registered with us!',
				'allowEmpty' => false,
				'required' => true,
				'last' => false, // Stop validation after this rule
				'on' => 'create', // Limit validation to 'create' or 'update' operations
			)
		),
		// 'password' => array(
		// 	'alphaNumeric' => array(
  //               'rule' => 'alphaNumeric',
  //               'required' => true,
  //               'message' => 'Letters and numbers only'
  //           ),
  //           'between' => array(
  //               'rule' => array('between', 4, 10),
  //               'message' => 'Between 4 to 10 characters'
  //           )
		// ),
		'group_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			)
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Group' => array(
			'className'  => 'Group',
			'foreignKey' => 'group_id',
			'conditions' => '',
			'order'      => ''
		)
	);

/**
 * hasOne associations
 *
 * @var array
 */
	public $hasOne = array(
		'Profile' => array(
			'className'    => 'Profile',
			'foreignKey'   => 'user_id',
			'dependent'    => true,
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
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		
	);

}
