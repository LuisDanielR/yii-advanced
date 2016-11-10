<?php

namespace backend\components;
use Yii;
use yii\base\Behavior;
class CheckIfLoggedIn extends Behavior{
     public function events()
    {
        return [
            //\yii\web\Application::EVENT_BEFORE_REQUEST => 'checkIfLoggedIn',
            \yii\web\Application::EVENT_BEFORE_REQUEST => 'changeLanguage',
        ];
    }
    
    public function changeLanguage() {
        if(\Yii::$app->getRequest()->getCookies()->has('lang')){
            \Yii::$app->language = \Yii::$app->getRequest()->getCookies()->getValue('lang');
            //echo '<script type = "text/javascript"> alert("Estas como invitado!"); </script>';            
        }
    }
    
    public function checkIfLoggedIn(){
        if(\Yii::$app->user->isGuest){
           //echo '<script type = "text/javascript"> alert("Estas como invitado!"); </script>';            
        }else{
           //echo '<script type = "text/javascript"> alert("Estas logueado!"); </script>';
        }
        //die();        
    }
}
?>