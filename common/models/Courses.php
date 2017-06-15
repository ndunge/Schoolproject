<?php

namespace common\models;

use Yii;

class Courses extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'CUEA$ProgrammeCourse';
    }
}
