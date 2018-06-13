<?php

namespace app\repositories;

use app\models\AuthAssignment;
use yii\db\Exception;

class AuthAssigmentRepository extends AuthAssignment
{
    /**
     * @param $user
     * @param $role
     * @return bool
     */
    public function createAssignment($user, $role)
    {
        $this->item_name = $role;
        $this->user_id = (string)$user->id;

        if (!$this->save()) {
            throw new Exception('Assignment can\'t create', $this->getErrors());
        }

        return $this;
    }
}