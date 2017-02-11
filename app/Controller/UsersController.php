<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');
/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 */
class UsersController extends AppController {

	/**
	 * Components
	 *
	 * @var array
	 */
	var $helpers = array('Html', 'Form', 'Captcha', 'Js' => array('Jquery'));
	public $components = array('Paginator', 'Search.Prg', 'Captcha' => array('field' => 'security_code', 'mlabel' => ''));//'Captcha'
	var $uses = array('User', 'Profile', 'Department', 'City', 'IcargoAddress');


	public function beforeFilter() {
	    parent::beforeFilter();
	    $this->Security->unlockedActions = array('my_account', 'city_to_departmentAjax', 'admin_city_to_departmentAjax', 'find', 'admin_edit', 'admin_add');
		if( $this->RequestHandler->isPost() && ( ($this->action == 'city_to_departmentAjax') || ($this->action == 'admin_city_to_departmentAjax') || ($this->action == 'admin_bulk_action') ) ){
		    $this->Security->validatePost = false;
		    $this->Security->enabled = false;
		    $this->Security->csrfCheck = false;
		}
	    $this->Auth->allow('index', 'view', 'initDB', 'captcha', 'register', 'login', 'logout', 'admin_logout', 'admin_login', 'city_to_departmentAjax', 'activate', 'forgot', 'reset', 'display');
	}

	/**
	 * index method
	 *
	 * @return void
	 */
	public function admin_index() {
		$this->User->recursive = 0;
		$this->Paginator->settings['conditions'] = array(array('NOT' => array('User.group_id' => array(1, 2, 3))));
		$this->set('users', $this->Paginator->paginate());
	}

