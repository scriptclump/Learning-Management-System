<?php
App::uses('AppController', 'Controller');
/**
 * Attachments Controller
 *
 * @property Attachment $Attachment
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class AttachmentsController extends AppController {

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
		$this->Attachment->recursive = 0;
		$this->set('attachments', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Attachment->exists($id)) {
			throw new NotFoundException(__('Invalid attachment'));
		}
		$options = array('conditions' => array('Attachment.' . $this->Attachment->primaryKey => $id));
		$this->set('attachment', $this->Attachment->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Attachment->create();
			if ($this->Attachment->save($this->request->data)) {
				$this->Session->setFlash(__('The attachment has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The attachment could not be saved. Please, try again.'));
			}
		}
		$courses = $this->Attachment->Course->find('list');
		$sections = $this->Attachment->Section->find('list');
		$lectures = $this->Attachment->Lecture->find('list');
		$this->set(compact('courses', 'sections', 'lectures'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Attachment->exists($id)) {
			throw new NotFoundException(__('Invalid attachment'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Attachment->save($this->request->data)) {
				$this->Session->setFlash(__('The attachment has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The attachment could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Attachment.' . $this->Attachment->primaryKey => $id));
			$this->request->data = $this->Attachment->find('first', $options);
		}
		$courses = $this->Attachment->Course->find('list');
		$sections = $this->Attachment->Section->find('list');
		$lectures = $this->Attachment->Lecture->find('list');
		$this->set(compact('courses', 'sections', 'lectures'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Attachment->id = $id;
		if (!$this->Attachment->exists()) {
			throw new NotFoundException(__('Invalid attachment'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Attachment->delete()) {
			$this->Session->setFlash(__('The attachment has been deleted.'));
		} else {
			$this->Session->setFlash(__('The attachment could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
