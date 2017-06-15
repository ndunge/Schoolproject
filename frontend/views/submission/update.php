<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Submission */

$this->title = 'Update Submission: ' . $model->AssignmentSubmissionID;
$this->params['breadcrumbs'][] = ['label' => 'Submissions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->AssignmentSubmissionID, 'url' => ['view', 'id' => $model->AssignmentSubmissionID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="submission-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
