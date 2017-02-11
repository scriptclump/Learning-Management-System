<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');
App::uses('BlackholeException', 'Lib/Error/Exception');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
  public $components = array(
      'Security', 'Cookie', 'Session', 'DebugKit.Toolbar', 'RequestHandler', 'SwiftMailer',
      'Acl',
      'Auth' => array(
        'authorize' => array(
            'Actions' => array('actionPath' => 'controllers')
        ),
        'authenticate' => array(
          'Form' => array(
              'fields' => array('username' => 'email')
          )
        )
      )
  );
  public $helpers = array('Cache', 'Html', 'Form', 'Session');

  public function beforeFilter() {
    // Adding debugging tools.
    App::import('Vendor', 'chromephp');
    App::import('Vendor', 'firephp');
    $this->FirePhp = FirePHP::getInstance(true);
    $this->set('FirePhp', $this->FirePhp);

    // Set blackHoleCallback.
    $this->Security->blackHoleCallback = '_blackhole';

    $this->Auth->authError  = "You don't have access to that area. Please login first.";
    $this->Auth->authRedirect = false;

    // Managing ACL.
    $visitor_access = array('display', 'login', 'logout');
    if ($this->request->prefix == 'admin') {
      // Setting the layout for the admin.
      if ((isset($this->params['action']) && ($this->params['action'] == 'admin_login'))) {
        $this->layout = 'admin_login';
      } else{
        if ((isset($this->params['prefix']) && ($this->params['prefix'] == 'admin'))) {
          $this->layout = 'admin';
        }
      }

      // Managing the redirects after login.
      AuthComponent::$sessionKey = 'Auth.Admin';
      $this->Auth->loginAction    = array('controller'=>'users','action'=>'login');
      $this->Auth->loginRedirect  = array('controller'=>'dashboards','action'=>'index');
      $this->Auth->logoutRedirect = array('controller'=>'users','action'=>'login');
      $this->Auth->allow('login', 'admin');
    } else if ( isset($this->request->params['pass'][0] ) == "home" ) {
          if ( $this->request->params['pass'][0] == "home" ) {
            $this->layout = 'home';
          } else{
            $this->layout = 'default';
          }
          $this->Auth->allow();
    } else {
      $this->layout               = 'default';
      $this->Auth->loginAction    = array('controller'=>'users','action'=>'login');
      $this->Auth->loginRedirect  = array('controller'=>'users','action'=>'my_account');
      $this->Auth->logoutRedirect = array('controller'=>'users','action'=>'login');
    }
  }

  public function isAuthorized($user = null) {
      // Not in use since ACL.
      // Any registered user can access public functions
      if (empty($this->request->params['admin'])) {
          return true;
      }

      // Only admins can access admin functions
      if (isset($this->request->params['admin'])) {
          return (bool)($user['role'] === 'admin');
      }

      // Default deny
      return false;
  }

  // public function isAuthorized($user){
  //     // You can have various extra checks in here, if needed.
  //     // We'll just return true though. I'm pretty certain this method has to exist, even if it just returns true.
  //     pr($this->Auth);
  //     exit;
  //     return true;
  // }

  // Custom throw for the security blackhole.
  public function _blackhole($error) {
    throw new BlackholeException(__('The form session has timed out, please try again.'), 500);
  }

  // Active, Inactive button for entire website. Include the JS for this.
  public function admin_switch($field = null, $id = null) {
    $this->autoRender = false;
    $model = $this->modelClass;
    if ($this->$model && $field && $id) {
      $field = $this->$model->escapeField($field);
      return $this->$model->updateAll(array($field => '1 -' . $field), array($this->$model->escapeField() => $id));
    }
    if(!$this->RequestHandler->isAjax()) {
      return $this->redirect($this->referer());
    }
  }

  /**
   * Overwitting the redirect function for debuggin redirect loop.
   * @param  [type]  $url    [description]
   * @param  [type]  $status [description]
   * @param  boolean $exit   [description]
   * @return [type]          [description]
   */
  // public function redirect($url, $status = NULL, $exit = true) {
  //   debug($url);
  //   echo $this->here;
  //   debug(Debugger::trace());
  //   die;
  // }

}
