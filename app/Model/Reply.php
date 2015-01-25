<?php
class Reply extends AppModel {
	public $scaffold = 'admin';
	public $belongsTo = array('Post','User');
}
?>