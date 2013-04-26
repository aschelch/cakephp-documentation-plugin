<?php
App::uses('DocumentationAppModel', 'Documentation.Model');
/**
 * Version Model
 *
 * @property Api $Api
 */
class Version extends DocumentationAppModel {

	public $hasMany = array(
		'Group' => array(
			'className' => 'Documentation.Group',
			'dependent' => true
		)
	);

	public $displayField = 'code';

	public $validate = array(
		'code' => array(
			'notEmpty' => array(
				'rule' => 'notEmpty',
				'message' => 'Cannot be empty'
			),
			'unique' => array(
				'rule' => 'isUnique',
				'message' => 'Already used'
			),
			'format' => array(
				'rule' => '/^[0-9]+(\.[0-9]+){0,2}$/i',
				'message' => 'Wrong version format (X.Y or X.Y.Z)'
			)
		),
		'name' => array(
			'rule' => 'notEmpty',
			'message' => 'Cannot be empty'
		)
	);

	public function getViewLink($id=null){
		if($id === null){
			$id = $this->id;
		}
		return array(
			'admin'      => false,
			'plugin'     => 'documentation',
			'controller' => 'versions',
			'action'     => 'view',
			$id
		);
	}

	public function afterSave($created) {
	    if ($created) {
	        Cache::clearGroup('Version');
	    }
	}

	public function afterDelete() {
	    Cache::clearGroup('Version');
	}
}
