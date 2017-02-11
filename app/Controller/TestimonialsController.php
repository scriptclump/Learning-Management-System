<?php
App::uses('AppController', 'Controller');
/**
 * Testimonials Controller
 *
 * @property Testimonial $Testimonial
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class TestimonialsController extends AppController {

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
        $this->Paginator->settings['conditions'] = $this->Testimonial->parseCriteria($this->Prg->parsedParams());
        $this->set('testimonials', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Testimonial->exists($id)) {
			throw new NotFoundException(__('Invalid testimonial'));
		}
		$options = array('conditions' => array('Testimonial.' . $this->Testimonial->primaryKey => $id));
		$this->set('testimonial', $this->Testimonial->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Testimonial->create();
			if ($this->Testimonial->save($this->request->data)) {
				$this->Session->setFlash(__('The testimonial has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The testimonial could not be saved. Please, try again.'));
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
		if (!$this->Testimonial->exists($id)) {
			throw new NotFoundException(__('Invalid testimonial'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Testimonial->save($this->request->data)) {
				$this->Session->setFlash(__('The testimonial has been saved.'));
				if ($this->referer() != '/') {
		            return $this->redirect($this->referer());
		        }
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The testimonial could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Testimonial.' . $this->Testimonial->primaryKey => $id));
			$this->request->data = $this->Testimonial->find('first', $options);
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
		$this->Testimonial->id = $id;
		if (!$this->Testimonial->exists()) {
			throw new NotFoundException(__('Invalid testimonial'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Testimonial->delete()) {
			$this->Session->setFlash(__('The testimonial has been deleted.'));
		} else {
			$this->Session->setFlash(__('The testimonial could not be deleted. Please, try again.'));
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
		if( count($this->request->data['Testimonial']['del_item']) > 0 ){
			foreach ($this->request->data['Testimonial']['del_item'] as $key => $value) {
				$ids[] = $value;
			}

			if( $this->request->data['Testimonial']['do_action'] == "activate" ){
				if( $this->Testimonial->updateAll( array('Testimonial.status'=>1), array('Testimonial.id'=>$ids) ) ){
	                $this->Session->setFlash(__('Selected testimonials are activated.', true));
	            }
	        }

	        if( $this->request->data['Testimonial']['do_action'] == "deactivate" ){
				if( $this->Testimonial->updateAll( array('Testimonial.status'=>0), array('Testimonial.id'=>$ids) ) ){
	                $this->Session->setFlash(__('Selected testimonials are deactivated.', true));
	            }
	        }

	        if( $this->request->data['Testimonial']['do_action'] == "delete" ){
				if( count($this->request->data['Testimonial']['del_item']) > 0 ){
					foreach ($this->request->data['Testimonial']['del_item'] as $key => $value) {
						$this->Testimonial->id = $value;
						if (!$this->Testimonial->exists()) {
							throw new NotFoundException(__('Invalid testimonial'));
						}
						if ($this->Testimonial->delete()) {
							$this->Session->setFlash(__('The testimonial (#id '.$value.') has been deleted.'),'success');
						} else {
							$this->Session->setFlash(__('The testimonial could not be deleted. Please, try again.'),'error');
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
		$testimonials = $this->Testimonial->find('all', array('fields'=>array('Testimonial.body'),
							   'recursive'=>0,
							   'order'=>array('Testimonial.sort_order'),
							   'conditions'=> array('Testimonial.status' => 1)));

		if(isset($this->params['requested'])) {
			return $testimonials;
		}
		$this->set('testimonials', $testimonials);
	}
}
