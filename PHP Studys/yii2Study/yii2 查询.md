where 语句使用

```
//SQL: 'id = 5'
user::find()->where(['id' => 5]);

//SQL: 'id = 5 and name like %wang'
user::find()->where(['and', ['id',5], ['like','name','%wang']]);
 
//或者
$model = user::find()->where(['id' => 5]);
$model->andwhere(['like','name','%wang']);
 
$model->asArray()->all();
```


[原文链接](http://www.yii-china.com/post/detail/8.html "Yii2.0数据库查询应用实例（二）")

where()条件：

$customers = Customer::find()->where($cond)->all(); 

$cond写法举例：
```
// SQL: (type = 1) AND (status = 2).
$cond = ['type' => 1, 'status' => 2] 
 
// SQL:(id IN (1, 2, 3)) AND (status = 2)
$cond = ['id' => [1, 2, 3], 'status' => 2] 
 
//SQL:status IS NULL
$cond = ['status' => null]
```
[[and]]:将不同的条件组合在一起，用法举例：

```
//SQL:`id=1 AND id=2`
$cond = ['and', 'id=1', 'id=2']
 
//SQL:`type=1 AND (id=1 OR id=2)`
$cond = ['and', 'type=1', ['or', 'id=1', 'id=2']]
```
[[or]]:
```
//SQL:`(type IN (7, 8, 9) OR (id IN (1, 2, 3)))`
$cond = ['or', ['type' => [7, 8, 9]], ['id' => [1, 2, 3]]
```
[[not]]:
```
//SQL:`NOT (attribute IS NULL)`
$cond = ['not', ['attribute' => null]]
```
[[between]]: not between 用法相同
```
//SQL:`id BETWEEN 1 AND 10`
$cond = ['between', 'id', 1, 10]
```
[[in]]: not in 用法类似
```
//SQL:`id IN (1, 2, 3)`
$cond = ['in', 'id', [1, 2, 3]]
 
//IN条件也适用于多字段
$cond = ['in', ['id', 'name'], [['id' => 1, 'name' => 'foo'], ['id' => 2, 'name' => 'bar']]]
 
//也适用于内嵌sql语句
$cond = ['in', 'user_id', (new Query())->select('id')->from('users')->where(['active' => 1])]
```
[[like]]:
```
//SQL:`name LIKE '%tester%'`
$cond = ['like', 'name', 'tester']
 
//SQL:`name LIKE '%test%' AND name LIKE '%sample%'`
$cond = ['like', 'name', ['test', 'sample']]
 
//SQL:`name LIKE '%tester'`
$cond = ['like', 'name', '%tester', false]
```
[[exists]]: not exists用法类似
```
//SQL:EXISTS (SELECT "id" FROM "users" WHERE "active"=1)
$cond = ['exists', (new Query())->select('id')->from('users')->where(['active' => 1])]
此外，您可以指定任意运算符如下
 
//SQL:`id >= 10`
$cond = ['>=', 'id', 10]
 
//SQL:`id != 10`
$cond = ['!=', 'id', 10]
```