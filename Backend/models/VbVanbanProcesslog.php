<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "vb_vanban_processlog".
 *
 * @property integer $idPL
 * @property integer $idVanBan
 * @property string $ngayChuyen
 * @property integer $idNguoiChuyen
 * @property integer $trangThai
 * @property string $noiDung
 */
class VbVanbanProcesslog extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'vb_vanban_processlog';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idVanBan', 'ngayChuyen', 'idNguoiChuyen'], 'required'],
            [['idVanBan', 'idNguoiChuyen', 'trangThai'], 'integer'],
            [['ngayChuyen'], 'safe'],
            [['noiDung'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idPL' => 'Id Pl',
            'idVanBan' => 'Id Van Ban',
            'ngayChuyen' => 'Ngay Chuyen',
            'idNguoiChuyen' => 'Id Nguoi Chuyen',
            'trangThai' => 'Trang Thai',
            'noiDung' => 'Noi Dung',
        ];
    }
    public function getNguoiChuyen(){
        return $this->hasOne(User::className(), ['id' => 'idNguoiChuyen']);
    }
}
