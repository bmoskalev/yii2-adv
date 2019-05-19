<?php

use yii\db\Migration;

/**
 * Class m190519_181252_create_project_user
 */
class m190519_181252_create_project_user extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('project_user', [
            'id' => $this->primaryKey(),
            'project_id' => $this->integer()->notNull(),
            'user_id' => $this->integer()->notNull(),
            'role' => "ENUM('manager', 'developer', 'tester')",
        ], $tableOptions);
        $this->addForeignKey("fx_project_user_user",'project_user',['user_id'],'user','id');
        $this->addForeignKey("fx_project_user_project",'project_user',['project_id'],'project','id');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey("fx_project_user_user",'project_user');
        $this->dropForeignKey("fx_project_user_project",'project_user');
        $this->dropTable('project_user');
        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190519_181252_create_project_user cannot be reverted.\n";

        return false;
    }
    */
}
