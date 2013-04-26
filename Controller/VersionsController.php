<?php
App::uses('DocumentationAppController', 'Documentation.Controller');
/**
 * Versions Controller
 *
 */
class VersionsController extends DocumentationAppController {
 

	public function index(){
		$this->layout = 'default';
		$this->set('versions', $this->Version->find('all'));
	}	

	public function view($id){
		if(!$this->Version->exists($id)){
			throw new NotFoundException(__d('documentation','Version does not exists'));
		}
		
		$this->layout = 'default_sidebar';
		$this->set('version', $this->Version->find('first', array(
			'conditions' => array('Version.id' => $id),
			'contain' => array('Group'=>array('Ressource'))
		)));
	}


	public function admin_add(){
		$this->layout = 'default_center';
		if($this->request->is('post')){
			$this->Version->create($this->request->data);
			if($this->Version->save()){
				$this->redirect($this->Version->getViewLink());
			}
		}
	}


	public function admin_edit($id){
		if(!$this->Version->exists($id)){
			throw new NotFoundException(__d('documentation','Version does not exists'));
		}

		$this->layout = 'default_center';
		if($this->request->is('put')){
			if($this->Version->save($this->request->data)){
				$this->redirect($this->Version->getViewLink());
			}
		}
		$this->request->data = $this->Version->findById($id);
	}

	public function admin_delete($id){
		if(!$this->Version->exists($id)){
			throw new NotFoundException(__d('documentation','Version does not exists'));
		}

		$this->Version->delete($id);
		$this->redirect(array(
			'admin'      => false,
			'plugin'     => 'documentation',
			'controller' => 'versions',
			'action'     => 'index'
		));
	}

}
