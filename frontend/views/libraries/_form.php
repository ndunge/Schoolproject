<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Libraries */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="libraries-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'timestamp')->textInput() ?>

    <?= $form->field($model, 'No_')->textInput() ?>

    <?= $form->field($model, 'Description')->textInput() ?>

    <?= $form->field($model, 'Search Description')->textInput() ?>

    <?= $form->field($model, 'Description 2')->textInput() ?>

    <?= $form->field($model, 'FA Class Code')->textInput() ?>

    <?= $form->field($model, 'FA Subclass Code')->textInput() ?>

    <?= $form->field($model, 'Global Dimension 1 Code')->textInput() ?>

    <?= $form->field($model, 'Global Dimension 2 Code')->textInput() ?>

    <?= $form->field($model, 'Location Code')->textInput() ?>

    <?= $form->field($model, 'FA Location Code')->textInput() ?>

    <?= $form->field($model, 'Vendor No_')->textInput() ?>

    <?= $form->field($model, 'Main Asset_Component')->textInput() ?>

    <?= $form->field($model, 'Component of Main Asset')->textInput() ?>

    <?= $form->field($model, 'Budgeted Asset')->textInput() ?>

    <?= $form->field($model, 'Warranty Date')->textInput() ?>

    <?= $form->field($model, 'Responsible Employee')->textInput() ?>

    <?= $form->field($model, 'Serial No_')->textInput() ?>

    <?= $form->field($model, 'Last Date Modified')->textInput() ?>

    <?= $form->field($model, 'Blocked')->textInput() ?>

    <?= $form->field($model, 'Picture')->textInput() ?>

    <?= $form->field($model, 'Maintenance Vendor No_')->textInput() ?>

    <?= $form->field($model, 'Under Maintenance')->textInput() ?>

    <?= $form->field($model, 'Next Service Date')->textInput() ?>

    <?= $form->field($model, 'Inactive')->textInput() ?>

    <?= $form->field($model, 'No_ Series')->textInput() ?>

    <?= $form->field($model, 'FA Posting Group')->textInput() ?>

    <?= $form->field($model, 'Acq_ date')->textInput() ?>

    <?= $form->field($model, 'Supplier')->textInput() ?>

    <?= $form->field($model, 'Invoice no_')->textInput() ?>

    <?= $form->field($model, 'Cost')->textInput() ?>

    <?= $form->field($model, 'Depr_ Rate')->textInput() ?>

    <?= $form->field($model, 'Acc Depreciation')->textInput() ?>

    <?= $form->field($model, 'Fixed Asset Type')->textInput() ?>

    <?= $form->field($model, 'Max_ Carrying Capacity')->textInput() ?>

    <?= $form->field($model, 'Registration No')->textInput() ?>

    <?= $form->field($model, 'Parastatl Reg_ No')->textInput() ?>

    <?= $form->field($model, 'Make')->textInput() ?>

    <?= $form->field($model, 'YOM')->textInput() ?>

    <?= $form->field($model, 'C_C')->textInput() ?>

    <?= $form->field($model, 'Duty')->textInput() ?>

    <?= $form->field($model, 'Rating')->textInput() ?>

    <?= $form->field($model, 'Body')->textInput() ?>

    <?= $form->field($model, 'Model')->textInput() ?>

    <?= $form->field($model, 'Car Rating')->textInput() ?>

    <?= $form->field($model, 'Language Code (Default)')->textInput() ?>

    <?= $form->field($model, 'Attachement')->textInput() ?>

    <?= $form->field($model, 'Disposed')->textInput() ?>

    <?= $form->field($model, 'Tracking Date')->textInput() ?>

    <?= $form->field($model, 'Tracking Renewal date')->textInput() ?>

    <?= $form->field($model, 'Car Tracking Company')->textInput() ?>

    <?= $form->field($model, 'Fuel Consumption Km_Ltr')->textInput() ?>

    <?= $form->field($model, 'Maturity Period')->textInput() ?>

    <?= $form->field($model, 'No_ Of Interest Periods')->textInput() ?>

    <?= $form->field($model, 'Status')->textInput() ?>

    <?= $form->field($model, 'Investment Type Name')->textInput() ?>

    <?= $form->field($model, 'No_Of Units')->textInput() ?>

    <?= $form->field($model, 'Asset Type')->textInput() ?>

    <?= $form->field($model, 'Interest Rate Type')->textInput() ?>

    <?= $form->field($model, 'Acquisition Cost')->textInput() ?>

    <?= $form->field($model, 'Rate _')->textInput() ?>

    <?= $form->field($model, 'Issue Date')->textInput() ?>

    <?= $form->field($model, 'Term (Days)')->textInput() ?>

    <?= $form->field($model, 'Purchase Type')->textInput() ?>

    <?= $form->field($model, 'Disposal Value')->textInput() ?>

    <?= $form->field($model, 'Revaluations')->textInput() ?>

    <?= $form->field($model, 'Interest Received')->textInput() ?>

    <?= $form->field($model, 'Dividend Received')->textInput() ?>

    <?= $form->field($model, 'Balance')->textInput() ?>

    <?= $form->field($model, 'Investment Type')->textInput() ?>

    <?= $form->field($model, 'Interest Frequency Period')->textInput() ?>

    <?= $form->field($model, 'Maturity Date')->textInput() ?>

    <?= $form->field($model, 'Investment Date')->textInput() ?>

    <?= $form->field($model, 'Investment Posting Group')->textInput() ?>

    <?= $form->field($model, 'Maturity Period Days')->textInput() ?>

    <?= $form->field($model, 'Accrued Interest')->textInput() ?>

    <?= $form->field($model, 'Interest at purchase')->textInput() ?>

    <?= $form->field($model, 'Valuation Method')->textInput() ?>

    <?= $form->field($model, 'RBA Class')->textInput() ?>

    <?= $form->field($model, 'Purchase Link')->textInput() ?>

    <?= $form->field($model, 'Sale Link')->textInput() ?>

    <?= $form->field($model, 'Interest Link')->textInput() ?>

    <?= $form->field($model, 'Disposal Status')->textInput() ?>

    <?= $form->field($model, 'Method of Disposal')->textInput() ?>

    <?= $form->field($model, 'Valuation Amount')->textInput() ?>

    <?= $form->field($model, 'Reserve Price')->textInput() ?>

    <?= $form->field($model, 'Disposal Committee Meeting')->textInput() ?>

    <?= $form->field($model, 'Log Book No_')->textInput() ?>

    <?= $form->field($model, 'Policy No')->textInput() ?>

    <?= $form->field($model, 'Last Valued Date')->textInput() ?>

    <?= $form->field($model, 'Valuer')->textInput() ?>

    <?= $form->field($model, 'Premium Amount')->textInput() ?>

    <?= $form->field($model, 'Valuation Firm')->textInput() ?>

    <?= $form->field($model, 'Date of Commencement')->textInput() ?>

    <?= $form->field($model, 'Expiry Date')->textInput() ?>

    <?= $form->field($model, 'Insurer')->textInput() ?>

    <?= $form->field($model, 'Date of Purchase')->textInput() ?>

    <?= $form->field($model, 'Amount of Purchase')->textInput() ?>

    <?= $form->field($model, 'Insurance Company')->textInput() ?>

    <?= $form->field($model, 'Service Provider')->textInput() ?>

    <?= $form->field($model, 'Service Provider Name')->textInput() ?>

    <?= $form->field($model, 'Service Intervals')->textInput() ?>

    <?= $form->field($model, 'Date Last Serviced')->textInput() ?>

    <?= $form->field($model, 'Next Service')->textInput() ?>

    <?= $form->field($model, 'Amount')->textInput() ?>

    <?= $form->field($model, 'Service_Repair Description')->textInput() ?>

    <?= $form->field($model, 'Manufacturer')->textInput() ?>

    <?= $form->field($model, 'Asset Bar Code')->textInput() ?>

    <?= $form->field($model, 'Lease Term')->textInput() ?>

    <?= $form->field($model, 'Lease Start Date')->textInput() ?>

    <?= $form->field($model, 'Lease End Date')->textInput() ?>

    <?= $form->field($model, 'On Lease')->textInput() ?>

    <?= $form->field($model, 'Author')->textInput() ?>

    <?= $form->field($model, 'ISBN')->textInput() ?>

    <?= $form->field($model, 'Category')->textInput() ?>

    <?= $form->field($model, 'Category Name')->textInput() ?>

    <?= $form->field($model, 'Availability')->textInput() ?>

    <?= $form->field($model, 'approved')->textInput() ?>

    <?= $form->field($model, 'Donations Reference No')->textInput() ?>

    <?= $form->field($model, 'donation?')->textInput() ?>

    <?= $form->field($model, 'requested?')->textInput() ?>

    <?= $form->field($model, 'Date donated_Bought')->textInput() ?>

    <?= $form->field($model, 'Lost?')->textInput() ?>

    <?= $form->field($model, 'Classification No')->textInput() ?>

    <?= $form->field($model, 'Publisher')->textInput() ?>

    <?= $form->field($model, 'Date_Year of Publication')->textInput() ?>

    <?= $form->field($model, 'Pagination')->textInput() ?>

    <?= $form->field($model, 'Copies Available')->textInput() ?>

    <?= $form->field($model, 'Accession number')->textInput() ?>

    <?= $form->field($model, 'Purchased Date')->textInput() ?>

    <?= $form->field($model, 'Subject')->textInput() ?>

    <?= $form->field($model, 'Place of Publication')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
