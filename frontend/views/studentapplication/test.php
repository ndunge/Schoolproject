<?php
use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\Customers;
$connection = Yii::$app->getDb();
$sql = "SELECT C.No_,C.Name,C.Address,C.Phone No_ FROM [CUEA\$Customer] C WHERE C.No_=1029233 "; 
$result = Customers::findBySql($sql)->asArray()->all();

print_r($result);exit;





?>