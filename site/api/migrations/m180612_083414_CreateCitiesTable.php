<?php

use yii\db\Migration;

/**
 * Class m180625_123346_add_cities_table
 */
class m180612_083414_CreateCitiesTable extends Migration
{
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->createTable('cities', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull()->unique(),
            'enabled' => $this->boolean()->defaultValue(false)
        ]);

        $this->addDefaultCity();
    }

    public function down()
    {
        $this->dropTable('cities');
    }

    protected function addDefaultCity()
    {
        $this->insert('cities',[
            'name' => 'Харкiв',
            'enabled' => true
        ]);
    }
}
