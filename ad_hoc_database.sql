drop database if exists winskit;
create database winskit;
use winskit;


drop table if exists role;
create table role(
	role_id int(10) primary key auto_increment,
	role_name varchar(45)
);

insert into role(role_name)values('teacher');
insert into role(role_name)values('student');

drop table if exists users;
create table users(
	user_id int(10) primary key auto_increment,
	user_name varchar(45),
	user_password varchar(45),
	role_id int(10)
);

insert into users(user_name,user_password,role_id)values('teacher','test',1);
insert into users(user_name,user_password,role_id)values('student','test',2);

drop table if exists teacher;
create table teacher(
	teacher_id int(10) primary key auto_increment,
	teacher_name varchar(45),
	teacher_email varchar(45),
	user_id int(10)
);

insert into teacher(teacher_name,teacher_email,user_id)values('nizam','test@test.com',1);

drop table if exists student;
create table student(
	student_id int(10) primary key auto_increment,
	student_name varchar(45),
	student_email varchar(45),
	user_id int(10)
);

insert into student(student_name,student_email,user_id)values('jony','test@test.com',2);

drop table if exists exam;
create table exam(
	exam_id int(10) primary key auto_increment,
	student_id int(10),
	teacher_id int(10),
	result_type_id int(10)
);	

drop table if exists result_type;
create table result_type(
	result_type_id int(10) primary key auto_increment,
	result_type varchar(45)
);

insert into	result_type(result_type)values('pending');
insert into result_type(result_type)values('published');