<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Employees;
use common\models\User;

use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model common\models\Profiles */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="profiles-form">
  <script type="text/javascript">
      // $(document).ready(function(){
      //     $.get( "<?= Url::toRoute('employee') ?>", { empno: $('#No_').val() } )
      //         .done(function(data) {
      //             console.log('data', data !== null, data)
      //             if (data !== null) {
      //               $email=JSON.parse(data).email;
      //               $idno=JSON.parse(data).idno;
      //               $UserName=JSON.parse(data).UserName;
      //               $AccountTypeID=JSON.parse(data).AccountTypeID;
      //                $("#AccountTypeID").val($AccountTypeID);
      //               $("#Email").val($email);
      //               $("#IDNumber").val($idno);
      //               $("#UserName").val($UserName);
      //             }
      //
      //         }
      //     );
      // });

  </script>
  <ul class="breadcrumbs no-padding-top no-padding-bottom no-padding-left">
          <li><a href="../"><span class="icon mif-home fg-kra-red"></span></a></li>
          <li><a href="../">Home</a></li>
          <li><?= $this->title; ?></li>
  </ul>
  <div class="" style="margin: 4rem auto; width: 50%;">
         <?= Html::beginForm() ?>
              <label>Employee Name <span style="color:#F00">*</span></label>
              <div data-role="select">
                  <?= Html::dropDownList('No_', $selection=$model['CustomerID'], $employees ,
                 [
                      'class' => 'input-control full-size',
                      'id' => 'No_',
                      'prompt' => '',
                      'onchange'=>'
                          $.get( "'.Url::toRoute('employee').'", { empno: $(this).val() } )
                              .done(function(data) {
                                  $profile = JSON.parse(data);
                                  console.log($profile)
                                  $email=JSON.parse(data).email;
                                  $idno=JSON.parse(data).idno;
                                  $UserName=JSON.parse(data).UserName;
                                  $AccountTypeID=JSON.parse(data).AccountTypeID;
                                   $("#AccountTypeID").val($AccountTypeID);
                                  $("#Email").val($profile[\'Company E-Mail\']);
                                  $("#IDNumber").val($idno);
                                  $("#UserName").val($UserName);
                              }
                          );
                      ',
                  ]) ?>
              </div>
              <!-- <label>Portal Username <span style="color:#F00">*</span></label>
              <div class="input-control text full-size">
                  <input name="UserName" type="text" id="UserName" value=""/>
              </div> -->
              <!-- <label>Id Number <span style="color:#F00">*</span></label>
              <div class="input-control text full-size">
                  <input name="IDNumber" type="text" id="IDNumber" value="" readonly="" />
              </div> -->

              <label>Email <span style="color:#F00">*</span></label>
              <div class="input-control text full-size">
                  <input name="Email" type="text" id="Email" />
              </div>

              <label>Account Type<span style="color:#F00">*</span></label>
              <div data-role="select">
                  <select name="AccountTypeID"  id="AccountTypeID" class="input-control full-size">
                      <option value="0" ></option>
                      <option value="1" <?php echo $model['AccountTypeID']==1?'selected':'' ?>>Admin</option>
                      <option value="2" <?php echo $model['AccountTypeID']==2?'selected':'' ?>>Employee</option>
                  </select>
              </div>

              <button class="button large-button danger bg-hover-darkRed" onclick="regformhash(this.form)">
                  <h5 class="align-left">
                      <span class="mif-pencil place-left"></span>&nbsp;
                      <span class="text-shadow"> Add User </span></h5>
              </button>
          <?php Html::endForm(); ?>
      </div>
  </div>
</div>
