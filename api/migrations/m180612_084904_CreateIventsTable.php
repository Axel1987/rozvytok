<?php

use yii\db\Migration;

/**
 * Class m180612_084904_CreateIvantsTable
 */
class m180612_084904_CreateIventsTable extends Migration
{
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->createTable('events', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'background' => $this->string()->notNull(),
            'price' => $this->float()->notNull(),
            'description' => $this->text()->notNull()
        ]);
    }

    public function down()
    {
        $this->dropTable('events');
    }
}
