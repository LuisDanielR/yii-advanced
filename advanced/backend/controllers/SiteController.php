<?php

namespace backend\controllers;

use common\models\LoginForm;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;

/**
 * Site controller
 */
class SiteController extends Controller {

    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error','language'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index','set-cookie','show-cookie'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    //'logout' => ['post'],
                    'logout' => ['get'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions() {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function actionSetCookie(){
        $cookie = new yii\web\Cookie([
           'name'=>'test1',
           'value'=>'test cookie value'
        ]);
        Yii::$app->getResponse()->getCookies()->add($cookie);        
    }
    
    public function actionShowCookie(){
        if(Yii::$app->getRequest()->getCookies()->has('test1')){
            print_r(Yii::$app->getRequest()->getCookies()->getValue('test1'));
        }    
    }
    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex() {
        //$lkrValue = Yii::$app->MyComponent->currencyConvert('USD','MXN',100);
        //print_r($lkrValue);
        //die();
       //Yii::$app->CheckIfLoggedIn->events();   
       return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin() {
        //Yii::$app->CheckIfLoggedIn->events();
        
        $this->layout = 'loginLayout';
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout() {
        Yii::$app->user->logout();
        return $this->goHome();
    }
    
    public function actionLanguage(){
        if(isset($_POST['lang'])){
            Yii::$app->language =$_POST['lang'];
            $cookie = new \yii\web\Cookie([
                'name'=>'lang',
                'value'=>$_POST['lang']
            ]);
            Yii::$app->getResponse()->getCookies()->add($cookie);
        }
    }

}
