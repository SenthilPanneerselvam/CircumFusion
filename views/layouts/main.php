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
<?php $this->beginPage()?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body style="height: 100%;background-color: #F0F4F7 !important;">
<?php $this->beginBody()?>

    <div class="headerDiv" style="height: 7%">
		<div class="col-md-12">
		    <div class="col-md-1"></div>
			<div class="col-md-2" style="padding-top: 5px">
                <img src="/assets/55ae8c4/img/headerlogo.png" class="headerLogo" />
            </div>
			<div class="col-md-2" style="padding-top: 5px" >
                <div style="font-size: smaller;">Powered by </div>
            <div style="font-size: small;font-weight: bolder;">
                CircumFusion
            </div>
        </div>
		<div class="col-md-4"></div>
		<div class="col-md-2" style="padding-top: 5px">
			<div style="float: left;">
                <i 
                class="fa fa-user-circle"
                aria-hidden="true" 
                style="color: #9d9d9d;font-size: 31px;"></i>
            </div>
			<div style="float: left;width: 72%;font-size: small;font-weight: bolder;">
                
                <?php 
                    echo Yii::$app->user->isGuest ? 
                        //'Login' 
                        Html::a('Login', ['/site/login'])
                    : (
                        Html::beginForm(['/site/logout'], 'post')
                        . Html::submitButton(
                            'Logout (' . Yii::$app->user->identity->username . ')',
                            ['class' => 'btn btn-link logout']
                        )
                        .'<i
                        class="fa fa-chevron-down"
                        aria-hidden="true" 
                        style="font-size: smaller !important;color: #635f5f;padding-left: 3%;"></i>'
                        . Html::endForm()
                        );
                ?>
            </div>
			</div>
          	<div class="col-md-1"></div>
      	</div>
    </div>
    
    <?php if (!Yii::$app->user->isGuest) echo include('menu.php'); ?>
<?php $this->beginContent('menu') ?>
    <div class="container">
        <?=Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ])?>
        <?=Alert::widget()?>
        <?=$content?>
    </div>
</div>

<footer class="footer">
    <div class="footerDiv" style="height: 5%;background-color: #fff !important;">
        <div class="col-md-1" ></div>		
        <div class="col-md-4" style="padding-top: 5px;">
            Copyright @ 2017 CircumFusion. All rights reserved.
        </div>
        <div class="col-md-4" ></div>
        <div class="col-md-2" style="float: right !important;padding-top: 5px;">				
            <span><i class="fa fa-facebook-square" style="padding-left:10px;font-size:20px;color:#005B7A"></i></span>
            <span><i class="fa fa-twitter-square" style="padding-left:10px;font-size:20px;color:#00FFFF"></i></span>
            <span><i class="fa fa-linkedin-square" style="padding-left:10px;font-size:20px;color:#0099CC"></i></span>
            <span><i class="fa fa-google-plus-square" style="padding-left:10px;font-size:20px;color:#d50f37"></i></span>
        </div>     	
        <div class="col-md-1"></div>
    </div>
</footer>

<?php $this->endBody()?>
</body>
</html>
<?php $this->endPage()?>
