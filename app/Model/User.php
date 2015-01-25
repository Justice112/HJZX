<?php
class User extends AppModel {
	public $scaffold = 'admin';
	public $hasMany = array (
        'CourseUserShip',
        'Post',
        'Reply'
	);
}
?>