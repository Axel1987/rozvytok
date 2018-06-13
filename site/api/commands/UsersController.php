<?php

namespace app\commands;

use app\repositories\AuthAssigmentRepository;
use app\repositories\UserRepository;
use yii\console\Controller;
use yii\db\Exception;

class UsersController extends Controller
{
    public function actionAddDefault()
    {
        $userData = [
            'name' => 'Rozvytok',
            'surname' => 'Manager',
            'phone' => '0977777777',
            'email' => 'some@email.com',
            'password' => sha1('password')
        ];

        $user = new UserRepository($userData);

        if (!$user->save()) {
            throw new Exception('User can\'t create', $user->getErrors());
        }

        (new AuthAssigmentRepository())->createAssignment($user, 'manager');
    }
}