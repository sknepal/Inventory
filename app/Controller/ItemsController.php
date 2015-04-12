<?php
App::uses('AppController', 'Controller');
/**
 * Items Controller
 *
 * @property Item $Item
 * @property PaginatorComponent $Paginator
 */
class ItemsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator','Session');
        // public $components=array('Session');

/**
 * index method
 *
 * @return void
 */
        public function calculate(){
            
        }
	
        public function index($id=null) {
		//$this->Item->recursive = 0;
		//$this->set('items', $this->Paginator->paginate());
                
                
                $data = $this -> Item->find('all',array('order' => 'created',
            'conditions'=>array('category_id LIKE'=>'%'.$id .'%')));
                $info = array(
            'items'=>$data
            
        );
        $this->set($info);
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Item->exists($id)) {
			throw new NotFoundException(__('Invalid item'));
		}
		$options = array('conditions' => array('Item.' . $this->Item->primaryKey => $id));
		$this->set('item', $this->Item->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Item->create();
			if ($this->Item->save($this->request->data)) {
				$this->Session->setFlash(__('The item has been saved.'));
				return $this->redirect(array('controller'=>'categories','action'=>'index'));
			} else {
				$this->Session->setFlash(__('The item could not be saved. Please, try again.'));
			}
		}
               
		$categories = $this->Item->Category->find('list',array('order'=>'name'));
		$this->set(compact('categories'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Item->exists($id)) {
			throw new NotFoundException(__('Invalid item'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Item->save($this->request->data)) {
				$this->Session->setFlash(__('The item has been saved.'));
				return $this->redirect(array('controller'=>'categories',
                                    'action' => 'index'));
			} else {
				$this->Session->setFlash(__('The item could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Item.' . $this->Item->primaryKey => $id));
			$this->request->data = $this->Item->find('first', $options);
		}
		$categories = $this->Item->Category->find('list');
		$this->set(compact('categories'));
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
		$this->Item->id = $id;
		if (!$this->Item->exists()) {
			throw new NotFoundException(__('Invalid item'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Item->delete()) {
			$this->Session->setFlash(__('The item has been deleted.'));
		} else {
			$this->Session->setFlash(__('The item could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('controller'=>'categories', 'action' => 'index'));
	}
        else{
            $this->Session->setFlash(__('You do not have access to this feature'));
            $this->redirect(array('controller'=>'categories','action'=>'index'));
        }
        }
        
        public function search($search=null){
            if(!$search){
                $data=$this->Item->find('all',
                        array('order'=>'modified'));
            }
            else
            {
                $data=$this->Item->find('all',
                        array('order'=>'modified',
                            'conditions'=>array('title LIKE'=>'%'.$search.'%')));
            }
            $info=array('items'=>$data);
            $this->set($info);
            $this->render('index');
            
            
        }
}
