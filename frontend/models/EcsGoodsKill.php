<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ecs_goods_kill".
 *
 * @property integer $k_id
 * @property string $k_name
 * @property string $g_price
 * @property string $k_price
 * @property string $k_times
 * @property string $k_timed
 * @property string $k_img
 */
class EcsGoodsKill extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ecs_goods_kill';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['k_times', 'k_timed'], 'safe'],
            [['k_name', 'k_img'], 'string', 'max' => 255],
            [['g_price', 'k_price'], 'string', 'max' => 22]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'k_id' => 'K ID',
            'k_name' => 'K Name',
            'g_price' => 'G Price',
            'k_price' => 'K Price',
            'k_times' => 'K Times',
            'k_timed' => 'K Timed',
            'k_img' => 'K Img',
        ];
    }
}
