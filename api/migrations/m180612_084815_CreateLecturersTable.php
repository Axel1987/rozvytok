<?php

use yii\db\Migration;

/**
 * Class m180612_084855_CreateLecturersTable
 */
class m180612_084815_CreateLecturersTable extends Migration
{
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->createTable('lecturers', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'surname' => $this->string()->notNull(),
            'photo' => $this->string()->notNull(),
            'specialty' => $this->string()->notNull(),
            'rank' => $this->string()->null(),
            'achievements' => $this->text()->null(),
        ]);
    }

    public function down()
    {
        $this->dropTable('lecturers');
    }
}
