<?php
App::uses('AppController', 'Controller');
/**
 * Sales Controller
 *
 * @property Sale $Sale
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class SalesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session','Auth');
        public $helpers= array('GChart.GChart');
/**
 * index method
 *
 * @return void
 */
	public function index() {
            
                
		$this->Sale->recursive = 0;
		$this->set('sales', $this->Paginator->paginate());
                
                $data = array(
  'labels' => array(
    array('string' => 'Sample'),
    array('number' => 'Piston 1'),
    array('number' => 'Piston 2')
  ),
  'data' => array(
    array('S1', 74.01, 74.03),
    array('S2', 74.05, 74.04),
    array('S3', 74.03, 74.01),
    array('S4', 74.00, 74.02),
    array('S5', 74.12, 74.05),
    array('S6', 74.04, 74.04),
    array('S7', 74.05, 74.06),
    array('S8', 74.03, 74.02),
    array('S9', 74.01, 74.03),
    array('S10', 74.04, 74.01),
  ),
  'title' => 'Pie Chart',
  'type' => 'pie'
);
                $this->set('data',$data);
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Sale->exists($id)) {
			throw new NotFoundException(__('Invalid sale'));
		}
		$options = array('conditions' => array('Sale.' . $this->Sale->primaryKey => $id));
		$this->set('sale', $this->Sale->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add($id=null) {
            if(!$id){
                throw new NotFoundException(__('Id was not set'));
            }
            
           //$data=$this->Sale->Item->findById($id);
		if ($this->request->is('post')) {
			$this->Sale->create();
			if ($this->Sale->save($this->request->data)) {
				$this->Session->setFlash(__('The sale has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The sale could not be saved. Please, try again.'));
			}
		}
                else{
//
                  $options = array('controller'=>'items','conditions' => array('Item.'
                                                 . $this->Sale->Item->primaryKey => $id));
		$data = $this->Sale->Item->find('list', $options);
//                  
//                        $options = array('conditions' => array('Category.' . $this->Category->primaryKey => $id));
//			$this->request->data = $this->Category->find('first', $options);
                        }
                //$items = $this->Sale->Item->find('list');
		//$users = $this->Sale->User->find('list');
                //$overall=array($data,$uid);
                  //      $this->set('items', $data);
               // $items = $this->Sale->Item->find('list');
                $this->set('items',$data);
		//$this->redirect(array('controller'=>'items','action'=>'calculate'));
		//$categories = $this->Sale->Category->find('list');
		
		//$this->set(compact('users', 'categories', 'items','data'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Sale->exists($id)) {
			throw new NotFoundException(__('Invalid sale'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Sale->save($this->request->data)) {
				$this->Session->setFlash(__('The sale has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The sale could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Sale.' . $this->Sale->primaryKey => $id));
			$this->request->data = $this->Sale->find('first', $options);
		}
		//$users = $this->Sale->User->find('list');
		//$categories = $this->Sale->Category->find('list');
		//$items = $this->Sale->Item->find('list');
		//$this->set(compact('users', 'categories', 'items'));
                //$this->set('items',$this->Sale->Item->find('list'));
                $items = $this->Sale->Item->find('list');
		$this->set(compact('items'));
                }

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Sale->id = $id;
		if (!$this->Sale->exists()) {
			throw new NotFoundException(__('Invalid sale'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Sale->delete()) {
			$this->Session->setFlash(__('The sale has been deleted.'));
		} else {
			$this->Session->setFlash(__('The sale could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
