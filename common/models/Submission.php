<?php

namespace common\models;

use Yii;

class Submission extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'CUEA$AssignmentSubmission';
    }
	
	public static function primaryKey()
	{
		return array('AssignmentSubmissionID');
		// For composite primary key, return an array like the following
		// return array('pk1', 'pk2');
	}
    
    public function getAssignments()  
	{
        return $this->hasOne(Assignments::className(), ['AssignmentID' => 'AssignmentID'])->from(assignments::tableName());
    }
    //  public function getStudents()  
    // {
    //     return $this->hasOne(Profiles::className(), ['ProfileID' => 'ProfileID'])->from(profiles::tableName());
    // }
}