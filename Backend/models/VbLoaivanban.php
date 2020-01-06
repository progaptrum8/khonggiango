<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "vb_loaivanban".
 *
 * @property integer $idLVB
 * @property string $maSo
 * @property string $kyHieu
 * @property integer $idNLVB
 * @property string $name
 * @property integer $isActive
 * @property integer $isDeleted
 * @property integer $donViRieng
 * @property integer $thuTu
 * @property integer $useHieuLuc
 * @property integer $noCheckTheoNam
 */
class VbLoaivanban extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'vb_loaivanban';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['maSo', 'kyHieu', 'idNLVB', 'name'], 'required'],
            [['maSo', 'kyHieu', 'name'], 'string'],
            [['thuTu','useHieuLuc', 'idNLVB', 'isActive', 'isDeleted','donViRieng','noCheckTheoNam'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idLVB' => 'Id Lvb',
            'maSo' => 'Ma So',
            'kyHieu' => 'Ky Hieu',
            'idNLVB' => 'Id Nlvb',
            'name' => 'Name',
            'isActive' => 'Is Active',
            'isDeleted' => 'Is Deleted',
            'donViRieng'=>'don Vi Rieng',
            'thuTu' => 'Thu Tu',
            'useHieuLuc'=>'use Hieu Luc',
            'noCheckTheoNam'=>'no Check Theo Nam'
        ];
    }
}
