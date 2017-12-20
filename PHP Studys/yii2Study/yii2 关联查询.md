+ innerJoin()
+ leftJoin()
+ rightJoin()

[官网说明](http://www.yiiframework.com/doc-2.0/guide-db-query-builder.html "查询构建器")
[中文官网说明](http://www.yiichina.com/doc/guide/2.0/db-query-builder "查询构建器")

```php
//官方的教程
$subQuery = (new \yii\db\Query())->from('post');    //post是表名 , 获取这个表的model
 
$query->leftJoin(['u' => $subQuery], 'u.id = author_id');
//你应该将子查询放到一个数组当中，而数组当中的键，则为这个子查询的别名。
```

##### 设置别名的其它方法
```php
//使用 from() 方法覆盖。
$query = Studio::find ();
$query->select('s.name as sname,r.name as pname');
 
$query->from(Studio::tableName() . ' as s');
$query->leftJoin(Region::tableName() . ' as r' , ' r.id = s.province_id');
```
或者
```php
Post::find()
    ->alias('t')                        //直接设置别名
    ->joinWith(['c' => 'customer']);    //默认值为LEFT JOIN
```