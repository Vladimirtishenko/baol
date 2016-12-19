<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\easyii\modules\text\api\Text;

$asset = \app\assets\AppAsset::register($this);
$this->title = 'EasyiiCMS start page';
?>
<hgroup class="baol-hgroup-title-outer">
	<h1 class="baol-title-container-about">About me</h1>
</hgroup>
<div class="container">
	<div class="row">
		<div class="baol-main-about baol-preloads col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="baol-helper-margins">
				<div class="row baol-flex__center-item">
					<div class="wow slideInUp baol-main-about__description col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
						<?= Text::get('about-first'); ?>
					</div>
					<div class="wow slideInUp col-xl-6 col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xl-offset-0 col-lg-offset-0 col-md-offset-0 col-sm-offset-3 col-xs-offset-3">
						<div class="baol-main-about__rect-top">
							<?= Html::img("$asset->baseUrl/img/author.png");?>
						</div>
					</div>
				</div>
			</div>
			<div class="baol-helper-margins baol-flex__center baol-reverse">
				<div class="row baol-column-reverse baol-flex__center-item">
					<div class="wow slideInUp col-xl-6 col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xl-offset-0 col-lg-offset-0 col-md-offset-0 col-sm-offset-3 col-xs-offset-0">
						<div class="baol-main-about__rect-top">
							<?= Html::img("$asset->baseUrl/img/studio.png");?>
						</div>
					</div>
					<div class="wow slideInUp baol-main-about__description col-xl-6 col-lg-6 col-md-5 col-sm-12 col-xs-12 col-xl-offset-0 col-lg-offset-0 col-md-offset-1">
						<?= Text::get('about-second'); ?>
					</div>
				</div>
			</div>
			<div class="baol-helper-margins baol-flex__center">
				<div class="wow slideInUp baol-main-about__description col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
					<?= Text::get('about-third'); ?>
				</div>
				<div class="wow slideInUp col-xl-6 col-lg-6 col-md-6 col-sm-6 col-xs-6 col-xl-offset-0 col-lg-offset-0 col-md-offset-0 col-sm-offset-3 col-xs-offset-3">
					<div class="baol-main-about__rect-top-small">
						<h3 class="baol-about-cycle-of">cycle of <br> 13 works</h3>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>