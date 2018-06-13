<?php

use yii\db\Migration;

/**
 * Class m180612_083418_CreateUsersTable
 */
class m180612_083418_CreateUsersTable extends Migration
{
    public function up()
    {
        $this->createTable('users', [
            'id' => $this->primaryKey(),
            'name' => $this->string(100)->notNull(),
            'surname' => $this->string(100)->notNull(),
            'phone' => $this->string(100)->notNull()->unique(),
            'email' => $this->string(100)->notNull()->unique(),
            'password' => $this->string(100)->notNull(),
            'auth_key' => $this->string(255),
            'access_token' => $this->string(255),
        ]);
    }

    public function down()
    {
        $this->dropTable('users');
    }
}
