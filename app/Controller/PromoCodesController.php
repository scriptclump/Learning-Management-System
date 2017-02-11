<?php
App::uses('AppController', 'Controller');
/**
 * PromoCodes Controller
 *
 * @property PromoCode $PromoCode
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class PromoCodesController extends AppController {

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
		$this->PromoCode->recursive = 0;
		$this->set('promoCodes', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->PromoCode->exists($id)) {
			throw new NotFoundException(__('Invalid promo code'));
		}
		$options = array('conditions' => array('PromoCode.' . $this->PromoCode->primaryKey => $id));
		$this->set('promoCode', $this->PromoCode->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->PromoCode->create();
			if ($this->PromoCode->save($this->request->data)) {
				$this->Session->setFlash(__('The promo code has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The promo code could not be saved. Please, try again.'));
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
		if (!$this->PromoCode->exists($id)) {
			throw new NotFoundException(__('Invalid promo code'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->PromoCode->save($this->request->data)) {
				$this->Session->setFlash(__('The promo code has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The promo code could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('PromoCode.' . $this->PromoCode->primaryKey => $id));
			$this->request->data = $this->PromoCode->find('first', $options);
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
		$this->PromoCode->id = $id;
		if (!$this->PromoCode->exists()) {
			throw new NotFoundException(__('Invalid promo code'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->PromoCode->delete()) {
			$this->Session->setFlash(__('The promo code has been deleted.'));
		} else {
			$this->Session->setFlash(__('The promo code could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
