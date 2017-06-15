<?php

namespace common\models;

use Yii;

class Submissiondocs extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'CUEA$AssignmentSubmissionDocs';
    }
	
	public static function primaryKey()
	{
		return array('SubmissionDocID');
		// For composite primary key, return an array like the following
		// return array('pk1', 'pk2');
	}
}