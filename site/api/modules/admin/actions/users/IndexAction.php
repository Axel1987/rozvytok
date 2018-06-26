<?php

namespace app\modules\admin\actions\users;

use app\repositories\UserRepository;
use yii\rest\Action;
use Yii;
use yii\web\UnprocessableEntityHttpException;

class IndexAction extends Action
{
    /**
     * @SWG\Get(
     *     path="/api/admin/users",
     *     tags={"ADMIN:Users"},
     *     summary="Get list oof the users by user role",
     *     produces={"application/json"},
     *     security={{"Bearer":{}}},
     *     @SWG\Response(
     *         response = 200,
     *         description = "User collection response",
     *     ),
     * )
     */
    public function run()
    {
        /** @var UserRepository $user */
        $user = Yii::$app->user->identity;
        $role = $user->authAssigment->itemName->name;

        switch ($role){
            case 'manager':
                return $this->getModel()->find()
                    ->with(['city' => function($cityQuery) use ($user){
                        $cityQuery->where(['id' => $user->city_id]);
                    }])
                    ->with(['authAssigment' => function($assigmentQuery){
                        $assigmentQuery->where('!=', 'item_name', 'super-admin');
                    }])
                    ->orderBy('city_id')
                    ->all();
                break;
            case 'super-admin':
                return $this->getModel()->find()
                    ->with(['city','authAssigment'])
                    ->all();
                break;
            default:
                throw new UnprocessableEntityHttpException('User can\'t get list of users');
        }
    }

    protected function getModel()
    {
        return new $this->modelClass;
    }
}