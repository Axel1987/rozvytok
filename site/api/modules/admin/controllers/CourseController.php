<?php

namespace app\modules\admin\controllers;

use app\modules\admin\actions\courses\IndexAction;
use app\repositories\CourseRepository;
use yii\filters\AccessControl;
use yii\filters\auth\HttpBearerAuth;
use yii\helpers\ArrayHelper;
use yii\rest\ActiveController;

class CourseController extends ActiveController
{
    /**
     * @var $modelClass string
     */
    public $modelClass = CourseRepository::class;

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
                        'actions' => ['index', 'list', 'attributes'],
                        'roles' => ['*']
                    ],
                    [
                        'allow' => true,
                        'actions' => ['create'],
                        'roles' => ['admin-consulate:create']
                    ],
                    [
                        'allow' => true,
                        'actions' => ['update'],
                        'roles' => ['admin-consulate:update']
                    ],
                    [
                        'allow' => true,
                        'actions' => ['delete'],
                        'roles' => ['admin-consulate:delete']
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
        return ArrayHelper::merge(parent::actions(), [
            'index' => [
                'class' => IndexAction::class,
                'modelClass' => $this->modelClass
            ]
        ]);
    }
}