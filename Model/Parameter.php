<?php
App::uses('DocumentationAppModel', 'Documentation.Model');
/**
 * Parameter Model
 *
 * @property Api $Api
 */
class Parameter extends DocumentationAppModel {

	public $belongsTo = array(
		'Ressource' => array(
			'className' => 'Documentation.Ressource'
		)
	);

}
