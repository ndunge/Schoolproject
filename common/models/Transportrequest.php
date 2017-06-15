<?php
/**
 * Created by PhpStorm.
 * User: Michael
 * Date: 18/08/2016
 * Time: 11:40
 */

namespace common\models;

use common\models\Transportationtype;

class Transportrequest extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'CUEA$Transport Request';
    }

    public function getTransportDescription($data)
    {
        $type = '';
        $transportTypes = Transportationtype::find()->select(['code', 'Description'])->asArray()->all();

        foreach ($transportTypes as $transportType) {
            if ($data == $transportType['code']) {
                $type = $transportType['Description'];
            }
        }
        return $type;
    }
}