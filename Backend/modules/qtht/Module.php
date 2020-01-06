<?php

namespace app\modules\qtht;

use Yii;
use yii\helpers\Inflector;
/**
 * qtht module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'app\modules\qtht\controllers';
    
    /**
     * @var array Nav bar items.
     */
    public $navbar;
    
    /**
     * @var array 
     * @see [[menus]]
     */
    private $_coreItems = [];
    /**
     * @var array 
     * @see [[items]]
     */
    private $_normalizeMenus;

    /**
     * @var string Default url for breadcrumb
     */
    public $defaultUrl;

    /**
     * @var string Default url label for breadcrumb
     */
    public $defaultUrlLabel;
    
    /**
     * @var array 
     * @see [[menus]]
     */
    private $_menus = [];
    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        //user did not define the Navbar
        if ($this->navbar === null && Yii::$app instanceof \yii\web\Application) {
            $this->navbar = [];
        }
    }
    /**
     * Get avalible menu.
     * @return array
     */
    public function getMenus()
    {
        if ($this->_normalizeMenus === null) {
            $mid = '/' . $this->getUniqueId() . '/';
            // resolve core menus
            $this->_normalizeMenus = [];

            $config = \app\components\Configs::instance();
            $conditions = [
                'user' => $config->db && $config->db->schema->getTableSchema($config->userTable),
                'assignment' => ($userClass = Yii::$app->getUser()->identityClass) && is_subclass_of($userClass, 'yii\db\BaseActiveRecord'),
                'menu' => $config->db && $config->db->schema->getTableSchema($config->menuTable),
            ];
            foreach ($this->_coreItems as $id => $lable) {
                if (!isset($conditions[$id]) || $conditions[$id]) {
                    $this->_normalizeMenus[$id] = ['label' => $lable, 'url' => [$mid . $id]];
                }
            }
            foreach (array_keys($this->controllerMap) as $id) {
                $this->_normalizeMenus[$id] = ['label' => Inflector::humanize($id), 'url' => [$mid . $id]];
            }

            // user configure menus
            foreach ($this->_menus as $id => $value) {
                if (empty($value)) {
                    unset($this->_normalizeMenus[$id]);
                    continue;
                }
                if (is_string($value)) {
                    $value = ['label' => $value];
                }
                $this->_normalizeMenus[$id] = isset($this->_normalizeMenus[$id]) ? array_merge($this->_normalizeMenus[$id], $value)
                        : $value;
                if (!isset($this->_normalizeMenus[$id]['url'])) {
                    $this->_normalizeMenus[$id]['url'] = [$mid . $id];
                }
            }
        }
        return $this->_normalizeMenus;
    }

    /**
     * Set or add avalible menu.
     * @param array $menus
     */
    public function setMenus($menus)
    {
        $this->_menus = array_merge($this->_menus, $menus);
        $this->_normalizeMenus = null;
    }
    
    /**
     * @inheritdoc
     */
    /*
    public function beforeAction($action)
    {
        if (parent::beforeAction($action)) {
            
            $view = $action->controller->getView();

            $view->params['breadcrumbs'][] = [
                'label' => ($this->defaultUrlLabel ?: 'Admin'),
                'url' => ['/' . ($this->defaultUrl ?: $this->uniqueId)]
            ];
            return true;
        }
        return false;
    }
    */
}
