<?php
App::uses('AppController', 'Controller');
/**
 * Categories Controller
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
	public $components = array('Paginator', 'Session');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Category->recursive = 0;
		$this->set('categories', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
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
	public function add() {
		if ($this->request->is('post')) {
			$this->Category->create();
			if ($this->Category->save($this->request->data)) {
				$this->Session->setFlash(__('The category has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The category could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null){
//        if($this->Category->exists($id)){
//            throw new NotFoundException (__('Id was not found '));
//        }
        if($this->Auth->user('role')=='admin'){
        if(!$id){
            throw new NotFoundException(__('Id was not set'));
        }

        $data=$this->Category->findById($id);
        if(!$data){
            throw new NotFoundException(__('Id was not found in database'));
        }
        
        if($this->request->is('post')|| $this->request->is('put') ){
            if($this->Category->save($this->request->data)){
                $this->Session->setFlash('The data has been edited successfully');
                return $this->redirect(array('action' => 'index'));
                //$this->redirect('index');
            }
            
            else{
                $this->Session->setFlash("The data could not be edited");
                $this->redirect(array('controller'=>'categories','action'=>'index'));
            }
        }
//        else{
//            $options = array('conditions' => array('Category.' . $this->Category->primaryKey => $id));
//			$this->request->data = $this->Category->find('first', $options);
//        }
        $this->request->data=$data;
    }
    else{
        $this->Session->setFlash(__('You do not have right to do this'));
        $this->redirect('index');
    }
   }

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
            if($this->Auth->user('role')=='admin'){
		$this->Category->id = $id;
		if (!$this->Category->exists()) {
			throw new NotFoundException(__('Invalid category'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Category->delete()) {
			$this->Session->setFlash(__('The category has been deleted.'));
		} else {
			$this->Session->setFlash(__('The category could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

else{
    $this->Session->setFlash(__('You do not have access to this feature'));
    $this->redirect(array('controller'=>'categories','action'=>'index'));
}
                }
}