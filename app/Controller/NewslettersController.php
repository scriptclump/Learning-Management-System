<?php
App::uses('AppController', 'Controller');
/**
 * Newsletters Controller
 *
 * @property Newsletter $Newsletter
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class NewslettersController extends AppController {

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
    }

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Prg->commonProcess();
		$this->Paginator->settings['limit'] = 50;
        $this->Paginator->settings['conditions'] = $this->Newsletter->parseCriteria($this->Prg->parsedParams());
        $this->set('newsletters', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Newsletter->exists($id)) {
			throw new NotFoundException(__('Invalid newsletter'));
		}
		$options = array('conditions' => array('Newsletter.' . $this->Newsletter->primaryKey => $id));
		$this->set('newsletter', $this->Newsletter->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Newsletter->create();
			if ($this->Newsletter->save($this->request->data)) {
				$this->Session->setFlash(__('The newsletter has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The newsletter could not be saved. Please, try again.'));
			}
		}
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Newsletter->exists($id)) {
			throw new NotFoundException(__('Invalid newsletter'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Newsletter->save($this->request->data)) {
				$this->Session->setFlash(__('The newsletter has been saved.'));
				if ($this->referer() != '/') {
		            return $this->redirect($this->referer());
		        }
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The newsletter could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Newsletter.' . $this->Newsletter->primaryKey => $id));
			$this->request->data = $this->Newsletter->find('first', $options);
		}
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Newsletter->id = $id;
		if (!$this->Newsletter->exists()) {
			throw new NotFoundException(__('Invalid newsletter'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Newsletter->delete()) {
			$this->Session->setFlash(__('The newsletter has been deleted.'));
		} else {
			$this->Session->setFlash(__('The newsletter could not be deleted. Please, try again.'));
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
		if( count($this->request->data['Newsletter']['del_item']) > 0 ){
			foreach ($this->request->data['Newsletter']['del_item'] as $key => $value) {
				$ids[] = $value;
			}

			if( $this->request->data['Newsletter']['do_action'] == "activate" ){
				if( $this->Newsletter->updateAll( array('Newsletter.status'=>1), array('Newsletter.id'=>$ids) ) ){
	                $this->Session->setFlash(__('Selected newsletters are activated.', true));
	            }
	        }

	        if( $this->request->data['Newsletter']['do_action'] == "deactivate" ){
				if( $this->Newsletter->updateAll( array('Newsletter.status'=>0), array('Newsletter.id'=>$ids) ) ){
	                $this->Session->setFlash(__('Selected newsletters are deactivated.', true));
	            }
	        }

	        if( $this->request->data['Newsletter']['do_action'] == "delete" ){
				if( count($this->request->data['Newsletter']['del_item']) > 0 ){
					foreach ($this->request->data['Newsletter']['del_item'] as $key => $value) {
						$this->Newsletter->id = $value;
						if (!$this->Newsletter->exists()) {
							throw new NotFoundException(__('Invalid newsletter'));
						}
						if ($this->Newsletter->delete()) {
							$this->Session->setFlash(__('The newsletter (#id '.$value.') has been deleted.'),'success');
						} else {
							$this->Session->setFlash(__('The newsletter could not be deleted. Please, try again.'),'error');
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
}
