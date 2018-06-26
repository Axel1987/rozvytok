<?php

namespace app\modules\admin\actions\assignments;

use app\models\AuthItem;
use app\repositories\UserRepository;
use yii\rest\Action;
use Yii;

class IndexAction extends Action
{
    /**
     * @SWG\Get(
     *     path="/api/admin/assignments",
     *     tags={"ADMIN:Assignments"},
     *     summary="Get list of the users roles",
     *     produces={"application/json"},
     *     security={{"Bearer":{}}},
     *     @SWG\Response(
     *         response = 200,
     *         description = "Roles collection response",
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
                return $this->getModel()
                    ->find()
                    ->where(['type' => 1])
                    ->andWhere('!=', 'name', 'super-admin')
                    ->all();
                break;
            case 'super-admin':
                return $this->getModel()
                    ->find()
                    ->where(['type' => 1])
                    ->all();
                break;
            default:
                throw new UnprocessableEntityHttpException('User can\'t get list of users');
        }

    }

    /**
     * @return AuthItem
     */
    protected function getModel()
    {
        return new $this->modelClass;
    }
}