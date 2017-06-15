<?php

namespace common\models;

use Yii;

class Countries extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'CUEA$Country_Region';
    }
}