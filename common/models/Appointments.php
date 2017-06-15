<?php

namespace common\models;

use Yii;

class Appointments extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'CUEA$Appointments';
    }
}