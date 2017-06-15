<?php

namespace common\models;

use Yii;

class Currencies extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'CUEA$Currency';
    }
}