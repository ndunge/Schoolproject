<?php

namespace common\models;

use Yii;

class Purchaserequisition extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'CUEA$Requisition Header1';
    }
     /**
     * @return \yii\db\ActiveQuery
     */
    public function getRequisitionlines()
    {
        return $this->hasMany(Requisitionlines::className(), ['Requisition No' => 'No_']);
    }
}