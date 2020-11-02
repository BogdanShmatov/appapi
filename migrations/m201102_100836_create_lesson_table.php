<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%lesson}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%course}}`
 */
class m201102_100836_create_lesson_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%lesson}}', [
            'id' => $this->primaryKey(),
            'lesson_name' => $this->string()->notNull(),
            'lesson_url' => $this->string()->notNull(),
            'course_id' => $this->integer(),
        ]);

        $this->batchInsert('{{%lesson}}', ['lesson_name', 'lesson_url', 'course_id' ], [
                ['Unity 2017 (1)','url', 1],
                ['Unity 2017 (2)','url', 1],
                ['Unity 2017 (3)','url', 1],
                ['Unity 2017 (4)','url', 1],
                ['Unity 2017 (5)','url', 1],
                ['React Native 2020 (1)', 'url', 2],
                ['React Native 2020 (2)', 'url', 2],
                ['Google AdWords (1)', 'url', 3],
                ['Google AdWords (2)', 'url', 3],
                ['Google AdWords (3)', 'url', 3],
                ['Google AdWords (4)', 'url', 3],
                ['Google AdWords (5)', 'url', 3],
                ['Google AdWords (6)', 'url', 3],
                ['Google AdWords (7)', 'url', 3],
                ['Google AdWords (8)', 'url', 3],
                ['Google AdWords (9)', 'url', 3],
                ['Google AdWords (10)', 'url', 3],
                ['Startup (1)', 'url', 4],
                ['Startup (2)', 'url', 4],
                ['Startup(3)', 'url', 4],
                ['Adobe Illustrator  (1)', 'url', 5],
                ['Adobe Illustrator  (2)', 'url', 5],
                ['PHP for Beginners (1)', 'url', 6],
                ['PHP for Beginners  (2)', 'url', 6],
                ['PHP for Beginners  (3)', 'url', 6],
                ['PHP for Beginners (4)', 'url', 6],
                ['PHP for Beginners  (5)', 'url', 6],
                ['PHP for Beginners  (6)', 'url', 6],
                ['PHP for Beginners (7)', 'url', 6],
                ['PHP for Beginners  (8)', 'url', 6],
                ['PHP for Beginners  (9)', 'url', 6],

            ]
        );


        // creates index for column `course_id`
        $this->createIndex(
            '{{%idx-lesson-course_id}}',
            '{{%lesson}}',
            'course_id'
        );

        // add foreign key for table `{{%course}}`
        $this->addForeignKey(
            '{{%fk-lesson-course_id}}',
            '{{%lesson}}',
            'course_id',
            '{{%course}}',
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
            '{{%fk-lesson-course_id}}',
            '{{%lesson}}'
        );

        // drops index for column `course_id`
        $this->dropIndex(
            '{{%idx-lesson-course_id}}',
            '{{%lesson}}'
        );

        $this->dropTable('{{%lesson}}');
    }
}
