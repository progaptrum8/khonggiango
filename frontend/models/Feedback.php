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
class Feedback extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return 'feedback';
    }

    public static function getFeedback($productId){
        try {
            $sql = "
                SELECT fb.*
                FROM feedback fb
                WHERE fb.product_id = ".$productId." AND fb.status = 1
                ORDER BY fb.created_date ASC 
            ";
            $command = Yii::$app->db->createCommand($sql);
            $data = $command->queryAll();
            return $data;
        } catch (Exception $e) {
            return array();
        }
    }

    public static function getDataLoadMore($productId, $offset, $litmit){
        try {
            $sql = "
                SELECT 
                	fb.fullname,
					fb.email,
					fb.`comment`,
					date_format(fb.created_date,'%d-%m-%Y %r') as created_date
                FROM feedback fb
                WHERE fb.product_id = ".$productId." AND fb.status = 1
                ORDER BY fb.created_date ASC
                LIMIT $litmit OFFSET $offset
            ";
            $command = Yii::$app->db->createCommand($sql);
            $data = $command->queryAll();
            return $data;
        } catch (Exception $e) {
            return array();
        }
    }
}
