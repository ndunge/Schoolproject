<?php

namespace common\models;

use Yii;

class Customers extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'CUEA$Customer';
    }
}
