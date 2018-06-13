<?php

namespace app\modules\admin\actions\auth;

use app\repositories\UserRepository;
use yii\rest\Action;
use yii\web\UnprocessableEntityHttpException;

class LoginAction extends Action
{
    /**
     * @SWG\Post(
     *     path="/api/admin/auths/login",
     *     tags={"ADMIN:Authentications"},
     *     summary="Login to the admin panel",
     *     produces={"application/json"},
     *     @SWG\Parameter(
     *          name="data",
     *          in="body",
     *          description="Authentication Data",
     *          required=true,
     *          @SWG\Schema(
     *              type="object",
     *                   @SWG\Property(property="email", type="string", default="" ),
     *                   @SWG\Property(property="password", type="string", default="" ),
     *          ),
     *     ),
     *     @SWG\Response(
     *         response = 200,
     *         description = "User collection response",
     *     ),
     * )
     */
    public function run()
    {
        $params = \Yii::$app->request->getBodyParams();

        $user = $this->getModel()->findByConditions([
            'email' => $params['email'],
            'password' => sha1($params['password'])
        ]);

        if(!$user){
            throw new UnprocessableEntityHttpException('Email of password is incorrect');
        }

        $user->access_token = $user->generateToken();
        $user->save();

        return $user;
    }

    /**
     * @return UserRepository
     */
    protected function getModel()
    {
        return new $this->modelClass;
    }
}