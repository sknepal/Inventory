<?php
App::uses('AppController', 'Controller');

/**
 * Sales Controller
 *
 * @property Sale $Sale
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class SalesController extends AppController
{

    /**
     * Components
     *
     * @var array
     */
    public $helpers = array('Time', 'Javascript', 'Ajax');
    public $components = array('Paginator', 'Session', 'Auth', 'CsvView.CsvView',
        'RequestHandler' => array(
            'viewClassMap' => array('csv' => 'CsvView.Csv')
        )

    );
    var $uses = array('Sale', 'Item');

    /**
     * index method
     *
     * @return void
     */
    public function index()
    {


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
    public function view($id = null)
    {
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
    public function add($id = null)
    {
        if (!$id) {
            throw new NotFoundException(__('Id was not set'));
        }

        $options = array('controller' => 'items', 'conditions' => array('Item.'
        . $this->Sale->Item->primaryKey => $id));
        $remQuantity = $this->Sale->Item->find('first', $options);


        $options = array('controller' => 'items', 'conditions' => array('Item.'
        . $this->Sale->Item->primaryKey => $id));
        $data = $this->Sale->Item->find('list', $options);

        if ($this->request->is('post')) {
            if ($remQuantity['Item']['remaining_quantity'] > $this->request->data['Sale']['quantity']) {
                $this->Sale->create();
                $this->request->data['Sale']['total_price'] =
                    $this->request->data['Sale']['sold_price'] * $this->request->data['Sale']['quantity'];
                $this->Sale->save($this->request->data['Sale']['total_price']);


                $newRemainingQuantity = $remQuantity['Item']['remaining_quantity'] - $this->request->data['Sale']['quantity'];
                $this->Sale->Item->id = $id;
                echo $this->Sale->Item->id;
                if ($this->Sale->save($this->request->data) && $this->Sale->Item->saveField('remaining_quantity', $newRemainingQuantity)) {

                    $this->Session->setFlash(__('The sale has been saved.'));
                    return $this->redirect(array('action' => 'index'));
                } else
                    $this->Session->setFlash(__('The sale could not be saved. Please, try again.'));


            } else {
                $this->Session->setFlash(__('The sold quantity is greater than remaining quantity of items. You cannot sell more than what you have.
				 Please check your entry on the quantity field, or increment the available item quantity.'));

            }
        }


        $this->set('items', $data);

    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null)
    {

        if ($this->Auth->user('role') == 'admin') {
            if (!$this->Sale->exists($id)) {
                throw new NotFoundException(__('Invalid sale'));
            }
            if ($this->request->is(array('post', 'put'))) {
                $newQuantity = $this->request->data['Sale']['quantity'];
                $oldQuantity = $this->Session->read('oldQuantity');
                $options = array('controller' => 'items', 'conditions' => array('Item.'
                . $this->Sale->Item->primaryKey => $this->request->data['Sale']['item_id']));
                $remQuantity = $this->Sale->Item->find('first', $options);
                $this->request->data['Sale']['total_price'] =
                    $this->request->data['Sale']['sold_price'] * $this->request->data['Sale']['quantity'];
                $this->Sale->save($this->request->data['Sale']['total_price']);


                if ($oldQuantity > $newQuantity)
                    $operation = $remQuantity['Item']['remaining_quantity'] + $oldQuantity - $newQuantity;
                else if ($oldQuantity < $newQuantity)
                    $operation = $remQuantity['Item']['remaining_quantity'] - ($newQuantity - $oldQuantity);
                else $operation = $remQuantity['Item']['remaining_quantity'];
                if ($this->request->data['Sale']['quantity'] <= $remQuantity['Item']['total_quantity']) {
                    $this->Sale->Item->id = $this->request->data['Sale']['item_id'];
                    if ($this->Sale->save($this->request->data) && $this->Sale->Item->saveField('remaining_quantity', $operation)) {
                        $this->Session->setFlash(__('The sale has been saved.'));
                        return $this->redirect(array('action' => 'index'));
                    } else {
                        $this->Session->setFlash(__('The sale could not be saved. Please, try again.'));
                    }
                } else {
                    $this->Session->setFlash(__('Please check your entry on the quantity field. It is more than what was assigned at first.'));
                }

            } else {

                $options = array('conditions' => array('Sale.' . $this->Sale->primaryKey => $id));
                $this->request->data = $this->Sale->find('first', $options);
                $this->Session->write('oldQuantity', $this->request->data['Sale']['quantity']);
            }

            $items = $this->Sale->Item->find('list');
            $this->set(compact('items'));
        } else {
            $this->Session->setFlash(__('You do not have access to this. Contact your admin immediately.'));
            $this->redirect(array('controller' => 'sales', 'action' => 'index'));
        }
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null)
    {
        if ($this->Auth->user('role') == 'admin') {
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
        } else {
            $this->Session->setFlash(__('You do not have access to this. Contact your admin immediately.'));
            $this->redirect(array('controller' => 'sales', 'action' => 'index'));
        }
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

            $_extract = array('Item.title', 'Item.total_quantity', 'Item.remaining_quantity', 'Item.price',
                'Sale.quantity', 'Sale.sold_price', 'Sale.total_price', 'Sale.date', 'User.username');

            $_header = array('Item', 'Total Quantity', 'Remaining Quantity', 'Price',
                'Sold Quantity', 'Sold Price', 'Total Sold Amount', 'Sold date',
                'Sold by (username)');

            $_serialize = 'results';
            $this->response->download($from . '--' . $to . '.csv');
            $this->viewClass = 'CsvView.Csv';
            $this->set(compact('results', '_serialize', '_header', '_extract'));


        }
    }

}

