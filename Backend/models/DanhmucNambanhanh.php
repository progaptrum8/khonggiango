<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "danhmuc_nambanhanh".
 *
 * @property integer $id
 * @property integer $fromYear
 * @property integer $toYear
 */
class Products extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'products';
    }

}
