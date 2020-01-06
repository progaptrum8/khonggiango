<?php
namespace app\modules\auth\models;
use app\models\QlFiledinhkem;
use app\components\CommonUtil;

class User extends \app\models\User implements \yii\web\IdentityInterface
{
    /**
     * @return int|string current user ID
     */
    public function getId()
    {
        return $this->id;
    }
    
    /**
     * Finds an identity by the given ID.
     *
     * @param string|int $id the ID to be looked for
     * @return IdentityInterface|null the identity object that matches the given ID.
     */
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }
    
    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['email' => $email]);
        //return static::findOne(['username' => $username]);       
    }
    
    /**
     * Finds user by email
     *
     * @param string $email
     * @return static|null
     */
    public static function findByEmail($email)
    {
        return static::findOne(['email' => $email]);
    }
    
    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsernameLogin($username)
    {
        return static::findOne(['email' => $username,'isDeleted'=>0,'status'=>1]);
        //return static::findOne(['username' => $username]);       
    }
    
    /**
     * Finds user by email
     *
     * @param string $email
     * @return static|null
     */
    public static function findByEmailLogin($email)
    {
        return static::findOne(['email' => $email,'isDeleted'=>0,'status'=>1]);
    }

    /**
     * Finds an identity by the given token.
     *
     * @param string $token the token to be looked for
     * @return IdentityInterface|null the identity object that matches the given token.
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['accessToken' => $token]);
    }
    
    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if ($this->isNewRecord) {
                $this->authKey = \Yii::$app->security->generateRandomString();
            }
            return true;
        }
        return false;
    }
    
    /**
     * @return string current user auth key
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * @param string $authKey
     * @return bool if auth key is valid for current user
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }
    
    /**
     * @return string current user password
     */
    public function getPassword()
    {
        return $this->password;
    }
    
    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $this->getPassword() === md5($password);
    }
    
    public function getFileAvatar(){
        return $this->hasOne(QlFiledinhkem::className(), ['idObject' => 'id'])->andOnCondition(['type' => CommonUtil::FILE_AVATAR]);
    }
}
