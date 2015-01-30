<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property integer $uid
 * @property string $uname
 * @property string $upwd
 * @property integer $status
 * @property string $money
 * @property string $addtime
 */
class Users extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status'], 'integer'],
            [['addtime'], 'safe'],
            [['uname', 'upwd', 'money'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'uid' => 'Uid',
            'uname' => 'Uname',
            'upwd' => 'Upwd',
            'status' => 'Status',
            'money' => 'Money',
            'addtime' => 'Addtime',
        ];
    }
}
