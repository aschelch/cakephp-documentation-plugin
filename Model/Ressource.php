<?php
App::uses('DocumentationAppModel', 'Documentation.Model');
/**
 * Ressource Model
 *
 * @property Api $Api
 */
class Ressource extends DocumentationAppModel {

	public $displayField = 'url';

	public $belongsTo = array(
		'Group' => array(
			'className' => 'Documentation.Group'
		)
	);

	public $hasMany = array(
		'Parameter' => array(
			'className' => 'Documentation.Parameter',
			'dependent' => true
		),
		'Example' => array(
			'className' => 'Documentation.Example',
			'dependent' => true
		)
	);

	public $validate = array(
		'url' => array(
			'rule' => 'notEmpty',
			'message' => 'Cannot be empty'
		)
	);

	public function beforeSave($options = array()) {
		if(!empty($this->data['Ressource']['url'])){
			$this->data['Ressource']['slug'] = Inflector::slug($this->data['Ressource']['url'], '-');
		}
		return true;
	}

	public function getViewLink($id=null){
		if($id === null){
			$id = $this->id;
		}

		return array(
			'admin'      => false,
			'plugin'     => 'documentation',
			'controller' => 'ressources',
			'action'     => 'view',
			$id
		);
	}
}
