<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ecs_order_detail".
 *
 * @property integer $res_id
 * @property integer $order_id
 * @property integer $goods_id
 * @property string $goods_name
 * @property integer $goods_num
 * @property string $market_price
 * @property string $goods_price
 */
class EcsOrderDetail extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ecs_order_detail';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['order_id', 'goods_id', 'goods_num'], 'integer'],
            [['market_price', 'goods_price'], 'number'],
            [['goods_name'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'res_id' => 'Res ID',
            'order_id' => 'Order ID',
            'goods_id' => 'Goods ID',
            'goods_name' => 'Goods Name',
            'goods_num' => 'Goods Num',
            'market_price' => 'Market Price',
            'goods_price' => 'Goods Price',
        ];
    }
}
