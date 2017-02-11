<?php
App::uses('AppController', 'Controller');
/**
 * SlidingBanners Controller
 *
 * @property SlidingBanner $SlidingBanner
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class SlidingBannersController extends AppController {

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
        $this->Paginator->settings['conditions'] = $this->SlidingBanner->parseCriteria($this->Prg->parsedParams());
        $this->set('slidingBanners', $this->Paginator->paginate());
        $this->set('title_for_layout', 'Sliding Banner');
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->SlidingBanner->exists($id)) {
			throw new NotFoundException(__('Invalid sliding banner'));
		}
		$options = array('conditions' => array('SlidingBanner.' . $this->SlidingBanner->primaryKey => $id));
		$this->set('slidingBanner', $this->SlidingBanner->find('first', $options));
		$this->set('title_for_layout', 'Sliding Banner');
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->SlidingBanner->create();
			if ($this->SlidingBanner->save($this->request->data)) {
				$this->Session->setFlash(__('The sliding banner has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The sliding banner could not be saved. Please, try again.'));
			}
		}
		$this->set('title_for_layout', 'Sliding Banner');
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->SlidingBanner->exists($id)) {
			throw new NotFoundException(__('Invalid sliding banner'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->SlidingBanner->save($this->request->data)) {
				$this->Session->setFlash(__('The sliding banner has been saved.'));
				if ($this->referer() != '/') {
		            return $this->redirect($this->referer());
		        }
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The sliding banner could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('SlidingBanner.' . $this->SlidingBanner->primaryKey => $id));
			$this->request->data = $this->SlidingBanner->find('first', $options);
		}
		$this->set('title_for_layout', 'Sliding Banner');
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->SlidingBanner->id = $id;
		if (!$this->SlidingBanner->exists()) {
			throw new NotFoundException(__('Invalid sliding banner'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->SlidingBanner->delete()) {
			$this->Session->setFlash(__('The sliding banner has been deleted.'));
		} else {
			$this->Session->setFlash(__('The sliding banner could not be deleted. Please, try again.'));
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
		if( count($this->request->data['SlidingBanner']['del_item']) > 0 ){
			foreach ($this->request->data['SlidingBanner']['del_item'] as $key => $value) {
				$ids[] = $value;
			}

			if( $this->request->data['SlidingBanner']['do_action'] == "activate" ){
				if( $this->SlidingBanner->updateAll( array('SlidingBanner.status'=>1), array('SlidingBanner.id'=>$ids) ) ){
	                $this->Session->setFlash(__('Selected sliding banners are activated.', true));
	            }
	        }

	        if( $this->request->data['SlidingBanner']['do_action'] == "deactivate" ){
				if( $this->SlidingBanner->updateAll( array('SlidingBanner.status'=>0), array('SlidingBanner.id'=>$ids) ) ){
	                $this->Session->setFlash(__('Selected sliding banners are deactivated.', true));
	            }
	        }

	        if( $this->request->data['SlidingBanner']['do_action'] == "delete" ){
				if( count($this->request->data['SlidingBanner']['del_item']) > 0 ){
					foreach ($this->request->data['SlidingBanner']['del_item'] as $key => $value) {
						$this->SlidingBanner->id = $value;
						if (!$this->SlidingBanner->exists()) {
							throw new NotFoundException(__('Invalid sliding banner'));
						}
						if ($this->SlidingBanner->delete()) {
							$this->Session->setFlash(__('The sliding banner (#id '.$value.') has been deleted.'),'success');
						} else {
							$this->Session->setFlash(__('The sliding banner could not be deleted. Please, try again.'),'error');
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
		$sliding_banners = $this->SlidingBanner->find('all', array('fields'=>array('SlidingBanner.title, SlidingBanner.alt_tag, SlidingBanner.banner_img'),
							   'recursive'=>0,
							   'order'=>array('SlidingBanner.sort_order'),
							   'conditions'=> array('SlidingBanner.status' => 1)));

		if(isset($this->params['requested'])) {
			return $sliding_banners;
		}
		$this->set('sliding_banners', $sliding_banners);
	}
}
