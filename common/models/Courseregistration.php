<?php

namespace common\models;

use Yii;

class Courseregistration extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'CUEA$Course Registration -R';
    }
	
	public static function primaryKey()
	{
		return array('Reg_ Transacton ID');
		// For composite primary key, return an array like the following
		// return array('pk1', 'pk2');
	}
}
