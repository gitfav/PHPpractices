//=========分组统计

count 统计数量
mysql> select count(*) from student;
+----------+
| count(*) |
+----------+
|        7 |
+----------+
1 row in set (0.00 sec)

min () 取最小值

mysql> select min(sid) from student;
+----------+
| min(sid) |
+----------+
|        1 |
+----------+
1 row in set (0.00 sec)

max() 取最大值
mysql> select max(sid) from student;
+----------+
| max(sid) |
+----------+
|        8 |
+----------+
1 row in set (0.00 sec)

//=========

mysql> select * from goods;
+-----+---------+---------+
| gid | gname   | price   |
+-----+---------+---------+
|   1 | surface | 7388.00 |
|   2 | yoga    | 8388.00 |
|   3 | air     | 6988.00 |
+-----+---------+---------+
3 rows in set (0.00 sec)
//计算和
mysql> select sum(price) from goods;
+------------+
| sum(price) |
+------------+
|   22764.00 |
+------------+
1 row in set (0.00 sec)

//求平均数
mysql> select avg(price) from goods;
+-------------+
| avg(price)  |
+-------------+
| 7588.000000 |
+-------------+
1 row in set (0.00 sec)

//=============分组统计
mysql> select * from student;
+-----+----------+------+------+------------+-------+
| sid | username | sex  | age  | birthday   | class |
+-----+----------+------+------+------------+-------+
|   1 | 寺李     | 女   |    1 | 1990-08-09 |     1 |
|   2 | 李磊     | 男   |    1 | 1890-08-09 |    45 |
|   4 | 李克强   | 男   |    1 | 1986-08-09 |    41 |
|   5 | 王涛     | 女   |    1 | 1990-08-09 |    45 |
|   6 | 小明     | 男   |    1 | 1990-08-09 |    41 |
|   7 | 小鬼     | 男   |    1 | 1990-08-09 |    45 |
|   8 | 李彦宏   | 男   |    1 | 1990-08-09 |    45 |
+-----+----------+------+------+------------+-------+
7 rows in set (0.00 sec)

mysql> select class,count(*) from student group by class;
+-------+----------+
| class | count(*) |
+-------+----------+
|     1 |        1 |
|    41 |        2 |
|    45 |        4 |
+-------+----------+
3 rows in set (0.00 sec)

mysql> select class from student where money>10000 group by class having count(*)>=1;
+-------+
| class |
+-------+
|    41 |
|    45 |
+-------+
2 rows in set (0.00 sec)

mysql> select * from student where money>10000 group by class having count(*)>1;

+-----+----------+------+------+------------+-------+-------+
| sid | username | sex  | age  | birthday   | class | money |
+-----+----------+------+------+------------+-------+-------+
|   5 | 王涛     | 女   |    1 | 1990-08-09 |    45 | 18000 |
+-----+----------+------+------+------------+-------+-------+
1 row in set (0.00 sec)



select * from 表明 

//关键字顺序
1,where
2,group by
3,having
4,order by
5,limit