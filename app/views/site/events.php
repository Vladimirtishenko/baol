<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\easyii\modules\news\api\News;

$asset = \app\assets\AppAsset::register($this);
$this->title = 'EasyiiCMS start page';
?>
<hgroup class="baol-hgroup-title-outer">
	<h1 class="baol-title-container-about">Events</h1>
</hgroup>
<div class="container">
	<div class="row">
		<div class="baol-main-events baol-preloads col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">	

			<?php foreach ($news as $key => $value): ?>

			<?php $reverse = 3; ?>
				
			<?php if($key % 3 == 0): ?>
			
			<div class="wow slideInUp baol-main-events__item-big<?= $classie = ($reverse == $key) ? '-reverse' : ''; ?> col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="row">
				<div class="baol-main-events__photo-block col-xl-7 col-lg-7 col-md-6 col-sm-12 col-xs-12">
					<div class="row">
						<div class="baol-main-events__outer">
							<div class="baol-image-static-big" style="background-image: url(<?=$value->image;?>)">
								<?= Html::img($value->image);?>
								<div class="baol-main-events-slice-round">
									<div class="baol-helper">
										<h3 class="baol-main-events__h3"><?=$value->title;?></h3>
									<p class="baol-main-events__p"><?= substr($value->short,0, 30);?>...</p>
									</div>
								</div>
							</div>
							
							<div class="baol-main-events__data">
								<span><?=$value->date;?></span>
							</div>
						</div>
					</div>
				</div>
				<div class="baol-main-events-slice-round__only-responsive">
					<div class="clearfix"></div>
					<div class="baol-helper__only-responsive">
						<h3 class="baol-main-events__h3"><?=$value->title;?></h3>
					</div>
				</div>
				<div class="baol-main-events__text-block col-xl-5 col-lg-5 col-md-5 col-sm-12 col-xs-12">
					<div class="row">
						<?= substr($value->text, 0, 900); ?>
					</div>
				</div>
			</div>
			</div>

			<?php else: ?>
			
			<div class="wow slideInUp baol-main-events__item-small col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
				<div class="row">
					<div class="baol-main-events__outer-small-image col-xl-6 col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<div class="row">
							<div class="baol-helper">
								<div class="baol-image-static" style="background-image: url(<?=$value->image;?>)">
									<?= Html::img($value->image);?>
								</div>
								<div class="baol-main-events__data-small">
									<span><?=$value->date;?></span>
								</div>
							</div>
						</div>
					</div>
					<div class="baol-main-events__outer-small-text col-xl-6 col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<h3 class="baol-main-events__h3"><?=$value->title;?></h3>
							<p class="baol-main-events__p baol-margin-text"><?= substr($value->short,0, 200);?>...</p>
					</div>
				</div>
			</div>
			<?php endif; ?>

			<?php $reverse += 6; ?>

			<?php endforeach; ?>
		</div>
		<div class="clearfix"></div>
		<?= News::pages() ?>
	</div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
