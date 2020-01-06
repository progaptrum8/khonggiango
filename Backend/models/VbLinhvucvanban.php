<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "vb_linhvucvanban".
 *
 * @property integer $idLV
 * @property string $name
 * @property integer $idParent
 * @property integer $isActive
 * @property integer $isDeleted
 * @property integer $thuTu
 */
class VbLinhvucvanban extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'vb_linhvucvanban';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string'],
            [['idParent', 'isActive', 'isDeleted','thuTu'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idLV' => 'Id Lv',
            'name' => 'Name',
            'idParent' => 'Id Parent',
            'isActive' => 'Is Active',
            'isDeleted' => 'Is Deleted',
            'thuTu'=>'Thu Tu'
        ];
    }
}
