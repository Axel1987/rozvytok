<?php

use yii\db\Migration;

/**
 * Class m180612_084825_CreateCoursesTable
 */
class m180612_084825_CreateCoursesTable extends Migration
{
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->createTable('courses', [
            'id' => $this->primaryKey(),
            'city_id' => $this->integer()->notNull(),
            'title' => $this->string()->notNull(),
            'background' => $this->string()->notNull(),
            'lecturer_id' => $this->integer()->notNull(),
            'price' => $this->float()->notNull(),
            'description' => $this->text()->notNull()
        ]);

        $this->addForeignKey('lecturer', 'courses', 'lecturer_id',
            'lecturers', 'id');
        $this->addForeignKey('courses', 'lecturers', 'id',
            'courses', 'lecturer_id');
        $this->addForeignKey('courseCity', 'courses', 'city_id',
            'cities', 'id');
    }

    public function down()
    {
        $this->dropForeignKey('lecturer', 'courses');

        $this->dropTable('courses');
    }
}
