<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\helpers\Url;
use app\models\QlFiledinhkem;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <!--<title><?= Html::encode($this->title) ?></title>-->
        <title>Hệ thống Salon Không Gian Gỗ TP Đà Nẵng</title>
        <?php $this->head() ?>
    </head>
    <body class="skin-blue sidebar-mini sidebar-collapse">
        <?php $this->beginBody() ?>
        <div class="wrapper">
            <header class="main-header">
                <div class="main-header text-center alert-danger displayOutSession" style="display:none">
                    Đã quá lâu bạn không thao tác trên trang. Bạn sẽ phải đăng nhập lại để thao tác  sau 00:00:<span>10</span> giây.
                    <a>Mở rộng thời gian</a>
                </div>                
                <!-- Logo -->
<!--                <a href="/" class="logo">
                     mini logo for sidebar mini 50x50 pixels 
                    <span class="logo-mini"><b>A</b>llimi</span>
                     logo for regular state and mobile devices 
                    <span class="logo-lg"><b>Allimi</b> Sở Nội vụ</span>
                </a>-->
                <!-- Header Navbar: style can be found in header.less -->
                <nav class="navbar navbar-static-top" role="navigation">
                    <!-- Sidebar toggle button-->
                    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                        <span class="sr-only">Toggle navigation</span>
                    </a>
                    <a href="/" class="logo hidden-xs">
                        <span class="logo-mini"><b>Hệ thống Salon Không Gian Gỗ</b> TP Đà Nẵng</span>
                        <span class="logo-lg"><b>Hệ thống Salon Không Gian Gỗ</b> TP Đà Nẵng</span>
                    </a>
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <!-- User Account-->
                            <?php
                            if(Yii::$app->user->isGuest){
                            ?>
                            <li>
                                <a href="/auth/user/login"><i class="fa fa-fw fa-sign-in"></i>Đăng nhập</a>
                            </li>
                            <?php
                            }else{
                            ?>
                            <li class="user user-menu dropdown notifications-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <?php
                                    $avatar=null;
                                        if(Yii::$app->user->identity->fileAvatar!=null){
                                            $avatar = Yii::$app->user->identity->fileAvatar;
                                        }
                                    ?>
                                    <img src="<?= $avatar!=null?(Url::to(['/thongtin/filedinhkem/download','maSo'=>$avatar->maSo])):"" ?>" 
                                    class="user-image" onerror="this.src='/images/avatar.png'">
                                    <span class="hidden-xs"><?=Yii::$app->user->identity->fullname!=""?Yii::$app->user->identity->fullname:Yii::$app->user->identity->username ?></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <!-- inner menu -->
                                        <ul class="menu">
                                            <li>

                                                <a href="/qtht/user/detail/">
                                                    <i class="fa fa-users text-aqua"></i>
                                                    Thông tin tài khoản
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="/auth/user/logout"><i class="fa fa-fw fa-sign-out"></i>Đăng xuất</a>
                            </li>
                            <?php
                            }
                            ?>
                        </ul>
                    </div>
                </nav>
            </header>
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="main-sidebar">
                <!-- sidebar -->
                <section class="sidebar">
                    <!-- sidebar menu -->
                    <ul class="sidebar-menu">
                        <?php
                        $menus = \app\components\MenuHelper::getAssignedMenu(Yii::$app->user->identity->id);
                        echo \app\components\Common::genViewMenu($menus,$this->context->route)['html'];
                        ?>
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">                
                <?=
                Breadcrumbs::widget([
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ])
                ?>
                <div>
                    <?php if(Yii::$app->session->hasFlash('error')){ ?>
                        <div class="alert alert-danger" role="alert" style="display: none">
                            <?= Yii::$app->session->getFlash('error') ?>
                        </div>
                    <?php }
                    if(Yii::$app->session->hasFlash('success')){ ?>
                        <div class="alert alert-success" role="alert" style="display: none">
                            <?= Yii::$app->session->getFlash('success') ?>
                        </div>
                    <?php }
                    if(Yii::$app->session->hasFlash('warning')){ ?>
                        <div class="alert alert-warning" role="alert" style="display: none">
                            <?= Yii::$app->session->getFlash('warning') ?>
                        </div>
                    <?php } ?>
                </div>
                <?= $content ?>
                <div style="display:none;">
                    <div id="ninja-slider"></div>
                </div>
            </div>
            <!-- -->
            <footer class="main-footer">
                <strong>Copyright © 2017 <a href="#">Hệ thống Salon Không Gian Gỗ TP Đà Nẵng</a>.</strong> All rights reserved.
            </footer>
        </div>
        <!-- Modal -->
        <div id="viewPDF" class="modal fade" role="dialog">
          <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div id="contentPDF">
                </div>
            </div>
          </div>
        </div>
        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>