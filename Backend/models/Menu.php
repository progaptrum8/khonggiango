<?php

namespace app\models;

use Yii;
use yii\db\Query;

/**
 * This is the model class for table "menu".
 *
 * @property integer $id
 * @property string $name
 * @property integer $parent
 * @property string $route
 * @property integer $order
 * @property string $data
 * @property string $class
 */
class Menu extends \yii\db\ActiveRecord
{
    private static $_routes;
    public $parent_name;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'menu';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['parent_name'], 'in',
                'range' => static::find()->select(['name'])->column(),
                'message' => 'Menu "{value}" không tồn tại.'],
            [['parent'], 'default'],
            [['parent'], 'filterParent', 'when' => function() {
                return !$this->isNewRecord;
            }],
            [['name', 'route', 'data','class'], 'string'],
            [['order'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'parent' => 'Parent',
            'route' => 'Route',
            'order' => 'Order',
            'data' => 'Data',
            'class' => 'Class',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMenuParent()
    {
        return $this->hasOne(Menu::className(), ['id' => 'parent']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMenus()
    {
        return $this->hasMany(Menu::className(), ['parent' => 'id']);
    }
    
    public static function getAppRoutes()
    {
        if (self::$_routes === null) {
            self::$_routes = [];
            $routeModel = new \app\modules\qtht\models\Chucnang();
            $routes=  $routeModel->getAppRoutes();
            foreach ($routes as $name => $value) {
                if ($name[0] === '/' && substr($name, -1) != '*') {
                    self::$_routes[] = $name;
                }
            }            
        }
        return self::$_routes;
    }
    
    public static function getAppRoutesAll()
    {
        if (self::$_routes === null) {
            self::$_routes = [];
            $routeModel = new \app\modules\qtht\models\Chucnang();
            $routes=  $routeModel->getAppRoutes();
            foreach ($routes as $name => $value) {
                self::$_routes[] = $name;                
            }            
        }
        return self::$_routes;
    }
    
    public static function getSavedRoutes()
    {
        if (self::$_routes === null) {
            self::$_routes = [];
            foreach (Yii::$app->getAuthManager()->getPermissions() as $name => $value) {
                if ($name[0] === '/' && substr($name, -1) != '*') {
                    self::$_routes[] = $name;
                }
            }
        }
        return self::$_routes;
    }
    
    public function filterParent()
    {
        $parent = $this->parent;
        $db = static::getDb();
        $query = (new Query)->select(['parent'])
            ->from(static::tableName())
            ->where('[[id]]=:id');
        while ($parent) {
            if ($this->id == $parent) {
                $this->addError('parent_name', 'Cấp menu cha không thể trùng với menu hiện tại.');
                return;
            }
            $parent = $query->params([':id' => $parent])->scalar($db);
        }
    }
}
