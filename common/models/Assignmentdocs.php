<?php

namespace common\models;

use Yii;

class Assignmentdocs extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'CUEA$AssignmentDocuments';
    }
	
	public static function primaryKey()
	{
		return array('AssignmentDocID');
		// For composite primary key, return an array like the following
		// return array('pk1', 'pk2');
	}
}