<?php

namespace app\modules\admin\controllers;


use app\modules\admin\actions\users\CreateAction;
use app\modules\admin\actions\users\IndexAction;
use app\repositories\UserRepository;
use yii\filters\AccessControl;
use yii\filters\auth\HttpBearerAuth;
use yii\helpers\ArrayHelper;
use yii\rest\ActiveController;

class UserController extends ActiveController
{
    /**
     * @var $modelClass string
     */
    public $modelClass = UserRepository::class;

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return ArrayHelper::merge(parent::behaviors(),[
            'authenticator' => [
                'class' => HttpBearerAuth::class,
            ],
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['index', 'create', 'update', 'delete'],
                        'roles' => ['admin-users']
                    ],
                ],
            ],
        ]);
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'index' => [
                'class' => IndexAction::class,
                'modelClass' => $this->modelClass
            ],
            'create' => [
                'class' => CreateAction::class,
                'modelClass' => $this->modelClass
            ]
        ];
    }
}