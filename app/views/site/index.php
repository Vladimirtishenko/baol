<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\easyii\modules\text\api\Text;

$asset = \app\assets\AppAsset::register($this);
$this->title = 'EasyiiCMS start page';
?>
<div class="container">
	<div class="row">
        <div class="container">
            <div class="baol-header__logo col-xl-8 col-lg-8 col-md-8 col-sm-10 col-xs-12 col-xl-offset-2 col-lg-offset-2 col-md-offset-2 col-sm-offset-1 col-xs-offset-0">
                <a href="/">    
                    <?= Html::img("$asset->baseUrl/img/logo_baol.jpg", ['class' => 'baol-logo-responsive']);?>
                </a>    
            </div>  
        </div>
	</div>
</div>
<div class="container">
	<div class="row">
		<div class="baol-main-block col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="baol-main-block__outer col-xl-6 col-lg-6 col-md-0 col-sm-0 col-xs-0">
				<span class="baol-main-block__outer-images">
					<?= Html::img("$asset->baseUrl/img/baol-tpg.svg", ['class' => 'baol-logo-responsive-tpg']);?>
				</span>
			</div>
			<div class="baol-title-container col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12">
				<?= Text::get('title-gallery'); ?>
			</div>
		</div>
	</div>
</div>
<hgroup class="baol-hgroup-title-outer baol-index-page__title">
	<h1 class="baol-title-container-about"><?= Yii::t('main', 'My works') ?></h1>
</hgroup>
<div class="container-fluid">
	<div class="row">
		<div class="baol-masonry">

			
		</div>
	</div>
</div>
