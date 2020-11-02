<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%role_user}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%role}}`
 * - `{{%user}}`
 */
class m201014_170250_create_junction_table_for_role_and_user_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%role_user}}', [
            'role_id' => $this->integer(),
            'user_id' => $this->integer(),
            'PRIMARY KEY(role_id, user_id)',
        ]);

        // creates index for column `role_id`
        $this->createIndex(
            '{{%idx-role_user-role_id}}',
            '{{%role_user}}',
            'role_id'
        );

        // add foreign key for table `{{%role}}`
        $this->addForeignKey(
            '{{%fk-role_user-role_id}}',
            '{{%role_user}}',
            'role_id',
            '{{%role}}',
            'id',
            'CASCADE'
        );

        // creates index for column `user_id`
        $this->createIndex(
            '{{%idx-role_user-user_id}}',
            '{{%role_user}}',
            'user_id'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-role_user-user_id}}',
            '{{%role_user}}',
            'user_id',
            '{{%user}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%role}}`
        $this->dropForeignKey(
            '{{%fk-role_user-role_id}}',
            '{{%role_user}}'
        );

        // drops index for column `role_id`
        $this->dropIndex(
            '{{%idx-role_user-role_id}}',
            '{{%role_user}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-role_user-user_id}}',
            '{{%role_user}}'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            '{{%idx-role_user-user_id}}',
            '{{%role_user}}'
        );

        $this->dropTable('{{%role_user}}');
    }
}
