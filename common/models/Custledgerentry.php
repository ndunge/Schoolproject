<?php
/**
 * Created by PhpStorm.
 * User: Michael
 * Date: 18/08/2016
 * Time: 15:03
 */

namespace common\models;

use Yii;

class Custledgerentry extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'CUEA$Cust_ Ledger Entry';
    }
}