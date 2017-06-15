<?php

namespace common\models;

use Yii;

class Employees extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'CUEA$Employee';
    }
}