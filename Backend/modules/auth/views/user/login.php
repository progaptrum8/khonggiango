<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Đăng nhập hệ thống';
?>
<div class="login-box-body">
    <h2 class="login-box-msg"><?= Html::encode($this->title) ?></h2>
    <?php 
    $form = ActiveForm::begin([
        'id' => 'login-form',
    ]); 
    $cookies = Yii::$app->request->cookies;
    echo $form->field($model, 'email',[
            'template' => "{input}<i class='fa fa-fw fa-envelope form-control-feedback'></i>{error}",
            'options' => [
                'class' => 'form-group has-feedback',                
            ]])->textInput(['placeholder' => 'Địa chỉ thư điện tử','value' => $cookies->getValue('email', ''),'class' => 'form-control','autofocus' => true]);
    
    echo $form->field($model, 'password',[
            'template' => "{input}<i class='fa fa-fw fa-lock form-control-feedback'></i>{error}",
            'options' => [
                'class' => 'form-group has-feedback',                
            ]])->passwordInput(['placeholder' => 'Mật khẩu','value' => $cookies->getValue('password', ''),'class' => 'form-control']);
    ?>
    <div class="form-group">
        <div class="pull-left">
            <?php
                echo $form->field($model, 'rememberMe',[
                    'options' => [
                        'class' => 'checkbox'
                    ]])->checkbox(['template' => "<label>{input} Nhớ password {error}</label>"]);
            ?>
        </div><!-- /.col -->
        <div class="pull-right">
            <?= Html::submitButton('Đăng nhập', ['class' => 'btn btn-primary btn-block btn-flat', 'name' => 'loginButton']) ?>
        </div><!-- /.col -->
    </div>
    <?php ActiveForm::end(); ?>
</div><!-- /.login-box-body -->
