<?php

use yii\helpers\Html;

$baseUrl = Yii::$app->request->baseUrl;
$identity = Yii::$app->user->identity;
if (empty($identity)) {
    Yii::$app->getResponse()->redirect($baseUrl . '/site/index');
}

/* @var $this yii\web\View */
/* @var $model app\models\Institution */

$this->title = 'New Application';
$this->params['breadcrumbs'][] = $this->title;
?>
    <div class="pure-u-1"></div>
<?= $this->render('_form', [
        'model' => $model,
        
         
         'json1'=> $json1,
         'json2'=> $json2,
        
        
        
        
    ]) ?>