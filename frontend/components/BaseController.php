<?php
namespace frontend\components;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use frontend\controllers\filters\AccessControlFilter;
/**
 * BaseController
 */
class BaseController extends Controller
{
    public function behaviors()
    {
        $behaviors = parent::behaviors();

        $behaviors['access'] = [
            'class' => AccessControlFilter::className()
        ];

        return $behaviors;
    }
}
