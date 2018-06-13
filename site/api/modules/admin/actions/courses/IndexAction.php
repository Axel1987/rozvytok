<?php

namespace app\modules\admin\actions\courses;

use app\repositories\CourseRepository;
use yii\rest\Action;

class IndexAction extends Action
{
    /**
     * @SWG\Get(
     *     path="/api/admin/courses",
     *     tags={"ADMIN:Courses"},
     *     summary="list of the courses",
     *     produces={"application/json"},
     *     security={{"Bearer":{}}},
     *     @SWG\Response(
     *         response = 200,
     *         description = "list of the courses response",
     *     ),
     * )
     */
    public function run()
    {
        return $this->getModel()->all();
    }

    /**
     * @return CourseRepository
     */
    protected function getModel()
    {
        return new $this->modelClass;
    }
}