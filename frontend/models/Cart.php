<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cart".
 *
 * @property integer $id
 * @property string $goods_name
 * @property string $price
 * @property string $market_price
 * @property integer $number
 * @property integer $user_id
 * @property integer $goods_id
 */
class Cart extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cart';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['price', 'market_price'], 'number'],
            [['number', 'user_id', 'goods_id'], 'integer'],
            [['goods_name'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'goods_name' => 'Goods Name',
            'price' => 'Price',
            'market_price' => 'Market Price',
            'number' => 'Number',
            'user_id' => 'User ID',
            'goods_id' => 'Goods ID',
        ];
    }
}
