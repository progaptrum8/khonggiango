<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "app_control".
 *
 * @property integer $idApp
 * @property string $deviceId
 * @property string $email
 * @property string $idLVBSubscription
 * @property string $deviceType
 * @property string $fullName
 * @property integer $badge_ios
 * @property integer $badge_android
 */
class AppControl extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'app_control';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['deviceId', 'deviceType'], 'required'],
            [['deviceId', 'email', 'idLVBSubscription', 'deviceType', 'fullName'], 'string'],
            [['badge_ios', 'badge_android'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idApp' => 'Id App',
            'deviceId' => 'Device ID',
            'email' => 'Email',
            'idLVBSubscription' => 'Id Lvbsubscription',
            'deviceType' => 'Device Type',
            'fullName' => 'Full Name',
            'badge_ios' => 'Badge Ios',
            'badge_android' => 'Badge Android',
        ];
    }
}
