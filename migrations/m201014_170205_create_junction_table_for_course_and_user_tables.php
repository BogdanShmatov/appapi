<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%course_user}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%course}}`
 * - `{{%user}}`
 */
class m201014_170205_create_junction_table_for_course_and_user_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%course_user}}', [
            'course_id' => $this->integer(),
            'user_id' => $this->integer(),
            'PRIMARY KEY(course_id, user_id)',
        ]);

        // creates index for column `course_id`
        $this->createIndex(
            '{{%idx-course_user-course_id}}',
            '{{%course_user}}',
            'course_id'
        );

        // add foreign key for table `{{%course}}`
        $this->addForeignKey(
            '{{%fk-course_user-course_id}}',
            '{{%course_user}}',
            'course_id',
            '{{%course}}',
            'id',
            'CASCADE'
        );

        // creates index for column `user_id`
        $this->createIndex(
            '{{%idx-course_user-user_id}}',
            '{{%course_user}}',
            'user_id'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-course_user-user_id}}',
            '{{%course_user}}',
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
        // drops foreign key for table `{{%course}}`
        $this->dropForeignKey(
            '{{%fk-course_user-course_id}}',
            '{{%course_user}}'
        );

        // drops index for column `course_id`
        $this->dropIndex(
            '{{%idx-course_user-course_id}}',
            '{{%course_user}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-course_user-user_id}}',
            '{{%course_user}}'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            '{{%idx-course_user-user_id}}',
            '{{%course_user}}'
        );

        $this->dropTable('{{%course_user}}');
    }
}
