<?php
class Course extends AppModel {
	public $scaffold = 'admin';
	public $hasMany = array (
			'CourseUserShip',
			'CourseInfo' ,
			'Post'
	);
}
?>