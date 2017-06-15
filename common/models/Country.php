<?php

namespace common\models;

use Yii;

class Country extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'CUEA$Country_Region';
    }
}