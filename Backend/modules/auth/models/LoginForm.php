<?php

namespace app\modules\auth\models;

use Yii;
use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 *
 * @property User|null $user This property is read-only.
 *
 */
class LoginForm extends Model
{
    public $email;
    public $password;
    public $rememberMe = true;

    private $_user = false;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['email'], 'required','message' => 'Địa chỉ thư điện tử không thể bỏ trống.'],
            [['password'], 'required','message' => 'Mật khẩu không thể bỏ trống.'],
            // rememberMe must be a boolean value
            ['rememberMe', 'boolean'],
            // password is validated by validatePassword()
            ['password', 'validatePassword'],
        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();

            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, 'Sai địa chỉ thư điện tử hoặc mật khẩu.');
            }
        }
    }

    /**
     * Logs in a user using the provided username and password.
     * @return bool whether the user is logged in successfully
     */
    public function login()
    {
        $cookies = Yii::$app->response->cookies;
        // remove a cookie
        $cookies->remove('email');
        $cookies->remove('password');
        if($this->rememberMe){
            $cookies->add(new \yii\web\Cookie([
                'name' => 'email',
                'value' => $this->email,
            ]));
            $cookies->add(new \yii\web\Cookie([
                'name' => 'password',
                'value' => $this->password,
            ]));
        }
        if ($this->validate()) {            
            
            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600*24*30 : 0);
        }
        return false;
    }

    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    public function getUser()
    {
        if ($this->_user === false) {
            $this->_user = User::findByEmailLogin($this->email);
        }

        return $this->_user;
    }
}
