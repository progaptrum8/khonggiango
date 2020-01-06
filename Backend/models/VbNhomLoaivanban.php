<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "vb_nhom_loaivanban".
 *
 * @property integer $idNLVB
 * @property string $name
 * @property integer $thuTu
 * @property integer $isActive
 * @property integer $isDeleted
 * @property integer $donViRieng
 */
class VbNhomLoaivanban extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'vb_nhom_loaivanban';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string'],
            [['thuTu', 'isActive', 'isDeleted','donViRieng'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idNLVB' => 'Id Nlvb',
            'name' => 'Name',
            'thuTu' => 'Thu Tu',
            'isActive' => 'Is Active',
            'isDeleted' => 'Is Deleted',
            'donViRieng'=>'don Vi Rieng'
        ];
    }
}
