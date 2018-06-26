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
            [
                'city_id' => 1,
                'name' => 'Rozvytok',
                'surname' => 'Manager',
                'phone' => '0977777777',
                'email' => 'some@email.com',
                'password' => sha1('password'),
            ],
            [
                'city_id' => 1,
                'name' => 'Rozvytok',
                'surname' => 'Super Administrator',
                'phone' => '0978888888',
                'email' => 'some1@email.com',
                'password' => sha1('password'),
            ]
        ];

        foreach ($userData as $data){
            $user = new UserRepository($data);

            if (!$user->save()) {
                throw new Exception('User can\'t create', $user->getErrors());
            }

            $role = $data['surname'] !== 'Manager' ? 'super-admin' : 'manager';

            (new AuthAssigmentRepository())->createAssignment($user, $role);
        }

    }
}