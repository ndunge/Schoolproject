<?php

namespace common\models;

use Yii;

class Assignments extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'CUEA$Assignments';
    }
	
	public static function primaryKey()
	{
		return array('AssignmentID');
		// For composite primary key, return an array like the following
		// return array('pk1', 'pk2');
	}
}