<?php
App::uses('AppController', 'Controller');
/**
 * RecomendedStores Controller
 *
 * @property RecomendedStore $RecomendedStore
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class RecomendedStoresController extends AppController {

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
        $this->Paginator->settings['conditions'] = $this->RecomendedStore->parseCriteria($this->Prg->parsedParams());
        $this->set('recomendedStores', $this->Paginator->paginate());
        $this->set('title_for_layout', 'Recomended Stores');
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->RecomendedStore->exists($id)) {
			throw new NotFoundException(__('Invalid recomended store'));
		}
		$options = array('conditions' => array('RecomendedStore.' . $this->RecomendedStore->primaryKey => $id));
		$this->set('recomendedStore', $this->RecomendedStore->find('first', $options));
		$this->set('title_for_layout', 'Recomended Stores');
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->RecomendedStore->create();
			if ($this->RecomendedStore->save($this->request->data)) {
				$this->Session->setFlash(__('The recomended store has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The recomended store could not be saved. Please, try again.'));
			}
		}
		$this->set('title_for_layout', 'Recomended Stores');
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->RecomendedStore->exists($id)) {
			throw new NotFoundException(__('Invalid recomended store'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->RecomendedStore->save($this->request->data)) {
				$this->Session->setFlash(__('The recomended store has been saved.'));
				if ($this->referer() != '/') {
		            return $this->redirect($this->referer());
		        }
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The recomended store could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('RecomendedStore.' . $this->RecomendedStore->primaryKey => $id));
			$this->request->data = $this->RecomendedStore->find('first', $options);
		}
		$this->set('title_for_layout', 'Recomended Stores');
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->RecomendedStore->id = $id;
		if (!$this->RecomendedStore->exists()) {
			throw new NotFoundException(__('Invalid recomended store'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->RecomendedStore->delete()) {
			$this->Session->setFlash(__('The recomended store has been deleted.'));
		} else {
			$this->Session->setFlash(__('The recomended store could not be deleted. Please, try again.'));
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
		if( count($this->request->data['RecomendedStore']['del_item']) > 0 ){
			foreach ($this->request->data['RecomendedStore']['del_item'] as $key => $value) {
				$ids[] = $value;
			}

			if( $this->request->data['RecomendedStore']['do_action'] == "activate" ){
				if( $this->RecomendedStore->updateAll( array('RecomendedStore.status'=>1), array('RecomendedStore.id'=>$ids) ) ){
	                $this->Session->setFlash(__('Selected recomended stores are activated.', true));
	            }
	        }

	        if( $this->request->data['RecomendedStore']['do_action'] == "deactivate" ){
				if( $this->RecomendedStore->updateAll( array('RecomendedStore.status'=>0), array('RecomendedStore.id'=>$ids) ) ){
	                $this->Session->setFlash(__('Selected recomended stores are deactivated.', true));
	            }
	        }

	        if( $this->request->data['RecomendedStore']['do_action'] == "delete" ){
				if( count($this->request->data['RecomendedStore']['del_item']) > 0 ){
					foreach ($this->request->data['RecomendedStore']['del_item'] as $key => $value) {
						$this->RecomendedStore->id = $value;
						if (!$this->RecomendedStore->exists()) {
							throw new NotFoundException(__('Invalid recomended store'));
						}
						if ($this->RecomendedStore->delete()) {
							$this->Session->setFlash(__('The recomended store (#id '.$value.') has been deleted.'),'success');
						} else {
							$this->Session->setFlash(__('The recomended store could not be deleted. Please, try again.'),'error');
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
		$recomended_stores = $this->RecomendedStore->find('all', array('fields'=>array('RecomendedStore.title, RecomendedStore.alt_tag, RecomendedStore.store_img, RecomendedStore.store_url'),
							   'recursive'=>0,
							   'order'=>array('RecomendedStore.sort_order'),
							   'conditions'=> array('RecomendedStore.status' => 1)));

		if(isset($this->params['requested'])) {
			return $recomended_stores;
		}
		$this->set('recomended_stores', $recomended_stores);
	}
}
