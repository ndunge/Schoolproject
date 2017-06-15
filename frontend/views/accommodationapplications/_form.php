<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Accommodationapplications */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="accommodationapplications-form">

    <?php $form = ActiveForm::begin(); ?>

    <form id="data_form" method="POST">
    <div class="grid">
    <div class="row cells3">
            <div class="cell">
                <label for="No">No</label>
                <div class="input-control text full-size">
                    <input type="text" name="No">
                </div>
            </div>

            <div class="cell">
                <label for="Space Allocated">Space Allocated</label>
                <div class="input-control text full-size">
                    <input type="text" name="Space Allocated">
                </div>
            </div>

            <div class="cell">
                <label for="Room Applied">Room Applied</label>
                <div class="input-control text full-size">
                    <input type="text" name="Room Applied">
                </div>
            </div>


        </div>

        <div class="row cells3">
            <div class="cell">
                <label for="Academic Year">Academic Year</label>
                <div class="input-control text full-size">
                    <input type="text" name="Academic Year">
                </div>
            </div>

            <div class="cell">
                <label for="Academic Session">Academic Session</label>
                <div class="input-control text full-size">
                    <input type="text" name="Academic Session">
                </div>
            </div>

            <div class="cell">
                <label for="Block No">Block No</label>
                <div class="input-control text full-size">
                    <input type="text" name="Block No">
                </div>
            </div>


        </div>

        <div class="row cells3">
            <div class="cell">
                <label for="Student No">Student No</label>
                <div class="input-control text full-size">
                    <input type="text" name="Student No">
                </div>
            </div>

            <div class="cell">
                <label for="Allocated">Allocated</label>
                <div class="input-control text full-size">
                    <input type="text" name="Allocated">
                </div>
            </div>

            <div class="cell">
                <label for="Room Allocated">Room Allocated</label>
                <div class="input-control text full-size">
                    <input type="text" name="Room Allocated">
                </div>
            </div>


        </div>

        <div class="row cells3">
            <div class="cell">
                <label for="Status">Status</label>
                <div class="input-control text full-size">
                    <input type="text" name="Status">
                </div>
            </div>

            <div class="cell">
                <label for="Rejected Reason">Rejected Reason</label>
                <div class="input-control text full-size">
                    <input type="text" name="Rejected Reason">
                </div>
            </div>

            <div class="cell">
                <label for="Posted">Posted</label>
                <div class="input-control text full-size">
                    <input type="text" name="Posted">
                </div>
            </div>


        </div>

         <div class="row cells3">
            <div class="cell">
                <label for="Billed">Billed</label>
                <div class="input-control text full-size">
                    <input type="text" name="Billed">
                </div>
            </div>

            <div class="cell">
                <label for="Billing Date">Billing Date</label>
                <div class="input-control text full-size">
                    <input type="text" name="Billing Date">
                </div>
            </div>

            <div class="cell">
                <label for="Billed By">Billed By</label>
                <div class="input-control text full-size">
                    <input type="text" name="Billed By">
                </div>
            </div>


        </div>

         <div class="row cells3">
            <div class="cell">
                <label for="Student Gender">Student Gender</label>
                <div class="input-control text full-size">
                    <input type="text" name="Student Gender">
                </div>
            </div>

        </div>

        </div>
        </form>

    

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'button primary' : 'button primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

