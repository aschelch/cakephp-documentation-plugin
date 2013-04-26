<?php
App::uses('AppModel', 'Model');
/**
 * DocumentationApp Model
 *
 */
class DocumentationAppModel extends AppModel {

	public $tablePrefix = 'documentation_';

	public $actsAs = array('Containable');

	public $recursive = -1;

}
