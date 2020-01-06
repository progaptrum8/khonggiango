<?php
namespace app\modules\thongtin\controllers;
use app\models\Products;
use app\models\User;
use app\models\QlFiledinhkem;
use Yii;
/**
 * Default controller for the `thongtin` module
 */
class FiledinhkemController extends \yii\web\Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionDownload(){
        $maSoId = trim(Yii::$app->request->get("maSo"));
        $isRaw64 = (int)Yii::$app->request->get("isRaw64");
        $pathCustomRoot = Yii::$app->params['pathFileCustom'];
        if($maSoId!=""||$maSoId!=null){
            $file = QlFiledinhkem::find()->where(['maSo'=>$maSoId])->one();
            if(file_exists($pathCustomRoot.$file->dirPath)){
                if($isRaw64==1){
                    echo base64_encode(file_get_contents($pathCustomRoot.$file->dirPath));
                    exit;
                }
                header('Content-Disposition: attachment; filename="'.$file->fileName.'"' );
                header("Access-Control-Allow-Origin: *");
                header("Pragma: public");
                header("Expires: 0");
                header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
                header("Content-type:".$file->mime );
                echo file_get_contents($pathCustomRoot.$file->dirPath);
                exit;
            }else{
                echo "File không tồn tại";
                exit;
            }
        }else{
            echo "File không tồn tại";
            exit;
        }
        exit;
    }
    public function actionShowImage(){
        $dirPath = trim(Yii::$app->request->get("dirPath"));
        $dirPath = base64_decode($dirPath);
        $pathCustomRoot = Yii::$app->params['pathFileCustom'];
        $file = [];
        $fileName = "";
        if($dirPath != "" && $dirPath != null){
            $fileName = substr($dirPath, strpos($dirPath, "Upload/") + 7);
            $ext = pathinfo($pathCustomRoot.$dirPath, PATHINFO_EXTENSION);
            if(file_exists($pathCustomRoot.$dirPath)){
                if($isRaw64==1){
                    echo base64_encode(file_get_contents($pathCustomRoot.$dirPath));
                    exit;
                }
                header('Content-Disposition: attachment; filename="'.$fileName.'"' );
                header("Access-Control-Allow-Origin: *");
                header("Pragma: public");
                header("Expires: 0");
                header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
                header("Content-type:".$ext );
                echo file_get_contents($pathCustomRoot.$dirPath);
                exit;
            }
        }
        
    }
}
