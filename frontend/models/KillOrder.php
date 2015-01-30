<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "kill_order".
 *
 * @property integer $id
 * @property integer $u_id
 * @property integer $g_id
 * @property integer $orders
 * @property integer $state
 */
class KillOrder extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'kill_order';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['u_id', 'g_id', 'orders', 'state'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'u_id' => 'U ID',
            'g_id' => 'G ID',
            'orders' => 'Orders',
            'state' => 'State',
        ];
    }
}
