<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'language' => 'en',
    'sourceLanguage' => 'en',
    'modules' => [
        'gridview'=>[
            'class'=>'\kartik\grid\Module'             
        ],        
        'departmentsid' => [    
            'class' => 'backend\modules\departmentsid\Moddepartments',
        ],        
    ],
    'components' => [
        'i18n'  =>  [
            'translations'  =>  [
                'app'   =>  [
                    //'class' =>  'yii\i18n\PhpMessageSource',
                    'class' =>  'yii\i18n\DbMessageSource',
                    //'basePath' => '@app/messages',
                    'sourceLanguage'    =>  'en',
                    /*'fileMap'   =>  [
                        'app'   =>  'app.php',
                        'app/error' =>  'error.php',
                    ],*/
                ],
            ],
        ],
        'request' => [
            'csrfParam' => '_csrf-backend',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-backend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        //www.google.com/settings/security/lesssecureapps
        //'host'=>'smtp-mail.outlook.com(587)
        //'host'=>'smtp.live.com(467)
        'mailer'=>[
                            'class'=>'yii\swiftmailer\Mailer',
                            'useFileTransport'=>false,
                            'transport'=>[
                                'class'=>'Swift_SmtpTransport',
                                'host'=>'smtp.gmail.com',
                                'username'=>'androidfenix555@gmail.com',
                                'password'=>'hdmiusb30',
                                'port'=>'587',
                                'encryption'=>'tls',                                
                            ]
        ],        
         'authManager'=>[
                           'class'=>'yii\rbac\DbManager',
                           'defaultRoles'=>['guest'],
             ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'MyComponent'=>[
            'class'=>'backend\components\MyComponent'
        ],
        /*
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        */  
      
    ],
    'as checkIfLoggedIn'=>[
            'class'=>'backend\components\CheckIfLoggedIn'
        ],
    /*configuracion en github*/
    'params' => $params,
];
