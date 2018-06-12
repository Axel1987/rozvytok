<?php

namespace app\commands;

use app\models\AuthAssignment;
use yii\console\Controller;
use Yii;

class RbacController extends Controller
{
    public $authAssignments;

    /**
     * Save users role in system
     */
    public function backupAssignments()
    {
        $this->authAssignments = AuthAssignment::find()->asArray()->all();
    }

    /**
     * Restore users role in system
     */
    public function restoreAssignments()
    {
        foreach ($this->authAssignments as $authAssignment) {
            $ass = new AuthAssignment($authAssignment);
            $ass->save();
        }
    }

    public function actionInit()
    {
        /** @var yii\rbac\DbManager $auth */
        $auth = Yii::$app->getAuthManager();

        $this->backupAssignments();
        $auth->removeAll();

        /** Create Roles */
        /** Role Manager */
        $manager = $auth->createRole('manager');
        $manager->description = 'Manager';
        $auth->add($manager);

        /** Role Admin */
        $admin = $auth->createRole('admin');
        $admin->description = 'Admin';
        $auth->add($admin);

        /** Role Event */
        $event = $auth->createRole('event');
        $event->description = 'Event';
        $auth->add($event);

        /**
         * Creating authorization rules
         */

        /** Admin::User */
//        $admin_user_index = $auth->createPermission('admin-user:index');
//        $admin_user_index->description = 'Admin: Get user list ';
//        $auth->add($admin_user_index);

        $this->restoreAssignments();

        echo('Rbac complete' . PHP_EOL);
    }
}