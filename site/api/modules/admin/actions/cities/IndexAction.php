<?php

namespace app\modules\admin\actions\cities;

use app\repositories\CityRepository;
use yii\rest\Action;

class IndexAction extends Action
{
    /**
     * @SWG\Get(
     *     path="/api/admin/cities",
     *     tags={"ADMIN:Cities"},
     *     summary="Get list oof the users by user role",
     *     produces={"application/json"},
     *     security={{"Bearer":{}}},
     *     @SWG\Response(
     *         response = 200,
     *         description = "Cities collection response",
     *     ),
     * )
     */
    public function run()
    {
        return $this->getModel()
            ->find()->all();
    }

    /**
     * @return CityRepository
     */
    protected function getModel()
    {
        return new $this->modelClass;
    }
}