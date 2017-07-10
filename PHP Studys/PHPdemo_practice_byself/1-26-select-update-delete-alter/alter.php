修改表名
alter table 表名 rename 新表名

alter table stu rename s;

修改字段同时更名

1,alter table 表名 modify 字段名 存储类型

2,alter table 表名 change 旧字段 新字段 存储类型 [ first | after 字段]

alter table s change name sname;

========first==========
mysql> alter table s change age age tinyint unsigned first;
Query OK, 7 rows affected (0.03 sec)
Records: 7  Duplicates: 0  Warnings: 0

mysql> select * from s;
+------+-----+--------+---------------------+
| age  | sid | name   | date                |
+------+-----+--------+---------------------+
|   28 |  10 | 李四   | 1998-01-09 00:00:00 |
|   26 |  11 | 张小三 | 2001-01-08 00:00:00 |
|   88 |  13 | 老头   | 2001-01-08 00:00:00 |
| NULL |  14 | 222    | 2001-01-08 00:00:00 |
| NULL |  15 | 123    | 2001-01-08 00:00:00 |
| NULL |  16 | NULL   | 2001-01-08 00:00:00 |
| NULL |  17 | 333    | 2001-01-08 00:00:00 |

==========after==========
mysql> alter table s change age age tinyint unsigned after name;
Query OK, 7 rows affected (0.03 sec)
Records: 7  Duplicates: 0  Warnings: 0

mysql> select * from s;
+-----+--------+------+---------------------+
| sid | name   | age  | date                |
+-----+--------+------+---------------------+
|  10 | 李四   |   28 | 1998-01-09 00:00:00 |
|  11 | 张小三 |   26 | 2001-01-08 00:00:00 |
|  13 | 老头   |   88 | 2001-01-08 00:00:00 |
|  14 | 222    | NULL | 2001-01-08 00:00:00 |
|  15 | 123    | NULL | 2001-01-08 00:00:00 |
|  16 | NULL   | NULL | 2001-01-08 00:00:00 |
|  17 | 333    | NULL | 2001-01-08 00:00:00 |
+-----+--------+------+---------------------+

//======追加字段
alter table 表名 add 字段 存储类型 [first | after 字段]

alter table s add class char(20) after name;

//======删除字段

Alter table 表名 drop 字段名

alter table s drop date;

//=======删除主键=======

例： alter table hd drop primary key;删除主键

alter table s drop primary key;
//当该字段有自增属性时 无法删除主键，
//需先去掉自增属性  alter table s modify 字段名 存储类型（不写auto_increment）就去掉了自增

//=========添加主键=========
例： alter table cb add primary key (id);添加主键id

alter table s add primary key(sid);