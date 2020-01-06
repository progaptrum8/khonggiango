<?php

namespace app\models;

use Yii;
use app\components\CommonUtil;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $username
 * @property string $email
 * @property string $password
 * @property string $authKey
 * @property string $accessToken
 * @property integer $status
 * @property string $updatedAt
 * @property string $createdAt
 * @property integer $isDeleted
 * @property integer $maCCVC
 * @property string $fullname
 * @property string $maSo
 * @property integer $gioiTinh
 * @property string $ngaySinh
 * @property integer $donViId
 * @property integer $phongId
 * @property string $diDong
 * @property string $dienThoai
 * @property string $soCMND
 * @property string $ngayCapCMND
 * @property string $noiCapCMND
 * @property integer $isActive
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status', 'isDeleted', 'gioiTinh', 'isActive'], 'integer'],
            [['updatedAt', 'createdAt', 'ngaySinh', 'ngayCapCMND'], 'safe'],
            [['username'], 'string', 'max' => 32],
            [['email', 'password', 'authKey', 'accessToken', 'fullname', 'noiCapCMND'], 'string', 'max' => 255],
            [['maSo', 'diDong', 'dienThoai', 'soCMND'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'email' => 'Email',
            'password' => 'Password',
            'authKey' => 'Auth Key',
            'accessToken' => 'Access Token',
            'status' => 'Status',
            'updatedAt' => 'Updated At',
            'createdAt' => 'Created At',
            'isDeleted' => 'Is Deleted',
            'fullname' => 'Fullname',
            'gioiTinh' => 'Gioi Tinh',
            'ngaySinh' => 'Ngay Sinh',
            'diDong' => 'Di Dong',
            'dienThoai' => 'Dien Thoai',
            'soCMND' => 'So Cmnd',
            'ngayCapCMND' => 'Ngay Cap Cmnd',
            'noiCapCMND' => 'Noi Cap Cmnd',
            'isActive' => 'Is Active',
            'avatar' => 'Avatar',
            'mime' => 'Mime'
        ];
    }
    public function getFileAvatar(){
        return $this->hasOne(QlFiledinhkem::className(), ['idObject' => 'id'])->andOnCondition(['type' => CommonUtil::FILE_AVATAR]);
    }
}
