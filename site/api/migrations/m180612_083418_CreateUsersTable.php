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
            'city_id' => $this->integer()->notNull(),
            'auth_key' => $this->string(255),
            'access_token' => $this->string(255),
        ]);

        $this->addForeignKey('userCity', 'users', 'city_id',
            'cities', 'id');
    }

    public function down()
    {
        $this->dropForeignKey('userCity', 'users');

        $this->dropTable('users');
    }
}
