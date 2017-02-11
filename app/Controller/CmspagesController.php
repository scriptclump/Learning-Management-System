<?php
App::uses('AppController', 'Controller');
/**
 * Dashboards Controller
 *
 * @property Cmspage $Cmspage
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class CmspagesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session', 'Search.Prg');

	public function beforeFilter() {
        parent::beforeFilter();
        //Here, we disable the Security component for Ajax requests and for the "fineupload" action
        if( $this->RequestHandler->isPost() && ($this->action == 'admin_bulk_action' ) ){
            $this->Security->validatePost = false;
            $this->Security->enabled = false;
            $this->Security->csrfCheck = false;
        }
        $this->Auth->allow('menu', 'getContentByID', 'home', 'view', 'register');
    }


	/**
	 * index method
	 *
	 * @return void
	 */
	public function admin_index() {
		$this->Prg->commonProcess();
		$this->Paginator->settings['limit'] = 50;
        $this->Paginator->settings['conditions'] = $this->Cmspage->parseCriteria($this->Prg->parsedParams());
        $this->set('cmspages', $this->Paginator->paginate());
        $data = $this->Cmspage->generateTreeList(
          null,
          null,
          null,
          '-'
        );
        $this->helpers[] = 'Tree';
		$cmspagestree = $this->Cmspage->find('all', array(
			'recursive' => -1,
			'order' => array(
				'Cmspage.lft' => 'ASC'
			),
			'conditions' => array(
			),
		));
		$this->set(compact('cmspagestree'));
		$this->set('title_for_layout', 'Pages');
	}

	/**
	 * view method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function admin_view($id = null) {
		if (!$this->Cmspage->exists($id)) {
			throw new NotFoundException(__('Invalid page'));
		}
		$options = array('conditions' => array('Cmspage.' . $this->Cmspage->primaryKey => $id));
		$this->set('cmspage', $this->Cmspage->find('first', $options));
		$this->set('title_for_layout', 'Pages');
	}

	/**
	 * add method
	 *
	 * @return void
	 */
	public function admin_add() {
		if ($this->request->is('post')) {
			// $slug = $this->AppModel->generateSlug ('my title');
			// $this->request->data['Cmspage']['slug'] = $slug;
			//debug($this->request->data);exit;
			if ($this->Cmspage->save($this->request->data)) {
				$this->Session->setFlash(__('Your page has been saved.'),'success');
				return $this->redirect(array('action' => 'index'));
			}
		}
		$this->set('parents',$this->Cmspage->generateTreeList('','','','--',''));
		$this->set('title_for_layout', 'Pages');
	}

	/**
	 * edit method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function admin_edit($id = null) {
		if (!$this->Cmspage->exists($id)) {
			throw new NotFoundException(__('Invalid page'));
		}
		if ($this->request->is(array('cmspage', 'put'))) {
			if ($this->Cmspage->save($this->request->data)) {
				$this->Session->setFlash(__('The page has been saved.'),'success');
				if ($this->referer() != '/') {
		            return $this->redirect($this->referer());
		        }
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The page could not be saved. Please, try again.'),'error');
			}
		} else {
			$options = array('conditions' => array('Cmspage.' . $this->Cmspage->primaryKey => $id));
			$this->request->data = $this->Cmspage->find('first', $options);
			$this->set('parents',$this->Cmspage->generateTreeList('','','','--',''));
		}
		$this->set('title_for_layout', 'Pages');
	}

	/**
	 * delete method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function admin_delete($id = null) {
		$this->Cmspage->id = $id;
		if (!$this->Cmspage->exists()) {
			throw new NotFoundException(__('Invalid page'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Cmspage->removeFromTree($id,true) != false) {
			$this->Session->setFlash(__('The page has been deleted.'),'success');
		} else {
			$this->Session->setFlash(__('The page could not be deleted. Please, try again.'),'error');
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
	 * order method
	 *
	 * @return void
	 */
	public function admin_order() {
		if ($this->request->is('post')) {
			if ($this->Cmspage->save($this->request->data)) {
				$this->Session->setFlash(__('Your page has been saved.'),'success');
				return $this->redirect(array('action' => 'index'));
			}
		}
		$this->set('parents',$this->Cmspage->generateTreeList('','','','-',''));
		$this->set('title_for_layout', 'Pages');
	}

	/**
	 * bulk action method
	 *
	 * @return void
	 */
	public function admin_bulk_action() {
		$this->request->onlyAllow('post', 'bulk_action');

		if( count($this->request->data['Cmspage']['del_item']) > 0 ){
			foreach ($this->request->data['Cmspage']['del_item'] as $key => $value) {
				$ids[] = $value;
			}

			if( $this->request->data['Cmspage']['do_action'] == "activate" ){
				if( $this->Cmspage->updateAll( array('Cmspage.status'=>1), array('Cmspage.id'=>$ids) ) ){
	                $this->Session->setFlash(__('Selected pages are activated.', true));
	            }
	        }

	        if( $this->request->data['Cmspage']['do_action'] == "deactivate" ){
				if( $this->Cmspage->updateAll( array('Cmspage.status'=>0), array('Cmspage.id'=>$ids) ) ){
	                $this->Session->setFlash(__('Selected pages are deactivated.', true));
	            }
	        }

	        if( $this->request->data['Cmspage']['do_action'] == "delete" ){
				if( count($this->request->data['Cmspage']['del_item']) > 0 ){
					foreach ($this->request->data['Cmspage']['del_item'] as $key => $value) {
						$this->Cmspage->id = $value;
						if (!$this->Cmspage->exists()) {
							throw new NotFoundException(__('Invalid page'));
						}
						if ($this->Cmspage->removeFromTree($value,true) != false) {
							$this->Session->setFlash(__('The page (#id '.$value.') has been deleted.'),'success');
						} else {
							$this->Session->setFlash(__('The page could not be deleted. Please, try again.'),'error');
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
	 * Return Home page content.
	 * @throws NotFoundException
	 * @return array     All the field of matched records from cmspage table.
	 */
	public function home(){
		$cmspage = $this->Cmspage->findByIdAndStatus(1, 1);
		if (!$cmspage) {
	        throw new NotFoundException("The page, you are looking for is not available at this moment.");
	    }
		$this->set('cmspage', $cmspage );
		$this->set('title_for_layout', $cmspage['Cmspage']['meta_title'] );
		$this->set('meta_key', $cmspage['Cmspage']['meta_keyword'] );
		$this->set('meta_desc', $cmspage['Cmspage']['meta_desc'] );
	}

	/**
	 * Return CMS page details.
	 * @throws NotFoundException
	 * @param  string $slug CMS Page slug.
	 * @return array     All the field of matched records from cmspage table.
	 */
	public function view( $slug = null ){
		$cmspage = $this->Cmspage->findBySlugAndStatus( $slug, 1 );
		if (!$cmspage) {
	        throw new NotFoundException("The page, you are looking for is not available at this moment.");
	    }
		$this->set(compact('cmspage'));
		$this->set('title_for_layout', $cmspage['Cmspage']['meta_title'] );
		$this->set('meta_key', $cmspage['Cmspage']['meta_keyword'] );
		$this->set('meta_desc', $cmspage['Cmspage']['meta_desc'] );
	}

	/**
	 * Return CMS page details.
	 * @throws NotFoundException
	 * @param  int $id CMS Page id.
	 * @return array     All the field of matched records from cmspage table.
	 */
	public function getContentByID( $id = null ) {
		if (!$this->Cmspage->exists($id)) {
			throw new NotFoundException();
		}
		$cmspage = $this->Cmspage->findById( $id );
	    return $cmspage;
	}

	public function menu( $ids = array() ){
		$ids = $this->params->params['ids'];
		return $this->Cmspage->find('all', array(
		    'conditions' => array(
		        "Cmspage.id" => $ids,
		        "Cmspage.status" => 1
		    ),
		    'fields' => array('Cmspage.title', 'Cmspage.slug')
		));
	}
}
