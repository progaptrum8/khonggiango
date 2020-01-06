<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = $name;
?>
<div class="site-error">

    <h1 style="text-align: center;"><?= Html::encode($this->title) ?></h1>

    <div class="alert alert-danger" style="text-align: center;font-size: 20px;font-weight: bold;">
        <?= nl2br(Html::encode($message)) ?>
    </div>

</div>
