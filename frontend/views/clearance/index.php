<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Student Clearance Check';
$this->params['breadcrumbs'][] = $this->title;


$departments = [
    'SPORTS' => 'Sports',
    'LIBRARY' => 'Library',
    'FINANCE' => 'Finance',
    'HOD' => 'Faculty', 
    'DEAN OF STUDENTS' => 'Faculty',
];

?>
<div class="clearance-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php if (!$Initiated): ?>
        <?= Html::a('Initiate Clearance ', ['create'], ['class' => 'button success']) ?>
    <?php else: ?>
        <p> 
            <table>
                <thead>

                    <tr>
                        <td>Department </td>
                        <td>Status</td>
                        <td>Date Cleared </td>
                        <td>Remarks</td>
                    </tr>                    
                </thead>
                <tbody>
                    <?php foreach ($Clearances as $Clearance): ?>
                        <?php $dept = $Clearance['Clearance Level Code']; ?>
                        <?php $date = $departments[$dept] . ' Clearance Date'; ?>
                        <?php $remarks = $departments[$dept] . ' Clearance Remarks'; ?>
                        <tr>
                            <td><?= $Clearance['Clearance Level Code'] ?></td>
                            <td><?= ($Clearance['Cleared'] == 0)  ? "Pending" : "Cleared" ?></td>
                            <td><?= $Record[$date] ?></td>
                            <td><?= $Record[$remarks] ?></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
                <tfoot>
                    
                </tfoot>
            </table>
        </p>
    <?php endif ?>
   
</div>
