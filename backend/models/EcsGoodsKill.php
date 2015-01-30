<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ecs_goods_kill".
 *
 * @property string $k_name
 * @property integer $g_price
 * @property integer $k_price
 * @property string $k_times
 * @property string $k_timed
 * @property integer $k_id
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
            [['g_price', 'k_price'], 'integer'],
            [['k_times', 'k_timed'], 'safe'],
            [['k_name'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'k_name' => 'K Name',
            'g_price' => 'G Price',
            'k_price' => 'K Price',
            'k_times' => 'K Times',
            'k_timed' => 'K Timed',
            'k_id' => 'K ID',
        ];
    }
}
