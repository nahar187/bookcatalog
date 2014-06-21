<?php
App::uses('AppController', 'Controller');

class BooksController extends AppController {


	function beforeFilter() {
		if(isset($this->params['admin']) && $this->params['admin']) {
			// check that a user is logged in
			$this->check_user();
		}
	}

	public function index() {
		$conditions = array();
		if($this->request->is('post') && isset($this->data['Filter'])){
			$this->transform_post_to_get();
		} else {
			$conditions = $this->generate_search_conditons();
		}
		$this->Book->recursive = 0;
		$this->paginate = array(
			'limit' => 16,
			'conditions' => $conditions
		);
		$this->set('books', $this->paginate());
		$types = $this->Book->Type->find('list');
		$types = $this->Book->Author->find('list');
		$this->set(compact('types','authors'));
		$this->layout = 'index';
	}

	public function admin_index() {
		$this->Book->recursive = 0;
		$this->set('books', $this->paginate());
	}

	public function view($id = null) {
		$this->Book->id = $id;
		if (!$this->Book->exists()) {
			throw new NotFoundException(__('Invalid book'));
		}
		$this->set('book', $this->Book->read(null, $id));
	}

	public function admin_view($id = null) {
		$this->Book->id = $id;
		if (!$this->Book->exists()) {
			throw new NotFoundException(__('Invalid book'));
		}
		$this->set('book', $this->Book->read(null, $id));
	}

	public function admin_add() {
		if ($this->request->is('post')) {
			if ($this->request->data['Author']['authors']) {
				$authors = explode(',',$this->data['Author']['authors']);
				foreach($authors as $_author) {
					$author = $this->save_author($_author);
					$this->request->data['Author']['Author'][$author['Author']['id']] = $author['Author']['id'];
				}
			}
			$this->Book->hasAndBelongsToMany['Author']['unique'] = false;
			$this->Book->create();
			$this->Book->validator()->remove('Type');
			if ($this->Book->save($this->request->data)) {
				$this->Session->setFlash(__('The book has been saved'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The book could not be saved. Please, try again.'));
			}
		}
		$types = $this->Book->Type->find('list');
		$this->set(compact('types'));

	}

	public function add_with_validation() {
		if ($this->request->is('post')) {
			$this->Book->create();
			if ($this->Book->save($this->request->data)) {
				$this->Session->setFlash(__('The book has been saved'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The book could not be saved. Please, try again.'));
			}
		}
		$types = $this->Book->Type->find('list');
		$this->set(compact('types'));
	}

	public function admin_edit($id = null) {
		$this->Book->id = $id;
		if (!$this->Book->exists()) {
			throw new NotFoundException(__('Invalid book'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Book->save($this->request->data)) {
				$this->Session->setFlash(__('The book has been saved'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The book could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Book->read(null, $id);
		}
		$types = $this->Book->Type->find('list');
		$this->set(compact('types'));
	}

	public function admin_delete($id = null) {
		if (!$this->request->is('book')) {
			throw new MethodNotAllowedException();
		}
		$this->Book->id = $id;
		if (!$this->Book->exists()) {
			throw new NotFoundException(__('Invalid book'));
		}
		if ($this->Book->delete()) {
			$this->Session->setFlash(__('Book deleted'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Book was not deleted'));
		return $this->redirect(array('action' => 'index'));
	}

	private function transform_post_to_get() {
		$filter_url['controller'] = $this->request->params['controller'];
		$filter_url['action'] = $this->request->params['action'];
		$filter_url['page'] = 1;

		// for each filter we will add a GET parameter for the generated url
		foreach($this->data['Filter'] as $name => $value){
			if($value){
				$filter_url[$name] = urlencode($value);
			}
		}
		return $this->redirect($filter_url);
	}

	private function generate_search_conditons() {
		$conditions = array();
		foreach($this->params['named'] as $param_name => $value){
			if(!in_array($param_name, array('page','sort','direction','limit'))){
				if($param_name == "search"){
					$conditions['OR'] = array(
						array('Book.name LIKE' => '%' . $value . '%'),
						array('Book.isbn LIKE' => '%' . $value . '%')
					);
				} else {
					$conditions['Book.'.$param_name] = $value;
				}
				$this->request->data['Filter'][$param_name] = $value;
			}
		}
		return $conditions;
	}

	private function save_author($_author) {
		$_author = strtolower(trim($_author));
		// check if the tag exists
		$this->Book->Author->recursive = -1;
		$author = $this->Book->Author->findByName($_author);
		if (!$author) {
			$this->Book->Author->create();
			$author = $this->Book->Author->save(array('name'=>$_author));
			$author['Author']['id'] = $this->Book->Author->id;
		}
		return $author;
	}
}
