<?php
App::uses('DocumentationAppController', 'Documentation.Controller');
/**
 * Groups Controller
 *
 */
class GroupsController extends DocumentationAppController {

	public $layout = 'default';

	public function admin_add(){
		$this->layout = 'default_center';
		if($this->request->is('post')){
			$this->Group->create($this->request->data);
			if($this->Group->save()){
				$this->redirect($this->Group->Version->getViewLink($this->request->data['Group']['version_id']));
			}
		}
		$this->set('versions', $this->Group->Version->find('list'));
	}


	public function admin_edit($id){
		if(!$this->Group->exists($id)){
			throw new NotFoundException(__d('documentation','Group does not exists'));
		}

		$this->layout = 'default_center';
		if($this->request->is('put')){
			if($this->Group->save($this->request->data)){
				$this->redirect($this->Group->Version->getViewLink($this->request->data['Group']['version_id']));
			}
		}
		$this->set('versions', $this->Group->Version->find('list'));
		$this->request->data = $this->Group->findById($id);
	}

	public function admin_delete($id){
		if(!$this->Group->exists($id)){
			throw new NotFoundException(__d('documentation','Group does not exists'));
		}

		$version_id = $this->Group->field('version_id');

		$this->Group->delete($id);
		$this->redirect(array(
			'admin'      => false,
			'plugin'     => 'documentation',
			'controller' => 'versions',
			'action'     => 'view',
			$version_id
		));
	}

}
