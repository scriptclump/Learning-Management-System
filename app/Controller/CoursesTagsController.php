<?php
App::uses('AppController', 'Controller');
/**
 * CoursesTags Controller
 *
 * @property CoursesTag $CoursesTag
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class CoursesTagsController extends AppController {

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
		$this->CoursesTag->recursive = 0;
		$this->set('coursesTags', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->CoursesTag->exists($id)) {
			throw new NotFoundException(__('Invalid courses tag'));
		}
		$options = array('conditions' => array('CoursesTag.' . $this->CoursesTag->primaryKey => $id));
		$this->set('coursesTag', $this->CoursesTag->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->CoursesTag->create();
			if ($this->CoursesTag->save($this->request->data)) {
				$this->Session->setFlash(__('The courses tag has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The courses tag could not be saved. Please, try again.'));
			}
		}
		$courses = $this->CoursesTag->Course->find('list');
		$tags = $this->CoursesTag->Tag->find('list');
		$this->set(compact('courses', 'tags'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->CoursesTag->exists($id)) {
			throw new NotFoundException(__('Invalid courses tag'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->CoursesTag->save($this->request->data)) {
				$this->Session->setFlash(__('The courses tag has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The courses tag could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('CoursesTag.' . $this->CoursesTag->primaryKey => $id));
			$this->request->data = $this->CoursesTag->find('first', $options);
		}
		$courses = $this->CoursesTag->Course->find('list');
		$tags = $this->CoursesTag->Tag->find('list');
		$this->set(compact('courses', 'tags'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->CoursesTag->id = $id;
		if (!$this->CoursesTag->exists()) {
			throw new NotFoundException(__('Invalid courses tag'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->CoursesTag->delete()) {
			$this->Session->setFlash(__('The courses tag has been deleted.'));
		} else {
			$this->Session->setFlash(__('The courses tag could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
