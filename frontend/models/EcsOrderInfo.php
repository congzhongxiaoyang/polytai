<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ecs_order_info".
 *
 * @property integer $order_id
 * @property integer $user_id
 * @property integer $pay_status
 * @property integer $order_status
 * @property string $order_sn
 * @property integer $goods_amount
 * @property string $consignee
 * @property integer $country
 * @property integer $province
 * @property integer $city
 * @property string $email
 * @property integer $district
 * @property string $address
 * @property string $zipcode
 * @property string $tel
 * @property string $mobile
 * @property string $sign_building
 * @property string $best_time
 */
class EcsOrderInfo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ecs_order_info';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'pay_status', 'order_status', 'goods_amount', 'country', 'province', 'city', 'district'], 'integer'],
            [['order_sn', 'consignee', 'email', 'address', 'zipcode', 'tel', 'mobile', 'sign_building', 'best_time'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'order_id' => 'Order ID',
            'user_id' => 'User ID',
            'pay_status' => 'Pay Status',
            'order_status' => 'Order Status',
            'order_sn' => 'Order Sn',
            'goods_amount' => 'Goods Amount',
            'consignee' => 'Consignee',
            'country' => 'Country',
            'province' => 'Province',
            'city' => 'City',
            'email' => 'Email',
            'district' => 'District',
            'address' => 'Address',
            'zipcode' => 'Zipcode',
            'tel' => 'Tel',
            'mobile' => 'Mobile',
            'sign_building' => 'Sign Building',
            'best_time' => 'Best Time',
        ];
    }
}
