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
    public static function getDataHome(){
        try {
            $sql = "
                SELECT pd.*,
                    pt.name as nameLoaiSP
                FROM product_types pt
                INNER JOIN products pd ON pd.id_product_type = pt.id
                WHERE pd.is_noibat = 1
            ";
            $command = Yii::$app->db->createCommand($sql);
            $data = $command->queryAll();
            return $data;
        } catch (Exception $e) {
            return array();
        }
    }

    public static function getSameProducts($dataProduct){
        try {
            $sql = "
                SELECT 
                    pd.*,
                    pt.slug as slugProductType
                FROM products pd
                INNER JOIN product_types pt ON pt.id = pd.id_product_type
                WHERE pd.id_danhmuc = ".$dataProduct['id_danhmuc']." AND pd.id != ".$dataProduct['id']."
            ";
            $command = Yii::$app->db->createCommand($sql);
            $data = $command->queryAll();
            return $data;
        } catch (Exception $e) {
            return array();
        }
    }

    public static function getPreviousProduct($dataProduct){
        try {
            $sql = "
                SELECT 
                    pd.*
                FROM products pd
                WHERE pd.id_product_type = ".$dataProduct['id_product_type']."  AND pd.id < ".$dataProduct['id']."
                LIMIT 1
            ";
            $command = Yii::$app->db->createCommand($sql);
            $data = $command->queryOne();
            return $data;
        } catch (Exception $e) {
            return array();
        }
    }

    public static function getNextProduct($dataProduct){
        try {
            $sql = "
                SELECT 
                    pd.*
                FROM products pd
                WHERE pd.id_product_type = ".$dataProduct['id_product_type']."  AND pd.id > ".$dataProduct['id']."
                LIMIT 1
            ";
            $command = Yii::$app->db->createCommand($sql);
            $data = $command->queryOne();
            return $data;
        } catch (Exception $e) {
            return array();
        }
    }

    public static function getInfoProduct($slug){
        try {
            $sql = "
                SELECT 
                    pd.*,
                    ds.name as nameDanhMuc,
                    ds.slug as slugDanhMuc,
                    pt.slug as slugProductType
                FROM products pd
                INNER JOIN danhmuc_sanpham ds ON ds.id = pd.id_danhmuc
                INNER JOIN product_types pt ON pt.id = pd.id_product_type
                WHERE pd.slug = :slug
            ";
            $command = Yii::$app->db->createCommand($sql);
            $command->bindValues([
                ':slug' => $slug,
            ]);
            $data = $command->queryOne();
            return $data;
        } catch (Exception $e) {
            return array();
        }
    }

}
