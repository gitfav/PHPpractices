//查询全部列的内容
1,select * from stu;

//查询指定列
mysql> select sname,age from s;
+-------+------+
| sname | age  |
+-------+------+
| yu    |   19 |
| hu    |   20 |
| duo   |   21 |
+-------+------+
3 rows in set (0.00 sec)


2，别名关键字 as  （as 可以省略） 
select sname as name from s;

select sname  name from s; 
+------+
| name |
+------+
| yu   |
| hu   |
| duo  |
+------+

3,where 增加筛选条件
取出年龄小于20 的学生
mysql> select * from s where age<20;
+-----+-------+------+------+
| sid | sname | sex  | age  |
+-----+-------+------+------+
|   1 | yu    | 1    |   19 |
+-----+-------+------+------+
1 row in set (0.00 sec)

4, and or

mysql> select * from s where age>=20 and sname='hu';
+-----+-------+------+------+
| sid | sname | sex  | age  |
+-----+-------+------+------+
|   2 | hu    | 0    |   20 |
+-----+-------+------+------+
1 row in set (0.00 sec)

mysql> select * from s where age>=20 or sname='yu';
+-----+-------+------+------+
| sid | sname | sex  | age  |
+-----+-------+------+------+
|   1 | yu    | 1    |   19 |
|   2 | hu    | 0    |   20 |
|   3 | duo   |      |   21 |
+-----+-------+------+------+
3 rows in set (0.00 sec)

5,//所有记录都会出来，因为 右边表达式永远是true
mysql> select * from s where age<=18 or 1=1;
+-----+-------+------+------+
| sid | sname | sex  | age  |
+-----+-------+------+------+
|   1 | yu    | 1    |   19 |
|   2 | hu    | 0    |   20 |
|   3 | duo   |      |   21 |
+-----+-------+------+------+
3 rows in set (0.00 sec)

6,字符串链接 concat();
mysql> select concat('c45',sname) from s;
+---------------------+
| concat('c45',sname) |
+---------------------+
| c45yu               |
| c45hu               |
| c45duo              |
+---------------------+
3 rows in set (0.00 sec)

//==============链接后 起别名=========
mysql> select concat('c45',sname) as c45_s from s;
+--------+
| c45_s  |
+--------+
| c45yu  |
| c45hu  |
| c45duo |
+--------+
3 rows in set (0.00 sec)

7，字段自身比较  如果条件成立，那么值为1 不成立值为0
mysql> select age ,age >20 as bigage from s;
+------+--------+
| age  | bigage |
+------+--------+
|   19 |      0 |
|   20 |      0 |
|   21 |      1 |
+------+--------+
3 rows in set (0.00 sec)

8,去掉重复
============表中数据
mysql> select * from s;
+-----+-------+------+------+
| sid | sname | sex  | age  |
+-----+-------+------+------+
|   1 | yu    | 1    |   19 |
|   2 | hu    | 0    |   20 |
|   3 | duo   |      |   21 |
|   4 | yu    | 1    |   21 |
+-----+-------+------+------+
4 rows in set (0.00 sec)

==============去重之后============只有 一个 yu
mysql> select distinct sname from s;
+-------+
| sname |
+-------+
| yu    |
| hu    |
| duo   |
+-------+
3 rows in set (0.00 sec)

9,查找set类型字段
create table new(title varchar(50),flag set('热门','推荐','图文'));

//========1,find_in_set()
mysql> Select * from new where find_in_set('推荐' ,flag);
+-------+-----------+
| title | flag      |
+-------+-----------+
| 111   | 推荐      |
| 222   | 推荐,图文 |
+-------+-----------+
2 rows in set (0.00 sec)
//=========2,Select * from news where flag &4(了解即可，不用深究)

//=========3,Select * from news where flag like ‘%置顶%’
//查询flag 字段中 有图文的记录
mysql> select * from new where flag like '%图文%';
+-------+-----------+
| title | flag      |
+-------+-----------+
| 222   | 推荐,图文 |
| 333   | 图文      |
+-------+-----------+
2 rows in set (0.00 sec)

//=========4,mysql> select * from new where flag='推荐,图文';

mysql> select * from new where flag='推荐,图文';
+-------+-----------+
| title | flag      |
+-------+-----------+
| 222   | 推荐,图文 |
+-------+-----------+
1 row in set (0.00 sec)

10,=====查找 字段值是null 的

mysql> select * from new;
+-------+-----------+
| title | flag      |
+-------+-----------+
| 111   | 推荐      |
| 222   | 推荐,图文 |
| 333   | 图文      |
| NULL  | 热门,图文 |
+-------+-----------+
4 rows in set (0.00 sec)

mysql> select * from new where title is null;
+-------+-----------+
| title | flag      |
+-------+-----------+
| NULL  | 热门,图文 |
+-------+-----------+
1 row in set (0.00 sec)


