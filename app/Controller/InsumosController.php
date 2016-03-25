<?php
App::uses('AppController', 'Controller');
/**
 * Insumos Controller
 *
 * @property Insumo $Insumo
 * @property PaginatorComponent $Paginator
 * @property FlashComponent $Flash
 * @property SessionComponent $Session
 */
class InsumosController extends AppController {

/**
 * Components
 *
 * @var array
 */
		public $components = array('RequestHandler','Session');
		public $helpers=array('Html', 'Form', 'Time', 'Js');

/**
 * index method
 *
 * @return void
 */


	  public $paginate = array(
        'limit' => 3,
        'order' => array(
            'Insumo.codigo' => 'asc'
        )
    );
 
	public function index() {
		$this->Insumo->recursive = 0;
		$this->paginate['Insumo']['limit']=3;
		$this->paginate['Insumo']['order']=array('Insumo.codigo'=>'asc');
		$this->set('insumos', $this->paginate());
	}



/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Insumo->exists($id)) {
			throw new NotFoundException(__('Invalid insumo'));
		}
		$options = array('conditions' => array('Insumo.' . $this->Insumo->primaryKey => $id));
		$this->set('insumo', $this->Insumo->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Insumo->create();
			if ($this->Insumo->save($this->request->data)) {
				$this->Flash->success(__('The insumo has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The insumo could not be saved. Please, try again.'));
			}
		}
		$proveedores = $this->Insumo->Proveedore->find('list');
		$this->set(compact('proveedores'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Insumo->exists($id)) {
			throw new NotFoundException(__('Invalid insumo'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Insumo->save($this->request->data)) {
				$this->Flash->success(__('The insumo has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The insumo could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Insumo.' . $this->Insumo->primaryKey => $id));
			$this->request->data = $this->Insumo->find('first', $options);
		}
		$proveedores = $this->Insumo->Proveedore->find('list');
		$this->set(compact('proveedores'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Insumo->id = $id;
		if (!$this->Insumo->exists()) {
			throw new NotFoundException(__('Invalid insumo'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Insumo->delete()) {
			$this->Flash->success(__('The insumo has been deleted.'));
		} else {
			$this->Flash->error(__('The insumo could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