	/**
	 * view method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function admin_view($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		$this->set('user', $this->User->find('first', $options));
	}

	public function admin_add() {
		// if ($this->request->is('post')) {
		// 	$this->User->create();
		// 	if ($this->User->save($this->request->data)) {
		// 		$this->Session->setFlash(__('The user has been saved'));
		// 		return $this->redirect(array('action' => 'index'));
		// 	}
		// 	$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
		// }

		if (!empty($this->request->data)) {
            $this->User->set($this->request->data);
            if($this->User->validates())	{
                $this->request->data['Profile']['dob'] = date('Y-m-d', strtotime($this->request->data['Profile']['dob']));
                $this->request->data['User']['activation_key'] = md5(uniqid()); // Adding the activation key
                $this->request->data['User']['group_id'] = '4';
                $this->request->data['User']['status'] = '1';
                if ($this->User->saveAll($this->request->data)) {
	                $this->Session->setFlash('The user has been saved.', 'success');
	            }
            }	else	{ //or
                $this->Session->setFlash('Unable to proceed. Please try again.', 'error');
            }
		}
	}

	public function admin_edit($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}

		if ($this->request->is('post') || $this->request->is('put')) {
			// if ( $_SESSION['Auth']['User']['id'] != $id ) {
			// 	$this->Session->setFlash(__('You are not allowed to change other user settings.'),'error');
			// 	return $this->redirect(array('action' => 'edit/'.$id));
			// }
			// pr($this->request->data);
			// die;
			$user_count = $this->User->find('count', array(
				'conditions' => array('User.username' => $this->request->data['User']['username'],
									  'User.id !=' => $this->request->data['User']['id']
								)
				)
			);
			if ($user_count > 0) {
				$this->Session->setFlash(__('This username is already taken. Please enter another username.'),'error');
				return $this->redirect(array('action' => 'edit/'.$id));
			} else {
				$this->request->data['User']['group_id'] = '4';
				if ($this->User->saveAll($this->request->data)) {
					$this->Session->setFlash(__('Your information has been saved.'));
					return $this->redirect(array('action' => 'edit/'.$id));
				}
				$this->Session->setFlash(__('The user could not be saved. Please, try again.')
				);
			}
		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $options);
			unset($this->request->data['User']['password']);
		}
	}
	/**
	 * delete method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function admin_delete($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->User->delete()) {
			$this->Session->setFlash(__('The user has been deleted.'));
		} else {
			$this->Session->setFlash(__('The user could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	public function admin_login() {
		if ($this->Session->read('Auth.Admin')) {
	        $this->Session->setFlash('You are logged in!');
	        return $this->redirect(array( 'controller' => 'dashboards', 'action' => 'index'));
	    }
	    // Allowing login with username or email and password.
	    $emailUsername = @$this->request->data['User']['username'];
        if (!filter_var($emailUsername, FILTER_VALIDATE_EMAIL)) {
	        $emailFromUsername = $this->User->find('first', array('conditions' => array('User.username' => $emailUsername), 'recursive' => -1, 'fields' => array('email')));
	        //pr($emailFromUsername );
	        if (!empty($emailFromUsername)) {
	        	$emailFromUsernameDB = $emailFromUsername['User']['email'];
	        } else {
	        	$emailFromUsernameDB = '';
	        }
	        $this->request->data['User']['email'] = $emailFromUsernameDB;
	    } else{
	    	$this->request->data['User']['email'] = @$this->request->data['User']['username'];
	    }

	    if ($this->request->is('post')) {
	    	//pr($this->request->data);
	        if ($this->Auth->login()) {
				$this->User->id = $this->Auth->user('id');
				$current        = date("Y-m-d H:i:s");
				$this->User->saveField('last_login',$current);
    			$group_id = $this->Auth->user('group_id');
    			if( $group_id == 1 || $group_id == 2 ){
    				if( $this->Auth->user('status') == "0" ){
    					$this->Session->setFlash(__('Your account is inactive. Kindly, contact to super admin.'), 'error');
    					$this->redirect($this->Auth->logout());
    				} else if( $this->Auth->user('status') == "2" ){
    					$this->Session->setFlash(__('Your account is has been suspended. Kindly, contact to super admin.'), 'error');
    					$this->redirect($this->Auth->logout());
    				} else if( $this->Auth->user('status') == "3" ){
    					$this->Session->setFlash(__('Your account is has been expired. Kindly, contact to super admin.'), 'error');
    					$this->redirect($this->Auth->logout());
    				} else{
    					$this->Session->setFlash(__('Welcome to the administrator panel.'));
    					return $this->redirect($this->Auth->redirect());
    				}
    			} else{
    				$this->Session->setFlash(__('You are not allowed to access the admin panel.'), 'error');
    				$this->redirect($this->Auth->logout());
    			}
	        }else{
	        	$this->Session->setFlash(__('Username or password entered is incorrect. Please try again.'), 'error');
	        }
	    }
	}

	public function admin_logout() {
	    $this->Session->setFlash('Good-Bye');
		$this->redirect($this->Auth->logout());
	}

	public function admin_settings($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ( $_SESSION['Auth']['Admin']['id'] != $id ) {
				$this->Session->setFlash(__('You are not allowed to change other user settings.'),'error');
				return $this->redirect(array('action' => 'settings/'.$id));
			}

			$user_count = $this->User->find('count', array(
				'conditions' => array('User.username' => $this->request->data['User']['username'],
									  'User.id !=' => $this->request->data['User']['id']
								)
				)
			);
			if ($user_count > 0) {
				$this->Session->setFlash(__('This username is already taken. Please enter another username.'),'error');
				return $this->redirect(array('action' => 'settings/'.$id));
			} else {
				if ($this->User->save($this->request->data)) {
					$this->Session->setFlash(__('Your information has been saved.'));
					return $this->redirect(array('action' => 'settings/'.$id));
				}
				$this->Session->setFlash(__('The user could not be saved. Please, try again.')
				);
			}
		} else {
			$this->request->data = $this->User->read(null, $id);
			unset($this->request->data['User']['password']);
		}
		if ( $_SESSION['Auth']['Admin']['id'] != $id ) {
			$this->Session->setFlash(__('You are not allowed to change other user settings.'),'error');
			return $this->redirect(array('action' => 'settings/'.$_SESSION['Auth']['User']['id']));
		}
	}

	/**
	 * bulk action method
	 *
	 * @return void
	 */
	public function admin_bulk_action() {
		$this->request->onlyAllow('post', 'bulk_action');
		if( count($this->request->data['User']['del_item']) > 0 ){
			foreach ($this->request->data['User']['del_item'] as $key => $value) {
				$ids[] = $value;
			}

			if( $this->request->data['User']['do_action'] == "0" ){
				if( $this->User->updateAll( array('User.status'=>0), array('User.id'=>$ids) ) ){
	                $this->Session->setFlash(__('Selected users status has been changed to waiting for activation.', true));
	            }
	        }

	        if( $this->request->data['User']['do_action'] == "1" ){
				if( $this->User->updateAll( array('User.status'=>1), array('User.id'=>$ids) ) ){
	                $this->Session->setFlash(__('Selected users status has been changed to active.', true));
	            }
	        }

	        if( $this->request->data['User']['do_action'] == "2" ){
				if( $this->User->updateAll( array('User.status'=>2), array('User.id'=>$ids) ) ){
	                $this->Session->setFlash(__('Selected users status has been changed to suspended.', true));
	            }
	        }

	        if( $this->request->data['User']['do_action'] == "3" ){
				if( $this->User->updateAll( array('User.status'=>3), array('User.id'=>$ids) ) ){
	                $this->Session->setFlash(__('Selected users status has been changed to expired.', true));
	            }
	        }

	        if( $this->request->data['User']['do_action'] == "delete" ){
				if( count($this->request->data['User']['del_item']) > 0 ){
					foreach ($this->request->data['User']['del_item'] as $key => $value) {
						$this->User->id = $value;
						if (!$this->User->exists()) {
							throw new NotFoundException(__('Invalid user'));
						}
						if ($this->User->delete()) {
							$this->Session->setFlash(__('The user (#id '.$value.') has been deleted.'),'success');
						} else {
							$this->Session->setFlash(__('The user could not be deleted. Please, try again.'),'error');
						}
					}
				} else{
					$this->Session->setFlash(__('Please select at least one item.'),'error');
				}
			}
		} else{
			$this->Session->setFlash(__('Please select at least one item.'),'error');
		}

		if ($this->referer() != '/') {
            return $this->redirect($this->referer());
        }
		return $this->redirect(array('action' => 'index'));
	}