、、============if(表达式，值1，值2）当表达式成立时返回值1，否则返回值2
mysql> select age,if(age>21,"大","小") from stu
+------+----------------------+
| age  | if(age>21,"大","小") |
+------+----------------------+
|   19 | 小                   |
|   20 | 小                   |
|   21 | 小                   |
|   22 | 大                   |
|   23 | 大                   |
+------+----------------------+
5 rows in set (0.00 sec)

============ifnull(字段,值) 如果字段值为null,返回值
mysql> select age,ifnull(age,"空") from stu;
+------+------------------+
| age  | ifnull(age,"空") |
+------+------------------+
|   19 | 19               |
|   20 | 20               |
|   21 | 21               |
|   22 | 22               |
|   23 | 23               |
| NULL | 空               |
+------+------------------+
6 rows in set (0.00 sec)

、、=================order by 排序默认升序

mysql> select * from stu order by age
+-----+----------+------+
| sid | sname    | age  |
+-----+----------+------+
|   6 | 111      | NULL |
|   9 | c45_l3   |    9 |
|   7 | c45_ll   |   11 |
|   8 | c45_l2   |   12 |
|   1 | yu       |   19 |
|   2 | duoduo   |   20 |
|   3 | tianqing |   21 |
|   4 | wangning |   22 |
|   5 | lanfeng  |   23 |
+-----+----------+------+
9 rows in set (0.00 sec)

===============desc 降序排列
mysql> select * from stu order by age desc;
+-----+----------+------+
| sid | sname    | age  |
+-----+----------+------+
|   5 | lanfeng  |   23 |
|   4 | wangning |   22 |
|   3 | tianqing |   21 |
|   2 | duoduo   |   20 |
|   1 | yu       |   19 |
|   8 | c45_l2   |   12 |
|   7 | c45_ll   |   11 |
|   9 | c45_l3   |    9 |
|   6 | 111      | NULL |
+-----+----------+------+
9 rows in set (0.00 sec)

==============asc 升序排列 ===========
mysql> select * from stu order by age asc;
+-----+----------+------+
| sid | sname    | age  |
+-----+----------+------+
|   6 | 111      | NULL |
|   9 | c45_l3   |    9 |
|   7 | c45_ll   |   11 |
|   8 | c45_l2   |   12 |
|   1 | yu       |   19 |
|   2 | duoduo   |   20 |
|   3 | tianqing |   21 |
|   4 | wangning |   22 |
|   5 | lanfeng  |   23 |
+-----+----------+------+
9 rows in set (0.02 sec)

、、============limit(n) 取出部分数据记录
select * from stu order by age desc limit 1;

、、============limit(m,n) 取出从m开始的n条数据， m以0开始记数
 select * from stu order by age desc limit 1,5;

 从查询出记录的第1条开始取（序号是从0开始的）取 5条


//============between 值1 and 值2在值1与值2区间内检索内容
 
 mysql> select * from stu where age between 19 and 21;
+-----+----------+------+
| sid | sname    | age  |
+-----+----------+------+
|   1 | yu       |   19 |
|   2 | duoduo   |   20 |
|   3 | tianqing |   21 |
+-----+----------+------+
3 rows in set (0.00 sec)

//============In(值1,值2....) 检测检索值是否在in表达式指定的值当中

mysql> select * from stu where age=12 or age=22 or age=20;
+-----+----------+------+
| sid | sname    | age  |
+-----+----------+------+
|   2 | duoduo   |   20 |
|   4 | wangning |   22 |
|   8 | c45_l2   |   12 |
+-----+----------+------+
3 rows in set (0.00 sec)

mysql> select * from stu where age in(12,20,22);
+-----+----------+------+
| sid | sname    | age  |
+-----+----------+------+
|   2 | duoduo   |   20 |
|   4 | wangning |   22 |
|   8 | c45_l2   |   12 |
+-----+----------+------+
3 rows in set (0.00 sec)


//=============like
1,查找姓李的同学

mysql> select * from stu where sname like '李%';
+-----+--------+------+
| sid | sname  | age  |
+-----+--------+------+
|   1 | 李四   |   19 |
|   2 | 李新风 |   20 |
|   3 | 李丽   |   21 |
+-----+--------+------+
3 rows in set (0.00 sec)

2，查找以李结尾的同学
mysql> select * from stu where sname like '%李';
+-----+-------+------+
| sid | sname | age  |
+-----+-------+------+
|   4 | 桃李  |   22 |
+-----+-------+------+
1 row in set (0.00 sec)

3,查找名字当中 包含李的同学
mysql> select * from stu where sname like '%李%';
+-----+--------+------+
| sid | sname  | age  |
+-----+--------+------+
|   1 | 李四   |   19 |
|   2 | 李新风 |   20 |
|   3 | 李丽   |   21 |
|   4 | 桃李   |   22 |
|   5 | 桃李杏 |   23 |
+-----+--------+------+
5 rows in set (0.00 sec)

//===========left从左侧取字符串
截取学生名字的前两位
mysql> select left(sname,2) as lname from stu;
+-------+
| lname |
+-------+
| 李四  |
| 李新  |
| 李丽  |
| 桃李  |
| 桃李  |
| 11    |
| c4    |
| c4    |
| c4    |
+-------+

//============mid 从中间取字符串,参数２为起始字符参数３为长度
从中间截取  第一个参数 从几号开始（起始值1），第二个参数 截几位
mysql> select mid(sname,2,2) from stu
+----------------+
| mid(sname,2,2) |
+----------------+
| 四             |
| 新风           |
| 丽             |
| 李             |
| 李杏           |
| 11             |
| 45             |
| 45             |
| 45             |
+----------------+
9 rows in set (0.00 sec)

//==============rand()随机数
//随机找两个同学
mysql> select * from stu order by rand() limit 2;
+-----+--------+------+
| sid | sname  | age  |
+-----+--------+------+
|   7 | c45_ll |   11 |
|   6 | 111    | NULL |
+-----+--------+------+
2 rows in set (0.00 sec)


