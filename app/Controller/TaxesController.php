<?php
App::uses('AppController', 'Controller');
/**
 * Taxes Controller
 *
 * @property Tax $Tax
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class TaxesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session');

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Tax->recursive = 0;
		$this->set('taxes', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Tax->exists($id)) {
			throw new NotFoundException(__('Invalid tax'));
		}
		$options = array('conditions' => array('Tax.' . $this->Tax->primaryKey => $id));
		$this->set('tax', $this->Tax->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Tax->create();
			if ($this->Tax->save($this->request->data)) {
				$this->Session->setFlash(__('The tax has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The tax could not be saved. Please, try again.'));
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
		if (!$this->Tax->exists($id)) {
			throw new NotFoundException(__('Invalid tax'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Tax->save($this->request->data)) {
				$this->Session->setFlash(__('The tax has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The tax could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Tax.' . $this->Tax->primaryKey => $id));
			$this->request->data = $this->Tax->find('first', $options);
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
		$this->Tax->id = $id;
		if (!$this->Tax->exists()) {
			throw new NotFoundException(__('Invalid tax'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Tax->delete()) {
			$this->Session->setFlash(__('The tax has been deleted.'));
		} else {
			$this->Session->setFlash(__('The tax could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
