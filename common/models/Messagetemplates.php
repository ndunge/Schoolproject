<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "messagetemplates".
 *
 * @property integer $MessageTemplateID
 * @property string $TemplateCode
 * @property string $TemplateName
 * @property string $TemplateText
 * @property string $CreatedDate
 */
class Messagetemplates extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'CUEA$Message Templates';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Template Text'], 'string'],
            [['Created Date'], 'safe'],
            [['Template Code', 'Template Name'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Message Template ID' => 'Message Template ID',
            'Template Code' => 'Template Code',
            'Template Name' => 'Template Name',
            'Template Text' => 'Template Text',
            'Created Date' => 'Created Date',
        ];
    }
}
