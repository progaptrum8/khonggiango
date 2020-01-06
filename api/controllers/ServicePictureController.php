<?php
    namespace api\controllers;

    use Yii;
    use yii\db\Expression;
    use api\components\ApiHelper;
    use api\components\ApiController;
    use common\models\Comments;
    use common\models\InvitedSession;
    use common\models\NotifyUser;
    use common\models\Sessions;
    use common\models\Notify;
    use common\models\Users;

    class ServicePictureController extends ApiController
    {
        // Set layout for controller
        public $layout = '';

        public function actionUpload()
        {
            $action = "";

            try {
                $allowAlertNodeJs = 1;
                $idSession = Yii::$app->request->post('idSession');
                $idEditComment = Yii::$app->request->post('idEditComment');
                $filePathFromCellar = Yii::$app->request->post('filePath');
                $filePathFromCellar = str_replace('http://', 'https://', $filePathFromCellar);
                $idUserComment = Yii::$app->request->post('idUserComment');
                $title = "";

                // Get title of session for push notification
                $session = Sessions::findOne((int)$idSession);

                if ( !isset($session) ) {
                    $dataReturn = array(
                        'isSessionExist' => false
                    );

                    return ApiHelper::sendResponse(200, '', $dataReturn);
                }

                if ( $session->active == 1 ) {
                    $allowAlertNodeJs = 0;
                }

                $title = $session->title;

                if ( (int)$idEditComment === 0 ) {
                    $modelImgComment = new Comments();
                    $content = "Added a picture comment";
                    $modelImgComment->idUserComment = $idUserComment;
                    $modelImgComment->idSession = $idSession;
                    $modelImgComment->contentMediaType = "PICTURE";
                    $modelImgComment->dateCreate = new Expression('NOW()');
                    $modelImgComment->lastUpdate = new Expression('NOW()');
                    $modelImgComment->contentMediaPath = $filePathFromCellar;
                    $modelImgComment->save();

                    $typeStatus = "add";
                    $action = "addPictureComment";
                    $idComment = $modelImgComment->idComment;
                    $idCommentParent = $modelImgComment->idCommentParent;

                    //Add Notify
                    $notifyNew = new Notify();
                    $notifyNew->createUserId = $idUserComment;
                    $notifyNew->dateCreate = new Expression('NOW()');
                    $notifyNew->typeNotify = 'COMM';
                    $notifyNew->content = 'Added a picture comment';
                    $notifyNew->link = (int)$modelImgComment->idComment;
                    $notifyNew->seconds = time();
                    $notifyNew->save();

                    //End add notify
                    $dataIdUser = InvitedSession::getIdUserCreateAndInvitedUser($modelImgComment->idSession);
                    $arrayUserInvited = $this->arrayColumn($dataIdUser, 'idUser');

                    foreach ( $dataIdUser as $rowInvited ) {
                        if ( $rowInvited['idUser'] != $idUserComment ) {
                            //Send notify user
                            $notifyUserNew = new NotifyUser();
                            $notifyUserNew->userId = (int)$rowInvited['idUser'];
                            $notifyUserNew->notifyId = (int)$notifyNew->notifyId;
                            $notifyUserNew->dateRead = new Expression('NOW()');
                            $notifyUserNew->idLink = 'COMM' . (int)$modelImgComment->idComment;
                            $notifyUserNew->save();
                            //End send notify user
                        }
                    }
                } else {
                    $content = "Edited a picture comment";
                    $modelImageCommentEdit = Comments::findOne((int)$idEditComment);
                    $modelImageCommentEdit->lastUpdate = new Expression('NOW()');
                    $modelImageCommentEdit->contentMediaPath = $filePathFromCellar;
                    $modelImageCommentEdit->save();
                    $typeStatus = "edit";
                    $action = "editPictureComment";
                    $idComment = $modelImageCommentEdit->idComment;
                    $idCommentParent = $modelImageCommentEdit->idCommentParent;
                    //Add Notify
                    $notifyNew = new Notify();
                    $notifyNew->createUserId = Yii::$app->request->post('idUserComment');
                    $notifyNew->dateCreate = new Expression('NOW()');
                    $notifyNew->typeNotify = 'COMM';
                    $notifyNew->content = 'Edited a picture comment';
                    $notifyNew->link = (int)$modelImageCommentEdit->idComment;
                    $notifyNew->seconds = time();
                    $notifyNew->save();
                    //End add notify
                    $dataIdUser = InvitedSession::getIdUserCreateAndInvitedUser($modelImageCommentEdit->idSession);
                    $arrayUserInvited = $this->arrayColumn($dataIdUser, 'idUser');
                }

                $invitedUsers = InvitedSession::getIdUserCreateAndInvitedUser($idSession);
                $invitedUsers = $this->arrayColumn($invitedUsers, 'idUser');
                $currentUser = Users::findOne($idUserComment);

                $redirect = array(
                    'onclick' => 'showSessionDetailFromComment',
                    'idSession' => $idSession,
                    'idComment' => $idComment
                );

                $dataReturn = array(
                    'avaPath' => $currentUser->avatarPath,
                    'content' => $content,
                    'fullNameOfCreator' => $currentUser->firstName . " " . $currentUser->lastName,
                    'title' => $title,
                    'ownerId' => $idUserComment,
                    'gender' => ($currentUser->gender == 1) ? "his" : "her",
                    'time' => time(),
                    'type' => 'comm',
                    'notifyId' => $notifyNew->notifyId,
                    'typeComment' => "picture",
                    'invitedUser' => $invitedUsers,
                    'typeAction' => $typeStatus,
                    'status' => 'true',
                    'typeStatus' => $typeStatus,
                    'idComment' => $idComment,
                    'idSession' => $idSession,
                    'idCommentParent' => (int)$idCommentParent,
                    'sessionInvited' => $arrayUserInvited,
                    'action' => $action,
                    'redirect' => $redirect,
                    'allowAlertNodeJs' => $allowAlertNodeJs,
                    'isSessionExist' => true
                );

                return ApiHelper::sendResponse(200, '', $dataReturn);

            } catch ( \Exception $ex ) {
                return ApiHelper::sendResponse(500, '', 'Error ' . $ex);
            }
        }

        public function saveFileToDisk($fileImagesFolderPath = "")
        {
            $status = false;
            $path = '';
            $pathURL = '';
            $codeStatus = 0;
            $messager = 'Cannot upload file.';
            $type = "";

            $fileName = Yii::$app->request->post('fileName');
            $fileExt = strtolower(Yii::$app->request->post('fileExt'));
            $fileContent = Yii::$app->request->post('fileContent');
            $fileType = Yii::$app->request->post('fileType');
            $fileSize = Yii::$app->request->post('fileSize');
            $fileUploadTemp = "";
            $fileRaw = Yii::$app->request->post('fileRaw');

            if ( isset($fileRaw) && $fileRaw === "true" ) {
                if ( isset($_FILES["fileUpload"]) && $_FILES["fileUpload"]["name"] != '' && $_FILES["fileUpload"]["tmp_name"] != '' ) {
                    $fileUploadTemp = $_FILES["fileUpload"]["tmp_name"];
                    $fileUpload = explode(".", $_FILES["fileUpload"]["name"]);
                    reset($fileUpload);
                    $fileName = current($fileUpload);
                    $fileExt = strtolower(end($fileUpload));
                    $fileType = $_FILES["fileUpload"]["type"];
                    $fileSize = $_FILES["fileUpload"]["size"];
                    $fileContent = 'true';
                }
            }

            if ( $fileName != '' && $fileExt != '' && $fileContent != '' && $fileType != '' && $fileSize != '' ) {
                if ( $fileImagesFolderPath == '' ) {
                    $fileImagesFolderPath = Yii::$app->params['fileImagesFolderPath'];
                }

                $allowedExts = array(
                    "gif",
                    "jpg",
                    "jpeg",
                    "png"
                );

                if ( (($fileType == "image/gif" || $fileType == "image/jpeg" || $fileType == "image/jpg" || $fileType == "image/pjpeg" || $fileType == "image/x-png" || $fileType == "image/png" || $fileType == "application/octet-stream")) && in_array($fileExt, $allowedExts) ) {
                    $md5Name = md5($fileName . date('Y-m-d H:i:s') . microtime());
                    $pathNew = $fileImagesFolderPath . "/" . $md5Name . '.' . $fileExt;
                    //                    $filePath = Yii::getpathOfAlias('webroot') . $pathNew;
                    $filePath = Yii::getAlias('webroot') . $pathNew;

                    if ( file_exists($filePath) ) {
                        $codeStatus = 1;
                        $messager = "File is valid.";
                    } else {
                        if ( isset($fileRaw) && $fileRaw === "true" ) {
                            if ( move_uploaded_file($fileUploadTemp, $filePath) ) {
                                $status = true;
                                $path = $filePath;
                                $pathURL = $pathNew;
                                $codeStatus = 4;
                                $messager = "Upload file success:" . $filePath;
                                $type = $fileType;
                            } else {
                                $codeStatus = 2;
                                $messager = "Sorry, there was an error uploading your file.";
                            }
                        } else {
                            if ( file_put_contents($filePath, base64_decode($fileContent)) !== false ) {
                                $status = true;
                                $path = $filePath;
                                $pathURL = $pathNew;
                                $codeStatus = 4;
                                $messager = "Upload file success:" . $filePath;
                                $type = $fileType;
                            } else {
                                $codeStatus = 2;
                                $messager = "Sorry, there was an error uploading your file.";
                            }
                        }
                    }
                } else {
                    $codeStatus = 3;
                    $messager = "File is unvalid: not in alowed extention.";
                }
            }

            if ( $status && $codeStatus == 4 ) {
                // Resize image if width > maxWidth
                list($width) = getimagesize($path);

                if ( $width > 800 && isset($md5Name) ) {
                    $folderPath = Yii::getAlias('webroot') . $fileImagesFolderPath . '/';
                    $newPic = $this->createThumbnailImage($folderPath, $path, 800);
                    if ( $newPic && $newPic != "" ) {
                        if ( file_exists($path) ) {
                            unlink($path);
                        }

                        $fileNameNew = $md5Name . '_thumbnail.' . $fileExt;
                        $path = $folderPath . $fileNameNew;
                        $pathURL = $fileImagesFolderPath . "/" . $fileNameNew;
                    }
                }
            }

            return array(
                'status' => $status,
                'path' => $path,
                'messager' => $messager,
                'codeStatus' => $codeStatus,
                'type' => $type,
                'pathURL' => $pathURL
            );
        }
    }