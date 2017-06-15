<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Eventregistrations */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="eventregistrations-form">



    <?php $form = ActiveForm::begin(); ?>

    
<form id="data_form" method="POST">
    <div class="grid">
        <div class="row cells3">
            <div class="cell">
                <label for="Event Registration No">Event Registration No</label>
                <div class="input-control text full-size">
                    <input type="text" name="Event Registration No">
                </div>
            </div>
            <div class="cell">
                <label for="Event ID<">Event ID</label>
                <div class="input-control text full-size">
                    <input type="text" name="Event ID<">
                </div>
            </div>
            <div class="cell">
                <label for="SessionID">SessionID</label>
                <div class="input-control text full-size">
                    <input type="text" name="SessionID">
                </div>
            </div>
        </div>
        <div class="row cells3">
            <div class="cell">
                <label for="Description">Description</label>
                <div class="input-control text full-size">
                    <input type="text" name="Desscription">
                </div>
            </div>
            <div class="cell">
                <label for="Attended">Attended</label>
                <div class="input-control text full-size">
                    <input type="text" name="Attended">
                </div>
            </div>
            <div class="cell">
                <label for="Participant Type">Participant Type</label>
                <div class="input-control text full-size">
                    <input type="text" name="Participant Type">
                </div>
            </div>
            <div class="row cells3">
            <div class="cell">
                <label for="Participant No">Participant No</label>
                <div class="input-control text full-size">
                    <input type="text" name="Participant No">
                </div>
            </div>
            <div class="cell">
                <label for="Participant Name">Participant Name</label>
                <div class="input-control text full-size">
                    <input type="text" name="Participant Name">
                </div>
            </div>
            <div class="cell">
                <label for="Registration Date">Registration Date</label>
                <div class="input-control text full-size">
                    <input type="text" name="Registration Date">
                </div>
            </div>
            </div>
            <div class="row cells3">
            <div class="cell">
                <label for="No Series">No Series</label>
                <div class="input-control text full-size">
                    <input type="text" name="No Series">
                </div>
            </div>
        </div>
    </div>
    </div>
            


        

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'button primary' : 'button primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
