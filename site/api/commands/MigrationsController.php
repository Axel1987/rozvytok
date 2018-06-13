<?php

namespace app\commands;

use yii\console\Controller;

class MigrationsController extends Controller
{
    /**
     * Run the migrations
     *
     * @return int Exit code
     */
    public function actionIndex()
    {
        return \Yii::$app->runAction('migrate');
    }

    /**
     * Setup the new database
     *
     * @return int Exit code
     */
    public function actionSetup()
    {
        \Yii::$app->runAction('migrate/down');
        \Yii::$app->runAction('migrate', ['migrationPath' => '@yii/rbac/migrations/']);

        return \Yii::$app->runAction('migrate');
    }
}
