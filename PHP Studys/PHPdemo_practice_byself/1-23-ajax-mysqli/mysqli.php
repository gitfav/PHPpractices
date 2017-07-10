//显示数据库
show databases;
//创建数据库
create database c45 default charset=utf8;
//使用数据库
use c45;
//删除数据库
drop database if existes c45;

//创建表
create table stu(money tinyint);
//查看所有表
show tables;
//查看某一个表结构
desc 表名;
//插入数据
insert into stu set money=10;
//查看表数据
select * from stu;

deciaml(5,2)//一共5位，小数点后两位
//unsigned == 无符号 sid取值是0~255；
create table stu(sid tinyint unsigned,money deciaml(5,2));

char(10)一共可以存10个字符
create table stu(sid tinyint unsigned,name char(10));

//zerofill 0填充，前面自动补0。
create table stu(sid tinyint(3) zerofill);

//enum 类似radio单选框