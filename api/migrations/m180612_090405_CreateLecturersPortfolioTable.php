<?php

use yii\db\Migration;

/**
 * Class m180612_090405_CreateLecturersPortfolioTable
 */
class m180612_090405_CreateLecturersPortfolioTable extends Migration
{
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->createTable('lecturers_portfolio', [
            'id' => $this->primaryKey(),
            'lecturer_id' => $this->integer()->notNull(),
            'title' => $this->string()->notNull(),
            'link' => $this->string(),
            'description' => $this->text()->notNull()
        ]);

        $this->addForeignKey('lecturers', 'lecturers_portfolio', 'lecturer_id', 'lecturers', 'id');
        $this->addForeignKey('portfolio', 'lecturers', 'id', 'lecturers_portfolio', 'lecturer_id');
    }

    public function down()
    {
        echo "m180612_090405_CreateLecturersPortfolioTable cannot be reverted.\n";

        return false;
    }
}
