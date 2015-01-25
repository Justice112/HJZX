<?php
class File extends AppModel {
	public $scaffold = 'admin';
	public $hasOne = 'Folder';
}
?>