<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "danhmuc_coquan".
 *
 * @property integer $id
 * @property integer $idParent
 * @property integer $isPhongBan
 * @property integer $isActive
 * @property integer $isDelete
 * @property integer $typeObject
 * @property string $maSoToChuc
 * @property string $tenDonVi
 * @property string $tenVietTat
 * @property string $diaChi
 * @property string $email
 * @property string $dienThoai
 * @property string $fax
 * @property integer $donViCapTrenId
 * @property string $donViCapTren
 * @property string $donViCapTrenMaSo
 * @property string $capDonVi
 * @property integer $capDonViId
 */
class DanhmucCoquan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'danhmuc_coquan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Ten Danh Muc'
        ];
    }
}
