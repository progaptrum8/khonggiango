<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ql_filedinhkem".
 *
 * @property integer $idDK
 * @property integer $type
 * @property integer $idObject
 * @property string $maSo
 * @property string $fileName
 * @property string $mime
 * @property string $content
 * @property string $dirPath
 */
class QlFiledinhkem extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ql_filedinhkem';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idObject','idCreatedUser','chonBanHanh'], 'integer'],
            [['content', 'dirPath'], 'string'],
            [['maSo'], 'string', 'max' => 50],
            [['fileName', 'mime'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idDK' => 'Id Dk',
            'idObject' => 'Id Object',
            'maSo' => 'Ma So',
            'fileName' => 'File Name',
            'mime' => 'Mime',
            'content' => 'Content',
            'dirPath' => 'Dir Path',
            'idCreatedUser'=>'Id Created User',
            'chonBanHanh' => 'chon Ban Hanh'
        ];
    }
    
    public function getNguoiTao(){
        return $this->hasOne(User::className(), ['id' => 'idCreatedUser']);
    }

    public function saveFile($idObject,$type,$files,$fileField="fileUpload",$filePath="",$fileRaw=true,$note="")
    {
        try{
            $return=array();
            if (isset($fileRaw) && $fileRaw === true) {
                if(isset($_FILES[$fileField])){
                    if(is_array($_FILES[$fileField]["name"])){                    
                        for($i=0;$i<count($_FILES[$fileField]["name"]);$i++){
                            if ($_FILES[$fileField]["name"][$i] != '' && $_FILES[$fileField]["tmp_name"][$i] != '') {
                                $fileUploadTemp = $_FILES[$fileField]["tmp_name"][$i];
                                $fileUpload = explode(".", $_FILES[$fileField]["name"][$i]);
                                reset($fileUpload);
                                $fileName = $_FILES[$fileField]["name"][$i];
                                $fileExt = strtolower(end($fileUpload));
                                $fileType = $_FILES[$fileField]["type"][$i];
                                $fileContent = 'true';
                                $result= self::saveFileToDiskAndDB($idObject,$type,$fileName,$fileExt,$fileContent,$fileType,$fileUploadTemp,$filePath,$fileRaw,$note);
                                array_push($return, $result);
                            }
                        }
                    }else if ($_FILES[$fileField]["name"] != '' && $_FILES[$fileField]["tmp_name"] != '') {
                        $fileUploadTemp = $_FILES[$fileField]["tmp_name"];
                        $fileUpload = explode(".", $_FILES[$fileField]["name"]);
                        reset($fileUpload);
                        $fileName = $_FILES[$fileField]["name"];
                        $fileExt = strtolower(end($fileUpload));
                        $fileType = $_FILES[$fileField]["type"];
                        $fileContent = 'true';
                        $return= self::saveFileToDiskAndDB($idObject,$type,$fileName,$fileExt,$fileContent,$fileType,$fileUploadTemp,$filePath,$fileRaw,$note);
                    }else{
                        $return= array('status' => false, 'codeStatus'=>'0', 'messager' => 'Cannot upload file.', 'idDK'=>0);
                    }
                }else{
                    $return= array('status' => false, 'codeStatus'=>'0', 'messager' => 'Cannot upload file.', 'idDK'=>0);
                }
            }else{
                if(isset($files)){
                    if(is_array($files)){
                        foreach ($files as $file){
                            $fileName = $file['fileName'];
                            $fileExt = strtolower($file['fileExt']);
                            $fileContent = $file['fileContent'];
                            $fileType = $file['fileType'];
                            $result= self::saveFileToDiskAndDB($idObject,$type,$fileName,$fileExt,$fileContent,$fileType,$fileUploadTemp,$filePath,$fileRaw,$note);
                            array_push($return, $result);
                        }
                    }else{
                        $fileName = $files['fileName'];
                        $fileExt = strtolower($files['fileExt']);
                        $fileContent = $files['fileContent'];
                        $fileType = $files['fileType'];
                        $return= self::saveFileToDiskAndDB($idObject,$type,$fileName,$fileExt,$fileContent,$fileType,$fileUploadTemp,$filePath,$fileRaw,$note);
                    }
                }else{
                    $return= array('status' => false, 'codeStatus'=>'0', 'messager' => 'Cannot upload file.', 'idDK'=>0);
                }
            }
            return $return;
        } catch (Exception $e){
            return array('status' => false, 'codeStatus'=>'-1', 'messager' => 'Cannot upload file.', 'idDK'=>0);
        }
    }
    
    public function saveFileToDiskAndDB($idObject,$type,$fileName,$fileExt,$fileContent,$fileType,$fileUploadTemp,$filePath,$fileRaw,$note){
        $status = false;
        $codeStatus = 0; 
        $messager = 'Cannot upload file.';
        $idDK=0;
        $md5Name="";
        if ($fileName != '' && $fileExt != '' && $fileContent != '' && $fileType != '') {
            if ($filePath == '') {
                $filePath = Yii::$app->params['filePath'];
            }
            $md5Name = md5($fileName . date('Y-m-d H:i:s') . microtime());
            $pathNew = $filePath . "/" . $md5Name;
            $filePath = Yii::$app->params['pathFileCustom']. $pathNew;
            if (file_exists($filePath)) {
                $codeStatus = 1;
                $messager = "File is valid.";
            } else {
                if (isset($fileRaw) && $fileRaw === true) {
                    if (move_uploaded_file($fileUploadTemp, $filePath)) {  
                        $codeStatus = 4;
                        $messager = "Upload file success:" . $filePath;
                    } else {
                        $codeStatus = 2;
                        $messager = "Sorry, there was an error uploading your file.";
                    }
                } else {
                    if (file_put_contents($filePath, base64_decode($fileContent)) !== false) {
                        $codeStatus = 4;
                        $messager = "Upload file success:" . $filePath;
                    } else {
                        $codeStatus = 2;
                        $messager = "Sorry, there was an error uploading your file.";
                    }
                }
                if ($codeStatus == 4) {
                    //save to fileDinhKem
                    $fileDinhKem = new QlFiledinhkem();
                    $fileDinhKem->fileName= $fileName;
                    $fileDinhKem->mime = $fileType;
                    $fileDinhKem->dirPath =$pathNew;
                    $fileDinhKem->content=$note;
                    $fileDinhKem->maSo =$md5Name;
                    $fileDinhKem->idObject = $idObject;
                    $fileDinhKem->chonBanHanh =1;
                    $fileDinhKem->idCreatedUser = Yii::$app->user->identity->id;
                    if($fileDinhKem->validate()){
                        $status = true;
                        $fileDinhKem->save();
                        $idDK = $fileDinhKem->idDK;
                    }else{
                        $messager = "Save Upload file error";
                    }
                }
            }            
        }
        return array('status' => $status, 'codeStatus'=>$codeStatus, 'messager' => $messager, 'idDK'=>$idDK);
    }

    static function getDataFileAfterResize($fileData) {
        try {
            $pathFile = Yii::$app->params['pathFileCustom'] . '\Upload/';
            $file = $fileData['tmp_name'];
            $sourceProperties = getimagesize($file);
            $ext = pathinfo($fileData['name'], PATHINFO_EXTENSION);
            $fileNewName = md5($fileData['name']).".".$ext;
            
            $imageType = $sourceProperties[2];
            switch ($imageType) {
                case IMAGETYPE_PNG:
                    $imageResourceId = imagecreatefrompng($file); 
                    $targetLayer = self::imageResize($imageResourceId,$sourceProperties[0],$sourceProperties[1]);
                    imagepng($targetLayer,$pathFile. $fileNewName);
                    break;
                case IMAGETYPE_GIF:
                    $imageResourceId = imagecreatefromgif($file); 
                    $targetLayer = self::imageResize($imageResourceId,$sourceProperties[0],$sourceProperties[1]);
                    imagegif($targetLayer,$pathFile. $fileNewName);
                    break;
                case IMAGETYPE_JPEG:
                    $imageResourceId = imagecreatefromjpeg($file);
                    $targetLayer = self::imageResize($imageResourceId,$sourceProperties[0],$sourceProperties[1]);
                    imagejpeg($targetLayer,$pathFile. $fileNewName);
                    break;
                default:
                    echo "Invalid Image type.";
                    exit;
                    break;
            }
            $urlThumbnail = "/Upload/".$fileNewName;
            return [
                'urlThumbnail' => $urlThumbnail
            ]; 
        } catch (Exception $e) {
            return array();
        }
        
    }

    static function imageResize($imageResourceId,$width,$height) {
        $targetWidth =480;
        $targetHeight =249;
        $targetLayer= imagecreatetruecolor($targetWidth,$targetHeight);
        imagecopyresampled($targetLayer,$imageResourceId,0,0,0,0,$targetWidth,$targetHeight, $width,$height);
        return $targetLayer;
    }

    public static function insertAttachmentToDb($data){
        try {
            $values = "";
            if(count($data) > 0){
                foreach ($data as $value) {
                    $values .= ",( ".$value['idProject']." , '".$value['maSo']."' ,'".$value['fileName']."', '".$value['mime']."' , '/Upload/".$value['maSo']."' )";
                }
                $values = trim($values,",");
            }

            if($values != "" && $values != null){
                $sql = "INSERT INTO ql_filedinhkem(idObject, maSo, fileName, mime, dirPath) VALUES $values";
                $command    = Yii::$app->db->createCommand($sql);
                $command->execute();
            }

            return true;
        } catch (Exception $e) {
            return false;
        }
    }
}
