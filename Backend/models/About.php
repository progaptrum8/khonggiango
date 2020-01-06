<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "auth_assignment".
 *
 * @property string $item_name
 * @property string $user_id
 * @property integer $created_at
 *
 * @property AuthItem $itemName
 */
class About extends \yii\db\ActiveRecord
{
    
    public function rules()
    {
        return [
            [['content'], 'required'],
        ];
    }

    public static function tableName()
    {
        return 'about';
    }

}
