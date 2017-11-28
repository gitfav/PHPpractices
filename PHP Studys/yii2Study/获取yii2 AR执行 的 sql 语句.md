```php
$model = User::find()->select('count(id) as num , catid')
            ->where(['in','catid',$idsArr])
            ->groupBy('catid');
            
// get the AR raw sql in YII2
$commandQuery = clone $model; //不克隆也可以
echo $commandQuery->createCommand()->getRawSql();
 
$users = $query->asArray()->all();
```