	/**
	 * Activate
	 *
	 * @param string $username
	 * @param string $key
	 * @return void
	 * @access public
	 */
	public function activate($username = null, $key = null) {
		if ($username == null || $key == null) {
			$this->redirect(array('action' => 'login'));
		}

		if ($this->User->hasAny(array(
				'User.username' => $username,
				'User.activation_key' => $key,
				'User.status' => 0,
			))) {
			$user = $this->User->findByUsername($username);
			$this->User->id = $user['User']['id'];
			$this->User->saveField('status', 1);
			$this->User->saveField('activation_key', md5(uniqid()));
			$this->Session->setFlash('Account activated successfully.', 'frontend_success');
		} else {
			$this->Session->setFlash('An error occurred.', 'frontend_error');
		}

		$this->redirect(array('action' => 'login'));
	}

	/**
	 * Forgot
	 *
	 * @return void
	 * @access public
	 */
	public function forgot() {
		$this->set('title_for_layout', __('Forgot Password'));

		if (!empty($this->request->data) && isset($this->request->data['User']['username'])) {
			$user = $this->User->findByUsername($this->request->data['User']['username']);
			if (!isset($user['User']['id'])) {
				$this->Session->setFlash(__('Invalid username.'), 'default', array('class' => 'error'));
				$this->redirect(array('action' => 'login'));
			}

			$this->User->id = $user['User']['id'];
			$activationKey = md5(uniqid());
			$this->User->saveField('activation_key', $activationKey);
			$this->set(compact('user', 'activationKey'));

			$this->Email->from = Configure::read('Site.title') . ' ' .
				'<croogo@' . preg_replace('#^www\.#', '', strtolower($_SERVER['SERVER_NAME'])) . '>';
			$this->Email->to = $user['User']['email'];
			$this->Email->subject = __('[%s] Reset Password', Configure::read('Site.title'));
			$this->Email->template = 'forgot_password';
			if ($this->Email->send()) {
				$this->Session->setFlash(__('An email has been sent with instructions for resetting your password.'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'login'));
			} else {
				$this->Session->setFlash(__('An error occurred. Please try again.'), 'default', array('class' => 'error'));
			}
		}
	}


	/**
	 * Reset
	 *
	 * @param string $username
	 * @param string $key
	 * @return void
	 * @access public
	 */
	public function reset($username = null, $key = null) {
		$this->set('title_for_layout', __('Reset Password'));

		if ($username == null || $key == null) {
			$this->Session->setFlash(__('An error occurred.'), 'default', array('class' => 'error'));
			$this->redirect(array('action' => 'login'));
		}

		$user = $this->User->find('first', array(
			'conditions' => array(
				'User.username' => $username,
				'User.activation_key' => $key,
			),
		));
		if (!isset($user['User']['id'])) {
			$this->Session->setFlash(__('An error occurred.'), 'default', array('class' => 'error'));
			$this->redirect(array('action' => 'login'));
		}

		if (!empty($this->request->data) && isset($this->request->data['User']['password'])) {
			$this->User->id = $user['User']['id'];
			$user['User']['activation_key'] = md5(uniqid());
			$user['User']['password'] = $this->request->data['User']['password'];
			$user['User']['verify_password'] = $this->request->data['User']['verify_password'];
			$options = array('fieldList' => array('password', 'verify_password', 'activation_key'));
			if ($this->User->save($user['User'], $options)) {
				$this->Session->setFlash(__('Your password has been reset successfully.'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'login'));
			} else {
				$this->Session->setFlash(__('An error occurred. Please try again.'), 'default', array('class' => 'error'));
			}
		}

		$this->set(compact('user', 'username', 'key'));
	}

