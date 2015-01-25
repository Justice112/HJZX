<?php
class CourseUserShip extends AppModel {
	public $scaffold = 'admin';
	public $belongsTo = array (
			'Course',
			'User' 
	);
}
?>