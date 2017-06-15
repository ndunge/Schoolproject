<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Profiles */

$this->title = 'User Profile';


?>
<ul class="breadcrumbs no-padding-top no-padding-bottom no-padding-left">
        <li><a href="../"><span class="icon mif-home fg-kra-red"></span></a></li>
        <li><a href="../">Home</a></li>
        <li><?= $this->title; ?></li>
</ul>
<div class="pure-u-1"></div>
<div class="profiles-view">

    <h1><?= Html::encode($this->title) ?></h1>
<!-- 
    <p>
        <?= Html::a('Update', ['update', 'id' => $model['ProfileID']], ['class' => 'button primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model['ProfileID']], [
            'class' => 'button danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>    -->

    <table width="100%" border="0" cellspacing="0" cellpadding="3">
         <tr>
            <td>
                <label>Profile ID</label>
                <div class="input-control text full-size">
                    <input type="text" value="<?= $model['ProfileID']; ?>" disabled>
                </div>
            </td>
            <td>
                <label>Names</label>
                <div class="input-control text full-size">
                    <input type="text" value="<?= $model['names']; ?>" disabled>
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <label>Email</label>
                <div class="input-control text full-size">
                    <input type="text" value="<?= $model['Email']; ?>" disabled>
                </div>
            </td>

        </tr>
        <tr>
            <td>
                <label>ID Number</label>
                <div class="input-control text full-size">
                    <input type="text" value="<?= $model['IDNumber']; ?>" disabled>
                </div>
            </td>
            <td>
                <label>UserName</label>
                <div class="input-control text full-size">
                    <input type="text" value="<?= $model['UserName']; ?>" disabled>
                </div>
            </td>
        </tr>
    </table>



</div>
