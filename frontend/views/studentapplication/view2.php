<?php

$connection = Yii::$app->getDb();
$sql = "SELECT C.No_,C.Name,C.Address,C.Phone No_ FROM [CUEA\$Customer] C"; 
$result = Customers::findBySql($sql)->asArray()->all();

print_r($result);exit;





?>