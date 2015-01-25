use cake_bbs;
create table courses
(
	id  int(11) NOT NULL AUTO_INCREMENT primary key,
	name varchar(100) DEFAULT NULL, 
	attibut int(11),
	teacher_name varchar(40),
	folder_id int(11),
	user_id int(11),
	is_identify tinyint(1),
	created datetime ,
	modified datetime

);
create table course_user_ships
(
	id  int(11) NOT NULL AUTO_INCREMENT primary key,
	user_id int(11),
	course_id int(11),
	permission int(11),
	created datetime ,
	modified datetime

)
;