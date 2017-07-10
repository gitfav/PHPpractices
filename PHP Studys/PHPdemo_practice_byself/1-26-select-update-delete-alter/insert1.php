向表中插入记录
例： insert into stu(sname,age) values('张三',28),('李四',26),('王二麻子',22);
mysql> select * from stu;
+-----+----------+------+
| sid | sname    | age  |
+-----+----------+------+
|  10 | 张三     |   28 |
|  11 | 李四     |   26 |
|  12 | 王二麻子 |   22 |
+-----+----------+------+
3 rows in set (0.00 sec)

//==========replace===========

//如果主键sid 不存在13，执行插入操作。主键存在sid=13 执行修改操作
replace into stu (sid,sname,age) values(13,'查看变化',88);

//=========update 更新操作===========
注意：要加where条件，否则会更新表中全部数据
mysql> update stu set sname='老头' where age=88;

//=========delete 删除操作============
注意：要加where条件,否则会删除表中全部数据
delete from stu where sid=12;