	// public function login() {
	// 	if ($this->Session->read('Auth.User')) {
	//         //$this->Session->setFlash('You are logged in!');
	//         return $this->redirect(array( 'controller' => 'users', 'action' => 'my_account'));
	//     }

	//     if ($this->request->is('post')) {
	//         if ($this->Auth->login()) {
	//             return $this->redirect($this->Auth->redirect());
	//         }
	//         $this->Session->setFlash(__('Your username or password was incorrect.', 'frontend_error'));
	//     }
	// }

	public function login() {
		if ($this->Session->read('Auth.User')) {
	        $this->Session->setFlash('You are logged in!');
	        return $this->redirect(array( 'controller' => 'users', 'action' => 'my_account'));
	    }

	    if ($this->request->is('post')) {
	        if ($this->Auth->login()) {
				$this->User->id = $this->Auth->user('id');
				$current        = date("Y-m-d H:i:s");
				$this->User->saveField('last_login',$current);
    			$group_id = $this->Auth->user('group_id');
    			if( $group_id != 1 && $group_id != 2 ){
    				if( $this->Auth->user('status') == "0" ){
    					$this->Session->setFlash(__('Your account is inactive. Kindly, contact to admin.'), 'frontend_error');
    					$this->redirect($this->Auth->logout());
    				} else if( $this->Auth->user('status') == "2" ){
    					$this->Session->setFlash(__('Your account is has been suspended. Kindly, contact to admin.'), 'frontend_error');
    					$this->redirect($this->Auth->logout());
    				} else if( $this->Auth->user('status') == "3" ){
    					$this->Session->setFlash(__('Your account is has been expired. Kindly, contact to admin.'), 'frontend_error');
    					$this->redirect($this->Auth->logout());
    				} else{
    					return $this->redirect($this->Auth->redirect());
    				}
    			} else{
    				$this->Session->setFlash(__('Please login with your member username, password.'), 'frontend_error');
    				$this->redirect($this->Auth->logout());
    			}
	        }else{
	        	$this->Session->setFlash(__('Email address or password entered is incorrect. Please try again.'), 'frontend_error');
	        }
	    }
	}

	public function logout() {
		$this->Session->setFlash('Good-Bye', 'frontend_success');
		$this->redirect($this->Auth->logout());
	}

	public function my_account() {
		$this->User->id = $this->Auth->user('id');

	    if ($this->request->is('post') || $this->request->is('put')) {
	    	$user_count = $this->User->find('count', array(
				'conditions' => array('User.email' => $this->request->data['User']['email'],
									  'User.id !=' => $this->request->data['User']['id']
								)
				)
			);
			if ($user_count > 0) {
				$this->Session->setFlash(__('This username is already taken. Please enter another username.'),'frontend_error');
				return $this->redirect(array('action' => 'my_account/'));
			} else {
				// pr($this->request->data);
				// debug($this->validationErrors);
				// die;
				if ($this->User->saveAll($this->request->data)) {
					$this->Session->setFlash(__('Your information has been saved.'), 'frontend_success');
					return $this->redirect(array('action' => 'my_account/'));
				} else{
					// var_dump($this->User->invalidFields());
					// return false;
					$this->Session->setFlash(__('Your information could not be saved. Please, try again.'), 'frontend_error');
					return $this->redirect(array('action' => 'my_account/'));
				}
			}
	    } else{
	    	$options = array('conditions' => array('User.' . $this->User->primaryKey => $this->Auth->user('id')));
			$this->request->data = $this->User->find('first', $options);
		    $this->set(compact('user'));
	    }
	}

	function captcha()	{
        $this->autoRender = false;
        $this->layout='ajax';
        if(!isset($this->Captcha))	{ //if you didn't load in the header
            $this->Captcha = $this->Components->load('Captcha'); //load it
        }
        $this->Captcha->create();
    }

