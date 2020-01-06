<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class Friend extends ActiveRecord
{
    public static function tableName()
    {
        return 'friends';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            
        ];
    }


    
}