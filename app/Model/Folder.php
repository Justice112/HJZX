<?php
class Folder extends AppModel {
	public $scaffold = 'admin';
	public $hasOne = array (
		'Folder' => array(
			’className’ => ’folders’,
			’foreignKey’ => ’parent_folder_id’
		)
	);

}
?>