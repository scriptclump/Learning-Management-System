<?php
App::uses('AppController', 'Controller');
/**
 * Dashboards Controller
 *
 * @property Category $Category
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class CategoriesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator','Session', 'Search.Prg');
	public $helpers = array('Tree', 'Star');

	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->authError = sprintf(__('You are not authorized to access that location.'.$this->name.$this->action));
	    if( $this->RequestHandler->isPost() && ($this->action == 'admin_bulk_action' ) ){
	        $this->Security->validatePost = false;
	        $this->Security->enabled = false;
	        $this->Security->csrfCheck = false;
	    }
		$this->Auth->allow('index', 'view');
    }

	/**
	 * index method
	 *
	 * @return void
	 */
	public function admin_index() {
		$this->Prg->commonProcess();
		$this->Paginator->settings['limit'] = 50;
        $this->Paginator->settings['conditions'] = $this->Category->parseCriteria($this->Prg->parsedParams());
		$data = $this->Category->generateTreeList(
          null,
          null,
          null,
          '-'
        );
        $this->set('categories', $this->Paginator->paginate());

        $this->helpers[] = 'Tree';
		$categoriestree = $this->Category->find('all', array(
			'recursive' => -1,
			'order' => array(
				'Category.lft' => 'ASC'
			),
			'conditions' => array(
			),
		));
		$this->set(compact('categoriestree'));

	}

	/**
	 * view method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function admin_view($id = null) {
		if (!$this->Category->exists($id)) {
			throw new NotFoundException(__('Invalid category'));
		}
		$options = array('conditions' => array('Category.' . $this->Category->primaryKey => $id));
		$this->set('category', $this->Category->find('first', $options));
	}

	/**
	 * add method
	 *
	 * @return void
	 */
	public function admin_add() {
		if ($this->request->is('post')) {
			// $slug = $this->AppModel->generateSlug ('my title');
			// $this->request->data['Category']['slug'] = $slug;
			//debug($this->request->data);exit;
			if ($this->Category->save($this->request->data)) {
				$this->Session->setFlash(__('Your category has been saved.'),'success');
				return $this->redirect(array('action' => 'index'));
			}
		}
		$parents = $this->Category->generateTreeList('','','','--','');
		$this->set(compact('parents'));
	}

	/**
	 * edit method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function admin_edit($id = null) {
		if (!$this->Category->exists($id)) {
			throw new NotFoundException(__('Invalid category'));
		}
		if ($this->request->is(array('category', 'put'))) {
			// pr($this->request->data);
			// exit;
			if ($this->Category->save($this->request->data)) {
				$this->Session->setFlash(__('The category has been saved.'),'success');
				if ($this->referer() != '/') {
		            return $this->redirect($this->referer());
		        }
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The category could not be saved. Please, try again.'),'error');
			}
		} else {
			$options = array('conditions' => array('Category.' . $this->Category->primaryKey => $id));
			$this->request->data = $this->Category->find('first', $options);
			$parents = $this->Category->generateTreeList('','','','--','');
			$this->set(compact('parents'));
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
		$this->Category->id = $id;
		if (!$this->Category->exists()) {
			throw new NotFoundException(__('Invalid category'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Category->removeFromTree($id,true) != false) {
			$this->Session->setFlash(__('The category has been deleted.'),'success');
		} else {
			$this->Session->setFlash(__('The category could not be deleted. Please, try again.'),'error');
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
	 * add method
	 *
	 * @return void
	 */
	public function admin_order() {
		if ($this->request->is('post')) {
			if ($this->Category->save($this->request->data)) {
				$this->Session->setFlash(__('Your category has been saved.'),'success');
				return $this->redirect(array('action' => 'index'));
			}
		}
		$this->set('parents',$this->Category->generateTreeList('','','','-',''));
	}


	public function category_menu($parent_id = 0)
	{
		//return $allChildren = $this->Category->children(0, true);
		pr($allChildren = $this->Category->children(0, true));
		exit;
		//return $allChildren = $this->Category->children(0, false, 'title, slug', null, null, 0, -1);
	}

	public function index()	{
		exit;
		//$this->helpers[] = 'Tree';
		// $categories = $this->Category->listAllListingTypeCategories();
		// pr($categories);
		// $categories = $this->Category->find('threaded');
		// $this->set('categories', $categories);
		//$categories = $this->Category->ListingTypeCategory->find('all');
		//$categories = $this->Category->ListingTypeCategory->bindModel(array('belongsTo'=>array('ListingType')));
		//pr($categories);
	}

	public function view($slug = null) {
		//$category_businesses = $this->Category->getBusinessByCategoryId($slug);
		//$category_businesses = $this->Category->findBySlug($slug, array('recursive' => 2));
		$category_businesses = $this->Category->find('first', array(
		//'fields'  => array('`Category`.`id`, `Category`.`title`, `Business`.`id`, `Business`.`name`, `Business`.`slug`, `Business`.`description`, `Business`.`img_src`, `Business`.`pname`, `Business`.`street`, `Business`.`state_iso`, `Business`.`zip_code`, `Business`.`website`, `Business`.`phone`, `Business`.`alternate_email`, `Business`.`website`, `Business`.`website`, `Business`.`website`, `Business`.`website`'),
		'contain' => array(
	        'Business' => array(
	            'Reviews' => array(
	                'fields' => array('rating'),
	                'conditions' => array('status' => 1)
	            ),
	            'City' => array(
	                'fields' => array('city_name'),
	                'conditions' => array('status' => 1)
	            )
	        )
	    ),
		'conditions' => array('`Category`.`slug`' => $slug ),
		'recursive'  => 2
		));
		// pr($category_businesses);
		// die;
		$this->set('category_businesses', $category_businesses);
		$this->set('title_for_layout', $category_businesses['Category']['meta_title']);
		$this->set('meta_key', $category_businesses['Category']['meta_keyword']);
		$this->set('meta_desc', $category_businesses['Category']['meta_desc']);
	}

	/**
	 * bulk action method
	 *
	 * @return void
	 */
	public function admin_bulk_action() {
		$this->request->onlyAllow('post', 'bulk_action');

		if( count($this->request->data['Category']['del_item']) > 0 ){
			foreach ($this->request->data['Category']['del_item'] as $key => $value) {
				$ids[] = $value;
			}

			if( $this->request->data['Category']['do_action'] == "activate" ){
				if( $this->Category->updateAll( array('Category.status'=>1), array('Category.id'=>$ids) ) ){
	                $this->Session->setFlash(__('Selected categories are activated.', true));
	            }
	        }

	        if( $this->request->data['Category']['do_action'] == "deactivate" ){
				if( $this->Category->updateAll( array('Category.status'=>0), array('Category.id'=>$ids) ) ){
	                $this->Session->setFlash(__('Selected categories are deactivated.', true));
	            }
	        }

	        if( $this->request->data['Category']['do_action'] == "delete" ){
				if( count($this->request->data['Category']['del_item']) > 0 ){
					foreach ($this->request->data['Category']['del_item'] as $key => $value) {
						$this->Category->id = $value;
						if (!$this->Category->exists()) {
							throw new NotFoundException(__('Invalid category'));
						}
						if ($this->Category->removeFromTree($value,true) != false) {
							$this->Session->setFlash(__('The category (#id '.$value.') has been deleted.'),'success');
						} else {
							$this->Session->setFlash(__('The category could not be deleted. Please, try again.'),'error');
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
		return $categories = $this->Category->find('list', array(
			'fields'     => array('Category.title', 'Category.slug'),
			'conditions' => array('Category.status' => '1'),
			'order'      => array('Category.title' => 'ASC')
	    ));
	}


	
}