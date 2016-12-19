<?php
use yii\helpers\Html;
use yii\helpers\Url;

$asset = \app\assets\AppAsset::register($this);

?>
<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
        <title><?= Html::encode($this->title) ?></title>
        <link rel="icon" type="image/png" href="<?= $asset->baseUrl ?>/favicon.png">
        <?php $this->head() ?>
    </head>
    <body>
    <?php $this->beginBody() ?>
    <?php
        if(\Yii::$app->language == 'ua'):
            echo Html::a('Go to English', array_merge(
                \Yii::$app->request->get(),
                [\Yii::$app->controller->route, 'language' => 'en']
            ));
        else:
            echo Html::a('Перейти на русский', array_merge(
                \Yii::$app->request->get(),
                [\Yii::$app->controller->route, 'language' => 'ua']
            ));
        endif;
    ?>
    <div class="baol-header container-fluid">
        <div class="row">
            <div class="baol-header__menu col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="row">
                    <nav class="baol-nav-top">
                        <div class="baol-header__menu-author">
                            <a href="/" class="baol-index-page">
                                <?= Html::img("$asset->baseUrl/img/baol_logo_header.png");?>
                                <h2>ANDREY <br> BARANOVSKY</h2>
                            </a>
                        </div>
                        <div class="baol-header-menu">
                            <i class="baol-header-menu__fa" aria-hidden="true"></i>
                            <ul class="baol-header__menu-list">
                            <?php foreach ($this->params['menu'] as $key => $value):?>
                                <li class="baol-header__menu-item">
                                    <?php if($this->context->action->id != $key) : ?>
                                    <a class="baol-header__menu-link" href="/site/<?=$key;?>">
                                        <?=$value;?>
                                    </a>
                                    <?php else: ?>
                                    <span class="baol-header__menu-span" href="/site/<?=$key;?>">
                                        <?=$value;?>
                                    </span>
                                    <?php endif; ?>
                                </li>
                            <?php endforeach;?>
                            </ul>
                            <ul class="baol-lang-menu">
                                <li class="baol-lang-menu__item baol-ua">
                                    <a href="/">UA</a>
                                </li>
                                <li class="baol-lang-menu__item baol-en">
                                    <span>EN</span>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <?= $content ?>
    
    <div class="baol-footer container-fluid">
        <div class="row">
            <div class="container">
                <div class="row">
                    <div class="baol-footer__list col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="baol-baol-footer__list-item baol-footer-logo-container col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12">
                             <?= Html::img("$asset->baseUrl/img/logo_footer.png", ['class' => 'baol-logo-responsive-footer']);?>
                        </div>
                        <div class="baol-baol-footer__list-item col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12">
                            <div class="baol-baol-footer__item-addres">
                                <h6>
                                    Adress
                                </h6>
                                <p>
                                    Ukraine, Kyiv Andreevskaya str, 15
                                </p>
                            </div>
                            <div class="baol-baol-footer__item-addres">
                                 <h6>
                                    Phone
                                </h6>
                                <p>
                                    +38 076 453 29 87
                                </p>
                            </div>
                        </div>
                        <div class="baol-baol-footer__list-item col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12">
                            <div class="baol-baol-footer__item-addres">
                                <h6>
                                    Follow us
                                </h6>
                                <div class="baol-social-block">
                                    <a href="#" class="baol-social-block__links">
                                        <i class="fa fa-facebook" aria-hidden="true"></i>
                                    </a>
                                    <a href="#" class="baol-social-block__links" >
                                        <i class="fa fa-vk" aria-hidden="true"></i>
                                    </a>
                                    <a href="#" class="baol-social-block__links" >
                                        <i class="fa fa-twitter" aria-hidden="true"></i>
                                    </a>
                                    <a href="#" class="baol-social-block__links" >
                                        <i class="fa fa-google-plus" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
             <div class="baol-footer__copyright col-xl-12 col-lg-12 col-md-12 col-sm-12">         
                    <p><span>© Copyright 2016</span> Andrey Baranovsky</p>
                    <i>•</i>
                    <div class="baol-flex__center">
                        <p><span>Development by</span></p>
                        <a href="http://4side.in.ua"><?= Html::img("$asset->baseUrl/img/development-mini.svg");?></a>
                        <p><span>4SIDE Agency</span></p>
                    </div>
                    <i>•</i>
                    <p><span>Proudly Powered by</span> Yii2</p>
            </div>
        </div>
    </div>

    <?php $this->endBody() ?>

    </body>
    </html>
<?php $this->endPage() ?>