	public function register() {
		$this->set('title_for_layout', 'Registration');
		// City Fetch.
		$cities = $this->City->find('list', array(
			'fields'     => array('City.title'),
			'conditions' => array('City.status' => '1')
	    ));
	    $this->set('cities', $cities);

		if (!empty($this->request->data)) {
			$this->User->setCaptcha('security_code', $this->Captcha->getCode('User.security_code')); //getting from component and passing to model to make proper validation check
            $this->User->set($this->request->data);
            if($this->User->validates())	{
                $this->request->data['Profile']['dob'] = date('Y-m-d', strtotime($this->request->data['Profile']['dob']));
                $this->request->data['User']['status'] = '0'; // Default waiting for the approval.
                $this->request->data['User']['activation_key'] = md5(uniqid()); // Adding the activation key
                $this->request->data['User']['group_id'] = '4';
                $this->request->data['User']['username'] = $this->request->data['User']['email'];
                if ($this->User->saveAll($this->request->data)) {
	                $Email = new CakeEmail();
					// Informing admin department about registration.
					$Email->template('registration_admin', 'default')
					    ->emailFormat('html')
					    ->to('info@icargobox.com')
					    ->subject('LMS.com - New Registration')
					    ->viewVars(
						    	array(
									'fname'   => $this->request->data['Profile']['fname'],
									'lname'   => $this->request->data['Profile']['lname'],
									'email'   => $this->request->data['User']['email']
						    	)
					    	)
					    ->from('sender@icargobox.com')
					    ->helpers(array('Html', 'Text'))
					    ->send();

					//Email Activation Link to user.
					$Email->template('activation_link_member', 'default')
					    ->emailFormat('html')
					    ->to($this->request->data['User']['email'])
					    ->subject('LMS.com - Account Activation Link')
					    ->viewVars(
						    	array(
									'fname'          => $this->request->data['Profile']['fname'],
									'lname'          => $this->request->data['Profile']['lname'],
									'email'          => $this->request->data['User']['email'],
									'username'       => $this->request->data['User']['email'],
									'activation_key' => $this->request->data['User']['activation_key']
						    	)
					    	)
					    ->from('sender@icargobox.com')
					    ->helpers(array('Html', 'Text'))
					    ->send();
	                $this->Session->setFlash('Gracias por registrarse con iCargoBox.com. Para activar su cuenta, por favor revise su correo electrónico y haga clic en el link de activación que ha recibido de info@icargobox.com.', 'frontend_success');
	                return $this->redirect(array('action' => 'register'));
	            }
            }	else	{ //or
            	// $error =  $this->User->invalidFields();
            	// if( isset($error['username']) ){
            	// 	for( $i=0; $i<count($error['username']); $i++ ){
            	// 		$this->Session->setFlash($error['username'][$i], 'frontend_error');
            	// 	}
            	// }
            	// pr($error);
            	// die;
                $this->Session->setFlash('Unable to proceed. Please try again.', 'frontend_error');
            }
		}
	}

	public function city_to_departmentAjax(){
		echo debug($this->request->data['Profile']['city_id']);
		$city_id =  $this->request->data['Profile']['city_id'];
		$departments = $this->Department->find('list', array(
			'fields'     => array('Department.id', 'Department.title'),
			'conditions' => array('Department.status' => '1', 'Department.city_id' => $city_id),
			'order'      => array('Department.title', 'Department.title ASC'),
			'recursive'  => 0
	    ));
	    $this->set('departments',$departments);
		$this->layout = 'ajax';
	}

	public function display() {
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $this->Auth->user('id')));
		return $user = $this->User->find('first', $options);
	}


	public function initDB() {
	    $group = $this->User->Group;

	    // Allow admins to everything
	    $group->id = 1;
	    $this->Acl->allow($group, 'controllers');

	     // Allow admins to everything
	    $group->id = 2;
	    $this->Acl->allow($group, 'controllers');

	    // allow managers to posts and widgets
	    $group->id = 3;
	    $this->Acl->deny($group, 'controllers');
	    $this->Acl->allow($group, 'controllers/Posts');
	    $this->Acl->allow($group, 'controllers/Widgets');

	    // allow users to only add and edit on posts and widgets
	    $group->id = 4;
	    $this->Acl->deny($group, 'controllers');

	    // allow basic users to log out
	    $this->Acl->allow($group, 'controllers/users/logout');
	    $this->Acl->allow($group, 'controllers/users/my_account');
	    $this->Acl->allow($group, 'controllers/Alerts');
	    $this->Acl->allow($group, 'controllers/Communications');

	    // we add an exit to avoid an ugly "missing views" error message
	    echo "all done";
	    exit;
	}

}
