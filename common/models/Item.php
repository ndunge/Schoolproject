<?php

namespace common\models;

use Yii;

class Item extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'CUEA$Item';
    }
}