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
	public $helpers = array( 'Time','Javascript', 'Ajax');
	public $components = array('Paginator', 'Session','Auth', 'CsvView.CsvView',
		'RequestHandler' => array(
			'viewClassMap' => array('csv' => 'CsvView.Csv')
		)

	);
        var $uses = array('Sale', 'Item');
       // public $helpers= array('GChart.GChart');
/**
 * index method
 *
 * @return void
 */
	public function index() {
            
                
		$this->Sale->recursive = 0;
		$this->set('sales', $this->Paginator->paginate());
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
                        $this->request->data['Sale']['total_price']=
                             $this->request->data['Sale']['sold_price']*$this->request->data['Sale']['quantity'];
                        $this->Sale->save($this->request->data['Sale']['total_price']);
                        
//                        $this->request->data['Item']['total_quantity']=
//                        $this->request->data['Item']['total_quantity']-$this->request->data['Sale']['quantity'];
//                        $this->Item->save($this->request->data['Item']['total_quantity']);
                        
			 if($this->Sale->save($this->request->data)) {
                          //      calculate($this->request->data['Sale']['quantity']);
				$this->Session->setFlash(__('The sale has been saved.'));
				return $this->redirect(array('action' => 'index'));
                         }
                         else
				$this->Session->setFlash(__('The sale could not be saved. Please, try again.'));
			
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
//        public function calculate($quantity){
//            
//            $total= $this->Item->find('list');
//            $this->Item->save($this->request->data['Item']['total_quantity'])=
//                    $this->request->data['Item']['total_quantity'] - $quantity;
//            
//        }
	public function edit($id = null) {
		if (!$this->Sale->exists($id)) {
			throw new NotFoundException(__('Invalid sale'));
		}
		if ($this->request->is(array('post', 'put'))) {
                    $this->request->data['Sale']['total_price']=
                             $this->request->data['Sale']['sold_price']*$this->request->data['Sale']['quantity'];
                        $this->Sale->save($this->request->data['Sale']['total_price']);
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



	public function export()
	{
		if ($this->request->is(array('post', 'put'))) {
			$from = date($this->request->data(from));
			$to = date($this->request->data(to));
			if ($to == null) $to = date("Y-m-d");
			if ($from == null) $from = date("Y-m-d", strtotime('-30 day'));
			$conditions = array(
				'conditions' => array(
					'date(Sale.date) BETWEEN ? AND ?' => array($from, $to),
				));
			$results = $this->Sale->find('all', $conditions);
                        //$total=mysql_query("SELECT * FROM table1", $link);
                       
			$_extract = array('Item.title', 'Item.total_quantity', 'Item.remaining_quantity', 'Item.price',
				'Sale.quantity', 'Sale.sold_price', 'Sale.total_price', 'Sale.date', 'User.username',
                            'sum(Sale.total_price)');

			$_header = array('Item','Total Quantity', 'Remaining Quantity', 'Price',
				'Sold Quantity', 'Sold Price', 'Total Sold Amount', 'Sold date',
                            'Sold by (username)','Total price sum');

			$_serialize = 'results';
			$this->response->download($from . '--' . $to .'.csv');
			$this->viewClass = 'CsvView.Csv';
			$this->set(compact('results' ,'_serialize', '_header', '_extract'));


		}
	}

}

