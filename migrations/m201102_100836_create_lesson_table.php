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
                ['Unity 2017 (1)','https://www.youtube.com/embed/RRTanQmJQnw', 1],
                ['Unity 2017 (2)','https://www.youtube.com/embed/Qlt0vk_UXA0?list=PLoAuSHgzxBpXMG2bNMuAI3BXhpekhTI0A', 1],
                ['Unity 2017 (3)','https://www.youtube.com/embed/hyqVKwyeOuA?list=PLoAuSHgzxBpXMG2bNMuAI3BXhpekhTI0A', 1],
                ['Unity 2017 (4)','https://www.youtube.com/embed/wwPSiAhnfCM?list=PLoAuSHgzxBpXMG2bNMuAI3BXhpekhTI0A', 1],
                ['Unity 2017 (5)','https://www.youtube.com/embed/_21eUOhtjK4?ist=PLoAuSHgzxBpXMG2bNMuAI3BXhpekhTI0A', 1],
                ['React Native 2020 (1)', 'https://www.youtube.com/embed/0-S5a0eXPoc', 2],
                ['React Native 2020 (2)', 'https://www.youtube.com/embed/Ke90Tje7VS0', 2],
                ['Google AdWords (1)', 'https://www.youtube.com/embed/vMK_pPcag2Y', 3],
                ['Google AdWords (2)', 'https://www.youtube.com/embed/azZHq0VTCaU', 3],
                ['Google AdWords (3)', 'https://www.youtube.com/embed/fImustpb0ak', 3],
                ['Google AdWords (4)', 'https://www.youtube.com/embed/KaAbJ1ovOg4', 3],
                ['Google AdWords (5)', 'https://www.youtube.com/embed/WmepvHQOHXg', 3],
                ['Google AdWords (6)', 'https://www.youtube.com/embed/nLH8sIM6xVE', 3],
                ['Google AdWords (7)', 'https://www.youtube.com/embed/_xfggHtl3X0', 3],
                ['Google AdWords (8)', 'https://www.youtube.com/embed/SEQBi9LtZjQ', 3],
                ['Google AdWords (9)', 'https://www.youtube.com/embed/6LzkKEzsqAo', 3],
                ['Google AdWords (10)', 'https://www.youtube.com/embed/UVohteY_B10', 3],
                ['Startup (1)', 'https://www.youtube.com/embed/bNpx7gpSqbY', 4],
                ['Startup (2)', 'https://www.youtube.com/embed/_asXEC-oG10', 4],
                ['Startup(3)', 'https://www.youtube.com/embed/k26DOtwPN7s', 4],
                ['Adobe Illustrator  (1)', 'https://www.youtube.com/embed/FE_EOOGfqBY', 5],
                ['Adobe Illustrator  (2)', 'https://www.youtube.com/embed/vQ3UNrAYUEE', 5],
                ['PHP for Beginners (1)', 'https://www.youtube.com/embed/OK_JCtrrv-c', 6],
                ['PHP for Beginners  (2)', 'https://www.youtube.com/embed/XBj_le81sAc', 6],
                ['PHP for Beginners  (3)', 'https://www.youtube.com/embed/U10yvfIStx8', 6],
                ['PHP for Beginners (4)', 'https://www.youtube.com/embed/atNrwSTB3-c', 6],
                ['PHP for Beginners  (5)', 'https://www.youtube.com/embed/DiEfNQsapbc', 6],
                ['PHP for Beginners  (6)', 'https://www.youtube.com/embed/WPYCJg9OSq4', 6],
                ['PHP for Beginners (7)', 'https://www.youtube.com/embed/t-EMinSz_Tk', 6],
                ['PHP for Beginners  (8)', 'https://www.youtube.com/embed/NMSlQjm2row', 6],
                ['PHP for Beginners  (9)', 'https://www.youtube.com/embed/aIXU-h_qS58', 6],

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
