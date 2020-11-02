<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%order}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%course}}`
 * - `{{%user}}`
 */
class m201014_162142_create_order_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%order}}', [
            'id' => $this->primaryKey(),
            'course_id' => $this->integer(),
            'user_id' => $this->integer(),
            'order_type_pay' => $this->string()->notNull(),
            'order_created_at' => $this->date()->notNull(),
            'order_updated_at' => $this->date()->notNull(),
            'order_total_price' => $this->integer()->notNull(),
            'order_status' => $this->string()->notNull(),


        ]);

        // creates index for column `course_id`
        $this->createIndex(
            '{{%idx-order-course_id}}',
            '{{%order}}',
            'course_id'
        );

        // add foreign key for table `{{%course}}`
        $this->addForeignKey(
            '{{%fk-order-course_id}}',
            '{{%order}}',
            'course_id',
            '{{%course}}',
            'id',
            'CASCADE'
        );

        // creates index for column `user_id`
        $this->createIndex(
            '{{%idx-order-user_id}}',
            '{{%order}}',
            'user_id'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-order-user_id}}',
            '{{%order}}',
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
            '{{%fk-order-course_id}}',
            '{{%order}}'
        );

        // drops index for column `course_id`
        $this->dropIndex(
            '{{%idx-order-course_id}}',
            '{{%order}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-order-user_id}}',
            '{{%order}}'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            '{{%idx-order-user_id}}',
            '{{%order}}'
        );

        $this->dropTable('{{%order}}');
    }
}
