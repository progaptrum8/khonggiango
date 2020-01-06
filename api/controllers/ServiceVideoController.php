<?php
    namespace api\controllers;

    use Yii;
    use yii\db\Expression;
    use api\components\ApiHelper;
    use api\components\ApiController;
    use common\models\Comments;
    use common\models\InvitedSession;
    use common\models\Notify;
    use common\models\NotifyUser;
    use common\models\Sessions;
    use common\models\Users;

    class ServiceVideoController extends ApiController
    {

        // Set layout for controller
        public $layout = '';
        //public $limitVideoDuration =  0;
        public $limitVideoSize = 1073741824;//102400000;

        public function actionUpload()
        {
            try {
                $allowAlertNodeJs = 1;
                $idSession = Yii::$app->request->post('idSession');
                $idCommentEdit = Yii::$app->request->post('idEditComment');
                $folderPath = Yii::$app->params['fileVideoFolderPath'];
                $idUserComment = Yii::$app->request->post('idUserComment');
                $filePathFromCellar = Yii::$app->request->post('filePath');
                $filePathFromCellar = str_replace('http://', 'https://', $filePathFromCellar); // Replace http to https
                $thumbnailPathFromCellar = Yii::$app->request->post('thumbPath');
                $thumbnailPathFromCellar = str_replace('http://', 'https://', $thumbnailPathFromCellar); // Replace http to https
                $title = "";

                $action = "addVideoComment";

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

                if ( (int)$idCommentEdit === 0 ) {
                    //create Comment Temp
                    $commentNew = new Comments();
                    //$commentNew->idUserComment = Yii::$app->user->idUser;
                    $content = "Added a video comment";
                    $commentNew->idUserComment = $idUserComment;
                    $commentNew->idSession = $idSession;
                    $commentNew->contentMediaType = "VIDEO";
                    $commentNew->dateCreate = new Expression('NOW()');
                    $commentNew->lastUpdate = new Expression('NOW()');
                    $commentNew->contentMediaPathTemp = "";
                    $commentNew->contentMediaPath = $filePathFromCellar;

                    //Vinhnx added
                    $commentNew->contentMediaThumbnailPath = $thumbnailPathFromCellar;

                    $commentNew->isTemp = 0;
                    $commentNew->save();
                    $typeStatus = 'add';
                    $idComment = $commentNew->idComment;
                    $idCommentParent = $commentNew->idCommentParent;

                    //Add Notify
                    $notifyNew = new Notify();
                    $notifyNew->createUserId = $idUserComment;
                    $notifyNew->dateCreate = new Expression('NOW()');
                    $notifyNew->typeNotify = 'COMM';
                    $notifyNew->content = 'Added a video comment';
                    $notifyNew->link = (int)$commentNew->idComment;
                    $notifyNew->seconds = time();
                    $notifyNew->save();

                    //End add notify
                    $dataIdUser = InvitedSession::getIdUserCreateAndInvitedUser($commentNew->idSession);
                    $arrayUserInvited = $this->arrayColumn($dataIdUser, 'idUser');
                    foreach ( $dataIdUser as $rowInvited ) {
                        if ( $rowInvited['idUser'] != $idUserComment ) {
                            //Send notify user
                            $notifyUserNew = new NotifyUser();
                            $notifyUserNew->userId = (int)$rowInvited['idUser'];
                            $notifyUserNew->notifyId = (int)$notifyNew->notifyId;
                            $notifyUserNew->dateRead = new Expression('NOW()');
                            $notifyUserNew->idLink = 'COMM' . (int)$commentNew->idComment;
                            $notifyUserNew->save();
                            //End send notify user
                        }
                    }
                } else {
                    //update comment with fileVideoFolderPathNew
                    $content = "Edited a video comment";
                    $comment = Comments::findOne($idCommentEdit);
                    $comment->contentMediaPathTemp = $filePathFromCellar;
                    $comment->contentMediaPath = $filePathFromCellar;

                    //Vinhnx added
                    $comment->contentMediaThumbnailPath = $thumbnailPathFromCellar;
                    $comment->lastUpdate = new Expression('NOW()');
                    $comment->save();

                    $typeStatus = 'edit';
                    $action = "editVideoComment";
                    $idComment = $comment->idComment;
                    $idCommentParent = $comment->idCommentParent;

                    //Add Notify
                    $notifyNew = new Notify();
                    $notifyNew->createUserId = $idUserComment;//Yii::$app->request->getPost('idUserComment');
                    $notifyNew->dateCreate = new Expression('NOW()');
                    $notifyNew->typeNotify = 'COMM';
                    $notifyNew->content = 'Edited a video comment';
                    $notifyNew->link = (int)$comment->idComment;
                    $notifyNew->seconds = time();
                    $notifyNew->save();
                    //End add notify
                    $dataIdUser = InvitedSession::getIdUserCreateAndInvitedUser($comment->idSession);
                    $arrayUserInvited = $this->arrayColumn($dataIdUser, 'idUser');
                }

                $dataIdUser = InvitedSession::getIdUserCreateAndInvitedUser($idSession);
                $arrayUserInvited = $this->arrayColumn($dataIdUser, 'idUser');
                $currentUser = Users::findOne($idUserComment);

                $redirect = array(
                    'onclick' => 'showSessionDetailFromComment',
                    'idSession' => $idSession,
                    'idComment' => $idComment
                );

                return $dataReturn = array(
                    'avaPath' => $currentUser->avatarPath,
                    'content' => $content,
                    'fullNameOfCreator' => $currentUser->firstName . ' ' . $currentUser->lastName,
                    'title' => $title,
                    'ownerId' => $idUserComment,
                    'gender' => ($currentUser->gender == 1) ? "his" : "her",
                    'time' => time(),
                    'type' => 'comm',
                    'typeComment' => "video",
                    'notifyId' => $notifyNew->notifyId,
                    'invitedUser' => $arrayUserInvited,
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
                return ApiHelper::sendResponse(500, '', 'Error' . $ex);
            }
        }
    }