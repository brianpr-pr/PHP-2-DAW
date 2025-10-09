drop database if exists tasks_app;
create database if exists tasks_app;
use tasks_app;

create table task (
id int PRIMARY KEY,
name varchar(100),
description varchar(255)
);

insert task values (
    1,"Write","Writting an article"
),
(2,"Read", "Reading an article");