<?php

namespace app\models;

use Yii;
use yii\behaviors\SluggableBehavior;

/**
 * This is the model class for table "auth_assignment".
 *
 * @property string $item_name
 * @property string $user_id
 * @property integer $created_at
 *
 * @property AuthItem $itemName
 */
class DanhMucSanPham extends \yii\db\ActiveRecord
{
    
    public function rules()
    {
        return [
            [['name'], 'required'],
        ];
    }

    public static function tableName()
    {
        return 'danhmuc_sanpham';
    }

    public function behaviors()
    {
        return [
            [
                'class' => SluggableBehavior::className(),
                'attribute' => 'name',
                'slugAttribute' => 'slug',
                'ensureUnique' => true
            ],
        ];
    }

}
