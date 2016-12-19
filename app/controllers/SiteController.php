<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\easyii\modules\page\api\Page;
use yii\easyii\modules\news\api\News;
use yii\easyii\modules\gallery\api\Gallery;

define("ALL", "ALL");

class SiteController extends Controller
{

    public $menuBar = [];


    public function actions()
    {   

        if(isset($_COOKIE['lang'])){
            var_dump($_COOKIE['lang']);
        } else {
            var_dump('en');
        }

        $pageIndex = Page::get(ALL);

        foreach ($pageIndex as $key => $value) {
            $this->menuBar[$value['slug']] = $value['title'];
        }  

        $this->view->params['menu'] = $this->menuBar;         

        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function actionIndex()
    {   
        return $this->render('index');
    }

    public function actionAbout()
    {

        return $this->render('about');

    }

    public function actionEvents($tag = null)
    {
        return $this->render('events',[
            'news' => News::items(['tags' => $tag, 'pagination' => ['pageSize' => 3]])
        ]);   
    }

    public function actionGallery(){
        $offset = $_GET['offset'];
        $limit = 6;

        $gallery = Gallery::last($limit, $offset);

        echo json_encode($gallery);

    }

}