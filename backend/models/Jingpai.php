<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "jingpai".
 *
 * @property integer $j_id
 * @property integer $gid
 * @property integer $uid
 * @property integer $price
 * @property integer $lowest
 * @property integer $highest
 * @property string $start_time
 * @property string $end_time
 * @property integer $now_price
 */
class Jingpai extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'jingpai';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['gid', 'uid', 'price', 'lowest', 'highest', 'now_price'], 'integer'],
            [['start_time', 'end_time'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'j_id' => 'J ID',
            'gid' => 'Gid',
            'uid' => 'Uid',
            'price' => 'Price',
            'lowest' => 'Lowest',
            'highest' => 'Highest',
            'start_time' => 'Start Time',
            'end_time' => 'End Time',
            'now_price' => 'Now Price',
        ];
    }
}
