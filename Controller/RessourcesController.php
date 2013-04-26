<?php
App::uses('DocumentationAppController', 'Documentation.Controller');
/**
 * Ressources Controller
 *
 */
class RessourcesController extends DocumentationAppController {

	public function view($id){
		$this->layout = 'default_sidebar';
		$this->set('data', $this->Ressource->find('first', array(
			'conditions' => array('Ressource.id'=>$id),
			'contain' => array('Parameter', 'Example', 'Group.Version')
		)));
	}

	public function admin_add(){
		$this->layout = 'default_center';
		if($this->request->is('post')){

			unset($this->request->data['Parameter']['#']);
			unset($this->request->data['Example']['#']);

			foreach($this->request->data['Parameter'] as $i => $p){
				if(empty($p['name'])){
					unset($this->request->data['Parameter'][$i]);
				}
			}
			foreach($this->request->data['Example'] as $i => $p){
				if(empty($p['name'])){
					unset($this->request->data['Example'][$i]);
				}
			}

			$this->Ressource->create();
			if($this->Ressource->saveAssociated($this->request->data)){
				$this->redirect($this->Ressource->getViewLink());
			}
		}
		$this->set('groups', $this->Ressource->Group->getListByVersion());
	}

	public function admin_edit($id){
		if(!$this->Ressource->exists($id)){
			throw new NotFoundException(__d('documentation','Group does not exists'));
		}

		$this->layout = 'default_center';
		if($this->request->is('put')){

			unset($this->request->data['Parameter']['#']);
			unset($this->request->data['Example']['#']);

			$parametersToKeep = array();
			foreach($this->request->data['Parameter'] as $i => $p){
				if(!empty($p['name'])){
					$parametersToKeep[] = $p['id'];
				}else{
					unset($this->request->data['Parameter'][$i]);
				}
			}
			$this->Ressource->Parameter->deleteAll(array('Parameter.ressource_id'=>$id, 'NOT'=>array('Parameter.id'=>$parametersToKeep)));

			$examplesToKeep = array();
			foreach($this->request->data['Example'] as $i => $p){
				if(!empty($p['name'])){
					$examplesToKeep[] = $p['id'];
				}else{
					unset($this->request->data['Example'][$i]);
				}
			}
			$this->Ressource->Example->deleteAll(array('Example.ressource_id'=>$id, 'NOT'=>array('Example.id'=>$examplesToKeep)));
			
			if($this->Ressource->saveAssociated($this->request->data)){
				$this->redirect($this->Ressource->getViewLink());
			}
		}
		$this->set('groups', $this->Ressource->Group->getListByVersion());
		$this->request->data = $this->Ressource->find('first', array(
			'conditions' => array('Ressource.id'=>$id),
			'contain' => array('Parameter', 'Example')
		));
	}

	public function admin_delete($id){
		if(!$this->Ressource->exists($id)){
			throw new NotFoundException(__d('documentation','Group does not exists'));
		}

		$this->Ressource->delete($id);
		$this->redirect(array(
			'admin'      => false,
			'plugin'     => 'documentation',
			'controller' => 'versions',
			'action'     => 'index'
		));
	}

}
