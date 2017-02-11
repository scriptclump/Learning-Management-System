<?php
App::uses('AppController', 'Controller');
/**
 * SentNewsletters Controller
 *
 * @property SentNewsletter $SentNewsletter
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class SentNewslettersController extends AppController {

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
		$this->SentNewsletter->recursive = 0;
		$this->set('sentNewsletters', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->SentNewsletter->exists($id)) {
			throw new NotFoundException(__('Invalid sent newsletter'));
		}
		$options = array('conditions' => array('SentNewsletter.' . $this->SentNewsletter->primaryKey => $id));
		$this->set('sentNewsletter', $this->SentNewsletter->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->SentNewsletter->create();
			if ($this->SentNewsletter->save($this->request->data)) {
				$this->Session->setFlash(__('The sent newsletter has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The sent newsletter could not be saved. Please, try again.'));
			}
		}
		$newsletterSubscribers = $this->SentNewsletter->NewsletterSubscriber->find('list');
		$newsletters = $this->SentNewsletter->Newsletter->find('list');
		$this->set(compact('newsletterSubscribers', 'newsletters'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->SentNewsletter->exists($id)) {
			throw new NotFoundException(__('Invalid sent newsletter'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->SentNewsletter->save($this->request->data)) {
				$this->Session->setFlash(__('The sent newsletter has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The sent newsletter could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('SentNewsletter.' . $this->SentNewsletter->primaryKey => $id));
			$this->request->data = $this->SentNewsletter->find('first', $options);
		}
		$newsletterSubscribers = $this->SentNewsletter->NewsletterSubscriber->find('list');
		$newsletters = $this->SentNewsletter->Newsletter->find('list');
		$this->set(compact('newsletterSubscribers', 'newsletters'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->SentNewsletter->id = $id;
		if (!$this->SentNewsletter->exists()) {
			throw new NotFoundException(__('Invalid sent newsletter'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->SentNewsletter->delete()) {
			$this->Session->setFlash(__('The sent newsletter has been deleted.'));
		} else {
			$this->Session->setFlash(__('The sent newsletter could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
