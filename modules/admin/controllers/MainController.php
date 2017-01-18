<?php

namespace app\modules\admin\controllers;

use yii\web\Controller;
use yii\filters\AccessControl;
/**
 * Main controller for the `admin` module
 */
class MainController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'actions'=>['index','dashboard'],
                        'roles' => ['admin'],
                    ],
                    [
                        'allow' => true,
                        'actions'=>['index', 'moder'],
                        'roles' => ['moder'],
                    ],
                    [
                        'allow' => true,
                        'actions'=>['index'],
                        'roles' => ['user'],
                    ],
                ],
            ],
        ];
    }

    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionDashboard()
    {
        return $this->render('dashboard');
    }

    public function actionModer()
    {
        return $this->render('moderation');
    }
}
