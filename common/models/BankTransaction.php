<?php

namespace common\models;

use Yii;

class BankTransaction extends \yii\db\ActiveRecord {
    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'CUEA$OnlineBankTransactions';

        
    }
}