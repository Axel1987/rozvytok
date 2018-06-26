<?php

namespace app\modules\admin\actions\users;

use app\repositories\UserRepository;
use yii\rest\Action;
use Yii;

class CreateAction extends Action
{
    public function run()
    {
        $params = Yii::$app->request->getBodyParams();

        $userModel = $this->getModel();
        $userModel->setAttributes($params);

//        $password = $this->generatePassword();
        $password = 'password';
        $userModel->password = sha1($password);

        if(!$userModel->validate()){

            Yii::$app->response->setStatusCode(422);
            return $userModel->getErrors();
        }

        print_r($userModel);die;
    }

    /**
     * @return UserRepository
     */
    protected function getModel()
    {
        return new $this->modelClass;
    }

    protected function generatePassword($length = 8)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ_-#$%&!';
        $randstring = '';
        for ($i = 0; $i < $length; $i++) {
            $randstring.= $characters[rand(0, strlen($characters))];
        }

        return $randstring;
    }
}