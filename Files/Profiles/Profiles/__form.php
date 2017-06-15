<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Employees;

use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model common\models\Profiles */
/* @var $form yii\widgets\ActiveForm */
?>

<script type="text/javascript">
    $('#CustomerID').change(function(){
        alert('sawa');
    });

</script>
<ul class="breadcrumbs no-padding-top no-padding-bottom no-padding-left">
        <li><a href="../"><span class="icon mif-home fg-kra-red"></span></a></li>
        <li><a href="../">Home</a></li>
        <li><?= $this->title; ?></li>
</ul>
<div class="pure-u-1"></div>

<div class="pure-u-1 pure-u-md-1-3">        
       <?= Html::beginForm(['create']) ?>
            <label>Employee Name <span style="color:#F00">*</span></label>
            <div data-role="select"> 
                <?= Html::dropDownList('No_', ' ', $employees , 
               [
                    'class' => 'input-control full-size',
                    'id' => 'No_',
                    'prompt' => '',
                    'onchange'=>'
                        $.get( "'.Url::toRoute('employee').'", { empno: $(this).val() } )
                            .done(function(data) {
                                $email=JSON.parse(data).email;
                                $idno=JSON.parse(data).idno;
                                $accType="4";
                                
                                $("#Email").val($email);
                                $("#IDNumber").val($idno);
                                $("#AccountTypeID").val($accType);
                                
                            }
                        );
                    '
                ]) ?>
            </div>
            
            <label>Email <span style="color:#F00">*</span></label>
            <div class="input-control text full-size">
                <input name="Email" type="text" id="Email" readonly="" />
            </div>
            <label>Portal Username <span style="color:#F00">*</span></label>
            <div class="input-control text full-size">
                <input name="UserName" type="text" id="UserName" value=""/>
            </div>
            <label>Password <span style="color:#F00">*</span></label>
            <div class="input-control text full-size">
                <input name="Password" type="password" id="Password" value=""/>
            </div>
            <label>Confirm Password <span style="color:#F00">*</span></label>
            <div class="input-control text full-size">
                <input name="ConfirmPassword" type="password" id="ConfirmPassword" value=""/>
            </div>
            <label>Account Type<span style="color:#F00">*</span></label>
            <div class="input-control text full-size">
                <input name="AccountTypeID" type="text" id="Acctype" value=""/>
            </div>
            <label>Id Number <span style="color:#F00">*</span></label>
            <div class="input-control text full-size">
                <input name="IDNumber" type="text" id="IDNumber" value="" readonly="" />
            </div>
            <button class="button large-button danger bg-hover-darkRed" onclick="regformhash(this.form)">
                <h5 class="align-left">
                    <span class="mif-pencil place-left"></span>&nbsp;
                    <span class="text-shadow">Register </span></h5>
            </button>
        <?php Html::endForm(); ?>
    </div>
</div>
<div class="pure-u-1"></div>
<div class="pure-u-1"></div>