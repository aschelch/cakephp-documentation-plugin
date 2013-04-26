<?php
App::uses('DocumentationAppModel', 'Documentation.Model');
/**
 * Example Model
 *
 * @property Api $Api
 */
class Example extends DocumentationAppModel {

	public $belongsTo = array(
		'Ressource' => array(
			'className' => 'Documentation.Ressource'
		)
	);

}
