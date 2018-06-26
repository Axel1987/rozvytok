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
        $superAdmin = $auth->createRole('super-admin');
        $superAdmin->description = 'Super Administrator';
        $auth->add($superAdmin);

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
        $admin_users = $auth->createPermission('admin-users');
        $admin_users->description = 'Manage the list of Users';
        $auth->add($admin_users);
        /** Admin::City */
        $admin_cities = $auth->createPermission('admin-cities');
        $admin_cities->description = 'Manage the list of Cities';
        $auth->add($admin_cities);
        /** Admin::Assignment */
        $admin_assignment = $auth->createPermission('admin-assignment');
        $admin_assignment->description = 'List of the user roles';
        $auth->add($admin_assignment);

        /**
         * Assign permissions to users
         */
        /** Super Admin */
        $auth->addChild($superAdmin, $admin_users);
        $auth->addChild($superAdmin, $admin_cities);
        $auth->addChild($superAdmin, $admin_assignment);

        /** Manager */
        $auth->addChild($manager, $admin_users);
        $auth->addChild($manager, $admin_cities);
        $auth->addChild($manager, $admin_assignment);


        $this->restoreAssignments();

        echo('Rbac complete' . PHP_EOL);
    }
}