<?php
App::uses('AppController', 'Controller');
/**
 * NewsletterSubscribers Controller
 *
 * @property NewsletterSubscriber $NewsletterSubscriber
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class NewsletterSubscribersController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session', 'Search.Prg');


	public function beforeFilter() {
        parent::beforeFilter();
        //Here, we disable the Security component for Ajax requests and for the "fineupload" action
        if( $this->RequestHandler->isPost() && ( ($this->action == 'admin_bulk_action') ) ){
            $this->Security->validatePost = false;
            $this->Security->enabled = false;
            $this->Security->csrfCheck = false;
        }
        $this->Auth->allow();
    }

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Prg->commonProcess();
		$this->Paginator->settings['limit'] = 50;
        $this->Paginator->settings['conditions'] = $this->NewsletterSubscriber->parseCriteria($this->Prg->parsedParams());
        $this->set('newsletterSubscribers', $this->Paginator->paginate());
        $this->set('title_for_layout', 'Newsletter Subscribers');
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->NewsletterSubscriber->exists($id)) {
			throw new NotFoundException(__('Invalid newsletter subscriber'));
		}
		$options = array('conditions' => array('NewsletterSubscriber.' . $this->NewsletterSubscriber->primaryKey => $id));
		$this->set('newsletterSubscriber', $this->NewsletterSubscriber->find('first', $options));
		$this->set('title_for_layout', 'Newsletter Subscribers');
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->NewsletterSubscriber->create();
			if ($this->NewsletterSubscriber->save($this->request->data)) {
				$this->Session->setFlash(__('The newsletter subscriber has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The newsletter subscriber could not be saved. Please, try again.'));
			}
		}
		$this->set('title_for_layout', 'Newsletter Subscribers');
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->NewsletterSubscriber->exists($id)) {
			throw new NotFoundException(__('Invalid newsletter subscriber'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->NewsletterSubscriber->save($this->request->data)) {
				$this->Session->setFlash(__('The newsletter subscriber has been saved.'));
				if ($this->referer() != '/') {
		            return $this->redirect($this->referer());
		        }
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The newsletter subscriber could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('NewsletterSubscriber.' . $this->NewsletterSubscriber->primaryKey => $id));
			$this->request->data = $this->NewsletterSubscriber->find('first', $options);
		}
		$this->set('title_for_layout', 'Newsletter Subscribers');
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->NewsletterSubscriber->id = $id;
		if (!$this->NewsletterSubscriber->exists()) {
			throw new NotFoundException(__('Invalid newsletter subscriber'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->NewsletterSubscriber->delete()) {
			$this->Session->setFlash(__('The newsletter subscriber has been deleted.'));
		} else {
			$this->Session->setFlash(__('The newsletter subscriber could not be deleted. Please, try again.'));
		}

		$pos = strpos($this->referer(), 'view');
		if ($pos !== false) {
			return $this->redirect(array('action' => 'index'));
		} else{
			if ($this->referer() != '/') {
	            return $this->redirect($this->referer());
	        }
		}
		return $this->redirect(array('action' => 'index'));
	}

	/**
	 * bulk action method
	 *
	 * @return void
	 */
	public function admin_bulk_action() {
		$this->request->onlyAllow('post', 'bulk_action');
		if( count($this->request->data['NewsletterSubscriber']['del_item']) > 0 ){
			foreach ($this->request->data['NewsletterSubscriber']['del_item'] as $key => $value) {
				$ids[] = $value;
			}

			if( $this->request->data['NewsletterSubscriber']['do_action'] == "activate" ){
				if( $this->NewsletterSubscriber->updateAll( array('NewsletterSubscriber.status'=>1), array('NewsletterSubscriber.id'=>$ids) ) ){
	                $this->Session->setFlash(__('Selected newsletter subscribers are activated.', true));
	            }
	        }

	        if( $this->request->data['NewsletterSubscriber']['do_action'] == "deactivate" ){
				if( $this->NewsletterSubscriber->updateAll( array('NewsletterSubscriber.status'=>0), array('NewsletterSubscriber.id'=>$ids) ) ){
	                $this->Session->setFlash(__('Selected newsletter subscribers are deactivated.', true));
	            }
	        }

	        if( $this->request->data['NewsletterSubscriber']['do_action'] == "delete" ){
				if( count($this->request->data['NewsletterSubscriber']['del_item']) > 0 ){
					foreach ($this->request->data['NewsletterSubscriber']['del_item'] as $key => $value) {
						$this->NewsletterSubscriber->id = $value;
						if (!$this->NewsletterSubscriber->exists()) {
							throw new NotFoundException(__('Invalid newsletter subscriber'));
						}
						if ($this->NewsletterSubscriber->delete()) {
							$this->Session->setFlash(__('The newsletter subscriber (#id '.$value.') has been deleted.'),'success');
						} else {
							$this->Session->setFlash(__('The newsletter subscriber could not be deleted. Please, try again.'),'error');
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

	public function thank_you()	{
		if ($this->request->is('post')) {
			$this->NewsletterSubscriber->create();
			if ($this->NewsletterSubscriber->save($this->request->data)) {
				$this->Session->setFlash(__('Thank you for subscribing our newsletters.'), 'frontend_success');
				return $this->redirect(array( 'controller' => 'newsletters', 'action' => 'thank-you'));
			} else {
				//$this->Session->setFlash(__('The newsletter subscriber could not be saved. Please, try again.'), 'frontend_error');
			}
		}
	}



}
