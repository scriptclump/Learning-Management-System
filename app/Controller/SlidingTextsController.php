<?php
App::uses('AppController', 'Controller');
/**
 * SlidingTexts Controller
 *
 * @property SlidingText $SlidingText
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class SlidingTextsController extends AppController {

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
        $this->Auth->allow('display');
    }

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Prg->commonProcess();
		$this->Paginator->settings['limit'] = 50;
        $this->Paginator->settings['conditions'] = $this->SlidingText->parseCriteria($this->Prg->parsedParams());
        $this->set('slidingTexts', $this->Paginator->paginate());
        $this->set('title_for_layout', 'Sliding Text');
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->SlidingText->exists($id)) {
			throw new NotFoundException(__('Invalid sliding text'));
		}
		$options = array('conditions' => array('SlidingText.' . $this->SlidingText->primaryKey => $id));
		$this->set('slidingText', $this->SlidingText->find('first', $options));
		$this->set('title_for_layout', 'Sliding Text');
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->SlidingText->create();
			if ($this->SlidingText->save($this->request->data)) {
				$this->Session->setFlash(__('The sliding text has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The sliding text could not be saved. Please, try again.'));
			}
		}
		$this->set('title_for_layout', 'Sliding Text');
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->SlidingText->exists($id)) {
			throw new NotFoundException(__('Invalid sliding text'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->SlidingText->save($this->request->data)) {
				$this->Session->setFlash(__('The sliding text has been saved.'));
				if ($this->referer() != '/') {
		            return $this->redirect($this->referer());
		        }
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The sliding text could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('SlidingText.' . $this->SlidingText->primaryKey => $id));
			$this->request->data = $this->SlidingText->find('first', $options);
		}
		$this->set('title_for_layout', 'Sliding Text');
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->SlidingText->id = $id;
		if (!$this->SlidingText->exists()) {
			throw new NotFoundException(__('Invalid sliding text'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->SlidingText->delete()) {
			$this->Session->setFlash(__('The sliding text has been deleted.'));
		} else {
			$this->Session->setFlash(__('The sliding text could not be deleted. Please, try again.'));
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
		if( count($this->request->data['SlidingText']['del_item']) > 0 ){
			foreach ($this->request->data['SlidingText']['del_item'] as $key => $value) {
				$ids[] = $value;
			}

			if( $this->request->data['SlidingText']['do_action'] == "activate" ){
				if( $this->SlidingText->updateAll( array('SlidingText.status'=>1), array('SlidingText.id'=>$ids) ) ){
	                $this->Session->setFlash(__('Selected Sliding Texts are activated.', true));
	            }
	        }

	        if( $this->request->data['SlidingText']['do_action'] == "deactivate" ){
				if( $this->SlidingText->updateAll( array('SlidingText.status'=>0), array('SlidingText.id'=>$ids) ) ){
	                $this->Session->setFlash(__('Selected Sliding Texts are deactivated.', true));
	            }
	        }

	        if( $this->request->data['SlidingText']['do_action'] == "delete" ){
				if( count($this->request->data['SlidingText']['del_item']) > 0 ){
					foreach ($this->request->data['SlidingText']['del_item'] as $key => $value) {
						$this->SlidingText->id = $value;
						if (!$this->SlidingText->exists()) {
							throw new NotFoundException(__('Invalid Sliding Text'));
						}
						if ($this->SlidingText->delete()) {
							$this->Session->setFlash(__('The Sliding Text (#id '.$value.') has been deleted.'),'success');
						} else {
							$this->Session->setFlash(__('The Sliding Text could not be deleted. Please, try again.'),'error');
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

	public function display() {
		$sliding_texts = $this->SlidingText->find('all', array('fields'=>array('SlidingText.body'),
							   'recursive'=>0,
							   'order'=>array('SlidingText.sort_order'),
							   'conditions'=> array('SlidingText.status' => 1)));

		if(isset($this->params['requested'])) {
			return $sliding_texts;
		}
		$this->set('sliding_texts', $sliding_texts);
	}
}
