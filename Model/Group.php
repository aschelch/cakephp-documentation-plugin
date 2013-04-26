<?php
App::uses('DocumentationAppModel', 'Documentation.Model');
/**
 * Group Model
 *
 * @property DocumentationVersion $Version
 */
class Group extends DocumentationAppModel {

	public $belongsTo = array(
		'Version' => array(
			'className' => 'Documentation.Version'
		)
	);

	public $hasMany = array(
		'Ressource' => array(
			'className' => 'Documentation.Ressource',
			'dependent' => true
		)
	);

	public $order = array('Group.name');

	public $validate = array(
		'name' => array(
			'rule' => 'notEmpty',
			'message' => 'Cannot be empty'
		)
	);

	public function beforeSave($options = array()) {
		if(!empty($this->data['Group']['name'])){
			$this->data['Group']['slug'] = Inflector::slug(strtolower($this->data['Group']['name']), '-');
		}
		return true;
	}

	public function getListByVersion(){
		return current(current($this->set('groups', $this->Ressource->Group->find('list',array(
        	'fields' => array('Group.id', 'Group.name', 'Version.name'),
        	'joins' => array(
		        array(
		        	'table' => 'documentation_versions',
		            'alias' => 'Version',
		            'type' => 'INNER',
		            'conditions' => array('Version.id = Group.version_id')
		        )
		    ),
		    'order' => array('Version.id')
    	)))));
	}

}
