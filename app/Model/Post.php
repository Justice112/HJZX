<?php
class Post extends AppModel {
	public $scaffold = 'admin';
	public $belongsTo = array(
        'Course',
        'User'
    );
	public $hasMany = 'Reply';
}
?>