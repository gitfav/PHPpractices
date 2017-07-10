// 获得当前日期
select curdate();
获得当前时间
curtime()
获得当前的日期与时间
now()


//date() 获取日期
mysql> select date(times) from article;
+-------------+
| date(times) |
+-------------+
| 2015-01-27  |
| 2015-01-27  |
| 2015-01-27  |
| 2015-01-27  |
+-------------+
4 rows in set (0.00 sec)

//
time() 获得时间
year() 年
month() 月
day() 获得天
hour() 时
minute() 分
second() 秒

//时间格式可以像数字一样直接比较
mysql> select * from student where birthday>'1990-01-01' and sex='女';
+-----+----------+------+------+------------+
| sid | username | sex  | age  | birthday   |
+-----+----------+------+------+------------+
|   1 | 寺李     | 女   |    1 | 1990-08-09 |
|   5 | 王涛     | 女   |    1 | 1990-08-09 |
+-----+----------+------+------+------------+
2 rows in set (0.00 sec)