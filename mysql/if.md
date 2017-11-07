* if语句
```
IF(expr1,expr2,expr3)
如果expr1是TRUE，则IF()的返回值为expr2；否则返回值为expr3，IF()的返回值为数字值或字符串
select * ,if(sva=1,"男","女") as ssva from taname where sva!=""
```
* 也可以用case when 语句实现
```
select case sva when 1 then '男' else '女' end as ssva from taname where sva!=""
```
*IFNULL(expr1,expr2)
```
假如expr1 不为 NULL，则 IFNULL() 的返回值为 expr1; 否则其返回值为 expr2。
mysql> SELECT IFNULL(1,0);
        -> 1
        
mysql> SELECT IFNULL(NULL,10);
        -> 10
        
mysql> SELECT IFNULL(1/0,10);
        -> 10
        
mysql> SELECT IFNULL(1/0,'yes');
        -> 'yes'
```
* IF ELSE 做为流程控制语句使用
```
IF search_condition THEN 
    statement_list  
[ELSEIF search_condition THEN]  
    statement_list ...  
[ELSE 
    statement_list]  
END IF 
当IF中条件search_condition成立时，执行THEN后的statement_list语句，
否则判断ELSEIF中的条件，成立则执行其后的statement_list语句，否则继续判断其他分支。当所有分支的条件均不成立时，执行ELSE分支。search_condition是一个条件表达式，
可以由“=、<、<=、>、>=、!=”等条件运算符组成，并且可以使用AND、OR、NOT对多个表达式进行组合。
```