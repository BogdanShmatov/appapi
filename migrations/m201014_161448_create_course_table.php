<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%course}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%category}}`
 */
class m201014_161448_create_course_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%course}}', [
            'id' => $this->primaryKey(),
            'cat_id' => $this->integer(),
            'course_name' => $this->string(255)->notNull(),
            'course_author' => $this->string(255)->notNull(),
            'course_img_url' => $this->string()->notNull(),
            'course_video_url' => $this->string()->notNull(),
            'course_description' => $this->string()->notNull(),
            'course_price' => $this->integer()->notNull(),
            'course_preview' => $this->string()->notNull(),
            'course_isFree' => $this->boolean()->notNull()->defaultValue(0),
            'lessons' => $this->integer(),

        ]);

        $this->batchInsert('{{%course}}',
            ['cat_id',
                'course_name',
                'course_author',
                'course_img_url',
                'course_video_url',
                'course_description',
                'course_price',
                'course_preview',
                'course_isFree',
                'lessons'], [

                ['1',
                    'Unity 2017 для начинающих',
                    'Роман Сакутин',
                    '/images/course_1.jpg',
                    'https://www.youtube.com/embed/RRTanQmJQnw',
                    'Создайте свою первую игру в Unity!',
                    '12',
                    'https://www.youtube.com/embed/e-5obm1G_FY',
                    '0',
                    '1'
                ],
                ['2',
                    'React Native 2020',
                    'Владилен Минин',
                    '/images/course_2.jpg',
                    'https://www.youtube.com/embed/0-S5a0eXPoc',
                    'Мобильные приложения для Android/iOS на JS + React JS',
                    '0',
                    'https://www.youtube.com/embed/IxRJ8vplzAo',
                    '1',
                    '6'
                ],
                ['3',
                    'Google AdWords 2020',
                    'Corey Rebazin',
                    '/images/course_3.jpg',
                    'https://www.youtube.com/embed/vMK_pPcag2Y',
                    'Learn how to effectively use AdWords grow your business.',
                    '225',
                    'https://www.youtube.com/embed/f02mOEt11OQ',
                    '0',
                    '8'
                ],
                ['4',
                    'Build Your Startup',
                    'Team Copilot',
                    '/images/course_4.jpg',
                    'https://www.youtube.com/embed/bNpx7gpSqbY',
                    'Learn to design, structure, and deploy a SaaS startup with Bubble.',
                    '0',
                    'https://www.youtube.com/embed/UyoXKGQrmtY',
                    '1',
                    '18'
                ],
                ['5',
                    'Adobe Illustrator',
                    'Андрей Коваль',
                    '/images/course_5.jpg',
                    'https://www.youtube.com/embed/FE_EOOGfqBY',
                    'Курс по Adobe Illustrator до профессионального иллюстратора за 1,5 часа',
                    '112',
                    'https://www.youtube.com/embed/uOUXDipWeN8',
                    '0',
                    '21'
                ],
                ['6',
                    'PHP for Beginners',
                    'Edwin Diaz',
                    '/images/course_6.jpg',
                    'https://www.youtube.com/embed/OK_JCtrrv-c',
                    'Learn everything you need to become a professional PHP developer.',
                    '0',
                    'https://www.youtube.com/embed/sRJ6GYiCwkI',
                    '1',
                    '23'
                ],
            ]
        );
        // creates index for column `cat_id`
        $this->createIndex(
            '{{%idx-course-cat_id}}',
            '{{%course}}',
            'cat_id'
        );

        // add foreign key for table `{{%category}}`
        $this->addForeignKey(
            '{{%fk-course-cat_id}}',
            '{{%course}}',
            'cat_id',
            '{{%category}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%category}}`
        $this->dropForeignKey(
            '{{%fk-course-cat_id}}',
            '{{%course}}'
        );

        // drops index for column `cat_id`
        $this->dropIndex(
            '{{%idx-course-cat_id}}',
            '{{%course}}'
        );

        $this->dropTable('{{%course}}');
    }
}
