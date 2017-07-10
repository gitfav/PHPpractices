//显示数据库
show databases;

//创建数据库c45
create database c45 default charset=utf8;

//使用数据库c45
use c45;

//删除数据库--drop database if exists 数据库名

drop database if exists c45;

//创建表 stu
 create table stu(money tinyint);

 //查看库中所有表
 show tables;

 //查看表结构

 desc 表名

 //插入数据

 insert into stu set money=10;

 //查看表数据

  select * from stu;

  //deciaml(5,2) //一共5位，小数点后两位
  //unsigned ==无符号，sid的取值变为0-255
   create table stu(sid tinyint unsigned,money decimal(5,2));


//char(10) 一共能存10个字符
 create table stu(sid tinyint unsigned,sname char(10));

//zerofill 0填充，前面自动补0
  create table stu(sid tinyint(3) zerofill);

//enum 类似radio单选框

 create table stu(sid tinyint,sex enum('男','女'));

//set 类似checkbox

//default 默认值
插入数据时，如果设置了sname 那么用设置的，没设置用默认值123
create table stu(sid int unsigned,sname char(20) default 123);

//unique 唯一 
 create table stu(sid tinyint unique,sname char(20) default '');
insert into stu set sid=1;
insert into stu set sid=1;//执行第二遍时会报错，因为用unique限定了sid 的唯一性

//primary key 主键

create table stu(sid int unsigned primary key,sname char(20));
insert into stu set sid=1;
insert into stu set sid=1;//主键同时具有唯一性，第二次插入也会报错

//主键 自增
create table stu(sid int unsigned primary key auto_increment,sname char(20));
insert into stu set sname=123;
insert into stu set sname=222;
select * from stu;//自己查看一下 表中sid字段的值

//复制表结构  结构一致，没有数据
create table c1 like stu;

//复制表数据
insert into c1 select * from stu;

创建表同时复制数据  //但是会丢失 主键及自增约束
create table c1 select * from stu;