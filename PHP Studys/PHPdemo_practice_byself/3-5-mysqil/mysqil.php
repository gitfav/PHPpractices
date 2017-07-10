<?php 

show databases;
show tables;

create database c45 charset=utf8;
use c45;

create table stu(sid );
unique    primary key     as    auto_increment    zerfill     unsigned    enum     set     ...not null default;

drop database if exists c45;
drop table if exists stu;

insert into stu set ....;
insert into stu(...) value(...);

create table c1 like stu;//复制表结构
insert into c1 select * from stu;//复制表数据
create table c1 select * from stu;//创建与stu一样的表结构以及表数据

select ... from stu ...;
order by
limit
group by
sum() count() avg() min() max()
having

as where  and or  like 


 ?>