<?php

use yii\helpers\Html;
use yii\grid\GridView;
$baseUrl = Yii::$app->request->baseUrl;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$baseUrl = Yii::$app->request->baseUrl;
$this->title = 'Clearanceentries';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="clearanceentries-index">

    <h1><?= Html::encode($this->title) ?></h1>
<script>
    
</script>
<ul class="breadcrumbs no-padding-top no-padding-bottom no-padding-left">
        <li><a href="../"><span class="icon mif-home fg-kra-red"></span></a></li>
        <li><a href="../">Home</a></li>
        <li><?= $this->title; ?></li>
</ul>

<div class="pure-u-1"></div>

 <table class="table striped hovered" id="dataTables-1">
                <thead>
                <tr>
                    
                    <th class="text-left" width="15%">Student ID</th>
                    <th class="text-left" >Clearance Level Code</th>                   
                    <th class="text-left" width="20%">Department</th>
                    <th class="text-left" width="15%">Clear By Id</th>                    
                </tr>
                </thead>

                <tbody>
                </tbody>
                <?php 
                    foreach($json as $data){
                ?>
                <tr onclick="window.location.href= '<?= $baseUrl; ?>/clearanceentries/clear?code=<?=$data[1]?>&StudentID=<?=urlencode($data[0])?>'">
                
                    <td><?=$data[0]?></td>
                    <td><?=$data[1]?></td>
                    <td><?=$data[2]?></td>
                    <td><?=$data[3]?></td>    
                </tr>
                <?php
                    }
                ?>
                <tfoot>
                <tr>
                    <th colspan="6">&nbsp;</th>
                </tr>
                </tfoot>
            </table>


</div>
