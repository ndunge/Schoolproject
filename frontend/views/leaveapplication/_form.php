<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Leaveapplication */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="leaveapplication-form">

    <?php $form = ActiveForm::begin(); ?>


    <form id="data_form" method="POST">
    <div class="grid">

    <div class="row cells3">
            <div class="cell">
                <label for="Application No">Application No</label>
                <div class="input-control text full-size">
                    <input type="text" name="Application No">
                </div>
            </div>

            <div class="cell">
                <label for="Employee No">Employee No</label>
                <div class="input-control text full-size">
                    <input type="text" name="Employee No">
                </div>
            </div>

            <div class="cell">
            
                <label for="Leave Code">Leave Type</label>
                <div class="input-control text full-size">
                    <input type="text" name="Leave Code">
                </div>
            </div>


        </div>

        <div class="row cells3">
            <div class="cell">
                <label for="Days Applied">Days Applied</label>
                <div class="input-control text full-size">
                    <input type="text" name="Days Applied">
                </div>
            </div>

            <div class="cell">
                <label for="Start Date">Start Date</label>
                <div class="input-control text full-size">
                    <input type="text" name="Start Date">
                </div>
            </div>

            <div class="cell">
                <label for="End Date">End Date</label>
                <div class="input-control text full-size">
                    <input type="text" name="End Date">
                </div>
            </div>


        </div>

        <div class="row cells3">
            <div class="cell">
                <label for="Application Date">Application Date</label>
                <div class="input-control text full-size">
                    <input type="text" name="Application Date">
                </div>
            </div>

            <div class="cell">
                <label for="Approved Days">Approved Days</label>
                <div class="input-control text full-size">
                    <input type="text" name="Approved Days">
                </div>
            </div>

            <div class="cell">
                <label for="Approved Start Date">Approved Start Date</label>
                <div class="input-control text full-size">
                    <input type="text" name="Approved Start Date">
                </div>
            </div>


        </div>

         <div class="row cells3">
            <div class="cell">
                <label for="Verified by Manager">Verified by Manager</label>
                <div class="input-control text full-size">
                    <input type="text" name="Verified by Manager">
                </div>
            </div>

            <div class="cell">
                <label for="Verification Date">Verification Date</label>
                <div class="input-control text full-size">
                    <input type="text" name="Verification Date">
                </div>
            </div>

            <div class="cell">
                <label for="Leave Status">Leave Status</label>
                <div class="input-control text full-size">
                    <input type="text" name="Leave Status">
                </div>
            </div>


        </div>

        <div class="row cells3">
            <div class="cell">
                <label for="Approved End Date">Approved End Date</label>
                <div class="input-control text full-size">
                    <input type="text" name="Approved End Date">
                </div>
            </div>

            <div class="cell">
                <label for="Approval Date">Approval Date</label>
                <div class="input-control text full-size">
                    <input type="text" name="Approval Date">
                </div>
            </div>

            <div class="cell">
                <label for="Comments">Comments</label>
                <div class="input-control text full-size">
                    <input type="text" name="Comments">
                </div>
            </div>


        </div>

       

        <div class="row cells3">
            <div class="cell">
                <label for="Leave Allowance Payable">Leave Allowance Payable</label>
                <div class="input-control text full-size">
                    <input type="text" name="Leave Allowance Payable">
                </div>
            </div>

            <div class="cell">
                <label for="post">Post</label>
                <div class="input-control text full-size">
                    <input type="text" name="Post">
                </div>
            </div>

            <div class="cell">
                <label for="days">days</label>
                <div class="input-control text full-size">
                    <input type="text" name="days">
                </div>
            </div>


        </div>

        

        <div class="row cells3">
            <div class="cell">
                <label for="No_ series">No_ series</label>
                <div class="input-control text full-size">
                    <input type="text" name="No_ series">
                </div>
            </div>

            <div class="cell">
                <label for="Leave balance">Leave balance</label>
                <div class="input-control text full-size">
                    <input type="text" name="Leave balance">
                </div>
            </div>

            <div class="cell">
                <label for="Resumption Date">Resumption Date</label>
                <div class="input-control text full-size">
                    <input type="text" name="Resumption Date">
                </div>
            </div>


        </div>

         <div class="row cells3">
            <div class="cell">
                <label for="Employee Name">Employee Name </label>
                <div class="input-control text full-size">
                    <input type="text" name="Employee Name">
                </div>
            </div>

            <div class="cell">
                <label for="Status">Status</label>
                <div class="input-control text full-size">
                    <input type="text" name="Status">
                </div>
            </div>

            <div class="cell">
                <label for="Leave Entitlment">Leave Entitlment</label>
                <div class="input-control text full-size">
                    <input type="text" name="Leave Entitlment">
                </div>
            </div>


        </div>

        <div class="row cells3">
            <div class="cell">
                <label for="Duties Taken Over By">Duties Taken Over By </label>
                <div class="input-control text full-size">
                    <input type="text" name="Duties Taken Over By">
                </div>
            </div>

            <div class="cell">
                <label for="Name">Name</label>
                <div class="input-control text full-size">
                    <input type="text" name="Name">
                </div>
            </div>

            <div class="cell">
                <label for="Mobile No">Mobile No</label>
                <div class="input-control text full-size">
                    <input type="text" name="Mobile No">
                </div>
            </div>


        </div>

         <div class="row cells3">
            <div class="cell">
                <label for="Balance brought forward">Balance brought forward </label>
                <div class="input-control text full-size">
                    <input type="text" name="Balance brought forward">
                </div>
            </div>

            <div class="cell">
                <label for="Leave Earned to Date">Leave Earned to Date</label>
                <div class="input-control text full-size">
                    <input type="text" name="Leave Earned to Date">
                </div>
            </div>

            <div class="cell">
                <label for="Maturity Date">Maturity Date</label>
                <div class="input-control text full-size">
                    <input type="text" name="Maturity Date">
                </div>
            </div>


        </div>

        <div class="row cells3">
            <div class="cell">
                <label for="Date of Joining Company">Date of Joining Company</label>
                <div class="input-control text full-size">
                    <input type="text" name="Date of Joining Company">
                </div>
            </div>

            <div class="cell">
                <label for="Fiscal Start Date">Fiscal Start Date</label>
                <div class="input-control text full-size">
                    <input type="text" name="Fiscal Start Date">
                </div>
            </div>

            <div class="cell">
                <label for="No_ of Months Worked">No_ of Months Worked</label>
                <div class="input-control text full-size">
                    <input type="text" name="No_ of Months Worked">
                </div>
            </div>


        </div>

        <div class="row cells3">
            <div class="cell">
                <label for="Annual Leave Entitlement Bal">Annual Leave Entitlement Bal</label>
                <div class="input-control text full-size">
                    <input type="text" name="Annual Leave Entitlement Bal">
                </div>
            </div>

            <div class="cell">
                <label for="Department Code">Department Code</label>
                <div class="input-control text full-size">
                    <input type="text" name="Department Code">
                </div>
            </div>

            <div class="cell">
                <label for="User ID">User ID</label>
                <div class="input-control text full-size">
                    <input type="text" name="User ID">
                </div>
            </div>


        </div>

         <div class="row cells3">
            <div class="cell">
                <label for="Contract No_">Contract No_</label>
                <div class="input-control text full-size">
                    <input type="text" name="Contract No_">
                </div>
            </div>

            <div class="cell">
                <label for="Directorate Code">Directorate Code</label>
                <div class="input-control text full-size">
                    <input type="text" name="Directorate Code">
                </div>
            </div>

            <div class="cell">
                <label for="Department Name">Department Name</label>
                <div class="input-control text full-size">
                    <input type="text" name="Department Name">
                </div>
            </div>


        </div>

        <div class="row cells3">
            <div class="cell">
                <label for="Directorate name">Directorate name</label>
                <div class="input-control text full-size">
                    <input type="text" name="Directorate name">
                </div>
            </div>

            <div class="cell">
                <label for="AdvanceDays">AdvanceDays</label>
                <div class="input-control text full-size">
                    <input type="text" name="AdvanceDays">
                </div>
            </div>

            <div class="cell">
                <label for="TodaysDate">TodaysDate</label>
                <div class="input-control text full-size">
                    <input type="text" name="TodaysDate">
                </div>
            </div>


        </div>

        
       <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'button primary' : 'button primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php 
$script = <<< JS
$(#'Type').change(function(){
alert();
});
JS;
$this->registerJS($script);


?>


    

    

    

    



    

    

    

    

    

    

    

    

    

    

    

    

    

    

    

    

    

    

    

    

    

    

    

    

    

    

    

    

    

    

    

    

    

    

    


    

   
