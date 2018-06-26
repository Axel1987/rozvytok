<?php

namespace app\modules\admin\controllers;


use app\models\AuthItem;
use app\modules\admin\actions\assignments\IndexAction;
use yii\filters\AccessControl;
use yii\filters\auth\HttpBearerAuth;
use yii\helpers\ArrayHelper;
use yii\rest\ActiveController;

class AssignmentController extends ActiveController
{
    /**
     * @var $modelClass string
     */
    public $modelClass = AuthItem::class;

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
                        'actions' => ['index'],
                        'roles' => ['admin-assignment']
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