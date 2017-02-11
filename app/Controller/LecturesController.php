<?php
App::uses('AppController', 'Controller');
/**
 * Lectures Controller
 *
 * @property Lecture $Lecture
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class LecturesController extends AppController {

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
		$this->Lecture->recursive = 0;
		$this->set('lectures', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Lecture->exists($id)) {
			throw new NotFoundException(__('Invalid lecture'));
		}
		$options = array('conditions' => array('Lecture.' . $this->Lecture->primaryKey => $id));
		$this->set('lecture', $this->Lecture->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Lecture->create();
			if ($this->Lecture->save($this->request->data)) {
				$this->Session->setFlash(__('The lecture has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The lecture could not be saved. Please, try again.'));
			}
		}
		$courses = $this->Lecture->Course->find('list');
		$sections = $this->Lecture->Section->find('list');
		$this->set(compact('courses', 'sections'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Lecture->exists($id)) {
			throw new NotFoundException(__('Invalid lecture'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Lecture->save($this->request->data)) {
				$this->Session->setFlash(__('The lecture has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The lecture could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Lecture.' . $this->Lecture->primaryKey => $id));
			$this->request->data = $this->Lecture->find('first', $options);
		}
		$courses = $this->Lecture->Course->find('list');
		$sections = $this->Lecture->Section->find('list');
		$this->set(compact('courses', 'sections'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Lecture->id = $id;
		if (!$this->Lecture->exists()) {
			throw new NotFoundException(__('Invalid lecture'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Lecture->delete()) {
			$this->Session->setFlash(__('The lecture has been deleted.'));
		} else {
			$this->Session->setFlash(__('The lecture could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
