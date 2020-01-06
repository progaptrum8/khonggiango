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
class Products extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return 'products';
    }

    public function behaviors()
    {
    	return [
    		[
    			'class' => SluggableBehavior::className(),
    			'attribute' => 'title',
    			'slugAttribute' => 'slug',
    			'ensureUnique' => true
    		],
    	];
    }

}
