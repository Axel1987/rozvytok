<?php

namespace app\modules\admin\controllers;

use app\modules\admin\actions\cities\IndexAction;
use app\repositories\CityRepository;
use yii\filters\AccessControl;
use yii\filters\auth\HttpBearerAuth;
use yii\helpers\ArrayHelper;
use yii\rest\ActiveController;

class CitiesController extends ActiveController
{
    /**
     * @var $modelClass string
     */
    public $modelClass = CityRepository::class;

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
                        'roles' => ['admin-cities']
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