<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;

AppAsset::register($this);
?>
<div class="subHeaderDiv">
        <div class="col-md-1"></div>
        <div class="col-sm-7">
            <?php
            NavBar::begin([
                'brandLabel' => Yii::$app->name. HTML::tag('i', '', [
                    'class' => 'fa fa-chevron-down',
                    'style' => 'color: #9d9d9d;
                                border: 1px solid #9d9d9d;
                                border-radius: 10px;
                                font-size: 11px;
                                padding-left: 2px;
                                padding-right: 3px;
                                padding-top: 2px;
                                padding-bottom: 2px;
                                margin-left: 6px;'
                ]),
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar navbar-responsive',
                ]
            ]);
            echo Nav::widget([
                'options' => ['class' => 'nav navbar-nav navbar-right'],
                'items' => [
                    
                    ['label' => 'Profile', 'url' => ['/site/index']],
                    ['label' => 'Portfolio', 'url' => ['/site/about']],
                    ['label' => 'Event', 'url' => ['/site/contact']],
                    ['label' => 'Contact', 'url' => ['/site/contact']],
                    ['label' => 'User', 'url' => ['/site/contact']],
                ],
            ]);
            NavBar::end();
            ?>
        </div>
        <div class="col-md-1"></div>
    </div>
