<?php

namespace app\modules\admin\controllers;

use app\modules\admin\actions\auth\ErrorAction;
use app\modules\admin\actions\auth\LoginAction;
use app\repositories\UserRepository;
use yii\rest\Controller;

class AuthController extends Controller
{
    /**
     * @var string
     */
    public $modelClass = UserRepository::class;

    /**
     * @return array
     */
    public function actions()
    {
        return [
            'login' => [
                'class' => LoginAction::class,
                'modelClass' => $this->modelClass
            ],
            'error' => [
                'class' => ErrorAction::class,
            ]
        ];
    }
}
