<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Messagetemplates */

$this->title = 'Notification Template View : '.$model['Message Template ID'];
$activation_code = 'asdfghsdter55674e4eyfrewetr3wusdftrewaesrdftgtrdt';
$activation_url = $_SERVER['HTTP_HOST'] . Yii::$app->request->baseUrl . '/site/activate?code=' . $activation_code;
                $activation_anchor = "<a href=".$activation_url."> here </a>";
print_r( $activation_anchor );
?>
<ul class="breadcrumbs no-padding-top no-padding-bottom">
		<li><a href="../"><span class="icon mif-home fg-kra-red"></span></a></li>
		<li><a href="../">Home</a></li>
		<li><?= $this->title; ?></li>
</ul>
<div class="pure-u-1"></div>
<p>		
        <?= Html::a('Edit', ['update', 'id' => $model['Message Template ID']], ['class' => 'button primary']) ?>
		
        <?= Html::a('Delete', ['delete', 'id' => $model['Message Template ID']], [
            'class' => 'button danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
		<?= Html::a('Close', ['index'], ['class' => 'button warning']) ?>
</p>
<table width="100%" border="0" cellspacing="0" cellpadding="3">
<tr>
	<td width="50%">
		<label>Code</label>
		<div class="input-control text full-size">
			<input type="text" value="<?= $model['Template Code']; ?>" disabled>
		</div>
	</td>
	<td width="50%"><label>Template Name</label>
		<div class="input-control text full-size">
			<input type="text" value="<?= $model['Template Name']; ?>" disabled>
		</div>
	</td>
</tr>
<tr>
	<td>
		<label>Subject</label>
		<div class="input-control text full-size">
			<input type="text" value="<?= $model['Template Subject']; ?>" disabled>            
		</div>
	</td>
</tr>
<tr>
	<td colspan="2">
		<label>Email Message</label> 
		<div class="input-control textarea full-size" style="border:#E9E9E9 solid 1px; padding:10px; background-color:#E9E9E9">   
			<?= $model['Template Text']; ?>
		</div>
	</td>
</tr>                       
<tr>
	<td>
		<label>SMS Message</label>
		<div class="input-control textarea full-size"> 
			<textarea name="SMS" id="SMS" rows="4" cols="80" disabled><?= $model['SMS']; ?></textarea>
		</div>
	</td>
	<td></td>
</tr>   
<tr>
	<td>
		<label class="input-control checkbox" disabled>
			<input type="checkbox" name="AllowSMS" id="AllowSMS" <?php if ($model['Allow SMS'] == 1) { echo 'checked="checked"'; } ?> disabled/>
			<span class="check"></span>
			<span class="caption">Allow SMS</span>
		</label>
	</td>
	<td></td>
</tr>
<tr>
	<td>
		<label class="input-control checkbox">
			<input type="checkbox" name="AllowEmail" id="AllowEmail" <?php if ($model['Allow Email'] == 1) { echo 'checked="checked"'; } ?> disabled/>
			<span class="check"></span>
			<span class="caption">Allow Email</span>
		</label>
	</td>
	<td></td>
</tr>                        
</table>
<div class="pure-u-1"></div>