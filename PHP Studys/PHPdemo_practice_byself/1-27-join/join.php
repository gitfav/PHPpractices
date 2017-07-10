// 一对一
//1 谁记录谁都可以

城市表

cid       city        zid
1         北京         1
2         哈尔滨       2
3         沈阳         3
4         齐齐哈尔     4
5         大连         5


区号表
zid          zone      cid
1            010        1
2            0451       2
3            021        3
4            0452       4
5            0789       5

city     zone 
北京     010
哈尔滨   0451


//============== 一 对 多 ===================
学生记录班级  ==== 即 多的记录少的

班级表

cid    classname      teacher    room
1        c45           laozhou    1809
2        c43           xiaoma     1726
3        c41           laosun    


//错误的
cid    classname      teacher    room    sid
1        c45           laozhou    1809   1
1        c45           laozhou    1809   2
1        c45           laozhou    1809   3
1        c45           laozhou    1809   1
2        c43           xiaoma     1726
3        c41           laosun    


学生表

sid     sname         sex     age    phone        cid
1       蓝枫          男      28     18500023     1
2       王涛          女      27     3456789      1
3       金贞          女      23     1232114123   1
4       李东庆        男      22     12323412     3 
5       王攀          男      21      123456      3
6       王磊          男      20     123452341    3


//============ 多对多 ================

学生表
sid     sname         sex     age    phone        
1       蓝枫          男      28     18500023     
2       王涛          女      27     3456789      
3       金贞          女      23     1232114123   
4       李东庆        男      22     12323412      
5       王攀          男      21      123456      
6       王磊          男      20     123452341    



课程表

lid     lname
1       php
2       html
3       css
4       jq
5       js
6       mysql

//中间表
sid         lid    
1            1
1            2
1            4
3            5
3            4


// 多表查询

内连接  (inner) join

1,select * from city join zone on city.zid=zone.zid;

//关联 表时 使用别名
mysql> select * from city as c inner join zone as z on c.zid = z.zid;
+-----+----------+------+-----+-------+
| cid | city     | zid  | zid | zname |
+-----+----------+------+-----+-------+
|   1 | 北京     |    1 |   1 | 10    |
|   2 | 上海     |    2 |   2 | 21    |
|   3 | 哈尔滨   |    3 |   3 | 451   |
|   4 | 齐齐哈尔 |    4 |   4 | 452   |
+-----+----------+------+-----+-------+
4 rows in set (0.00 sec)

//自连接  

例：查到和李磊同班的同学

1，子查询
select * from student where class=( select class from student where usern
ame='李磊');
+-----+----------+------+------+------------+-------+-------+
| sid | username | sex  | age  | birthday   | class | money |
+-----+----------+------+------+------------+-------+-------+
|   2 | 李磊     | 男   |    1 | 1890-08-09 |    45 |  9000 |
|   5 | 王涛     | 女   |    1 | 1990-08-09 |    45 | 18000 |
|   7 | 小鬼     | 男   |    1 | 1990-08-09 |    45 |  7000 |
|   8 | 李彦宏   | 男   |    1 | 1990-08-09 |    45 |  6500 |
|   9 | 徐天晴   | NULL | NULL | NULL       |    45 | 12000 |
+-----+----------+------+------+------------+-------+-------+

2，自连接

mysql> select s2.username,s1.username from student s1 join student s2 on s1.class=s2.class where s1.username ='李磊';
+----------+----------+
| username | username |
+----------+----------+
| 李磊     | 李磊     |
| 王涛     | 李磊     |
| 小鬼     | 李磊     |
| 李彦宏   | 李磊     |
| 徐天晴   | 李磊     |
+----------+----------+
5 rows in set (0.00 sec)
