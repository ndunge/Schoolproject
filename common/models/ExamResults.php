<?php

namespace common\models;

use Yii;

class ExamResults extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%Exam Results}}';
    }
}