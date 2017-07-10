


1,随机显示2篇文章
	mysql> create table xhh( sid tinyint unsigned primary key auto_increment,title char(30),content text
	);
	insert into xhh set title='中东欧',content='得分哈佛哈佛PHP';
	select*from xhh order by rand() limit 2;
2,查找所有姓李的同学
	select * from stu where sname like '李%';
3,查找文章中包含PHP的文章
	select * from xhh where content like '%PHP%';

4,向学生表stu中录制10条记录
	insert into stu set sname='',age=12;
5,将年龄小于20岁的同学，年龄加1岁
	<!-- select age,if(age<20,age+1,age) from xh; -->
	<!-- select age,if(age<20,updata set age=age+1,updata set age) from xh; -->
	<!-- update stu set sname='老头' where age=88; -->
	update stu set age=age+1 where age<20;
6,删除年龄最大的同学
	select * from xh order by age desc;
	delete from xh where sid=12;

	select * from stu order by age desc limit 1,5;
	从查询出记录的第1条开始取（序号是从0开始的）取5条

	delect from xh order by age desc limit 1;
7,修改学生日记表title字段长度为char(100)
	alter table xh modify title char(100)
8,修改学生姓名字段为username char(30)
alter table xh change username age tinyint unsigned;



select * from xh where class='c45' 
