<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "VStudentApplication".
 *
 * @property string $timestamp
 * @property string $ApplicantNo
 * @property string $ApplicationDate
 * @property string $ProgrammeID
 * @property string $StudentStatus
 * @property integer $ApprovalStatus
 * @property string $No_ Series
 * @property string $AdmissionDate
 * @property string $CompletionDate
 * @property string $House
 * @property string $Name
 * @property string $Address
 * @property string $Address 2
 * @property string $City
 * @property string $Contact
 * @property string $Phone No_
 * @property string $Telex No_
 * @property string $Fax No_
 * @property string $Telex Answer Back
 * @property resource $Picture
 * @property string $Post Code
 * @property string $County
 * @property string $E-Mail
 * @property string $Home Page
 * @property integer $Select
 * @property string $SenderID
 * @property integer $ApplicationSource
 * @property string $Interview Date
 * @property string $Phone No1_
 * @property string $EMail 1
 * @property string $Address 3
 * @property string $Mobile 1
 * @property string $Mobile 2
 * @property integer $Interview
 * @property integer $ApplicantInterviewed
 * @property integer $Gender
 * @property string $Date Of Birth
 * @property string $Age
 * @property integer $Marital Status
 * @property string $Blood Group
 * @property string $Weight
 * @property string $Height
 * @property string $Religion
 * @property string $Citizenship
 * @property string $ID No
 * @property string $Birth Cert
 * @property string $Passport No
 * @property string $Group_Company
 * @property integer $ApplicationSubmitted
 * @property string $SubmittedBy
 * @property string $ModeofStudyID
 * @property integer $Offer Accepted
 * @property integer $Offer Defered
 * @property string $Country
 * @property integer $StudentCreated
 * @property string $AcademicYearID
 * @property string $IntakeID
 * @property string $StageID
 * @property string $ProfileID
 */
class Studentapplication extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        
        return 'CUEA$Student Application R';
    }

    /**
     * @inheritdoc
     */

    public static function primaryKey()
     {
      return array('ApplicantNo');
      // For composite primary key, return an array like the following
      // return array('pk1', 'pk2');
     }

    public function Search()
    {
        return array('ApplicantNo');
    }
}
