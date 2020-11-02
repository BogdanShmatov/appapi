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
                    '../images/course_1.jpg',
                    'hrefhref video preview',
                    'Создайте свою первую игру в Unity!',
                    '12',
                    'https://www.youtube.com/embed/e-5obm1G_FY',
                    '0',
                    '1'
                ],
                ['2',
                    'React Native 2020. Мобильные приложения на JavaScript',
                    'Владилен Минин',
                    '../images/course_2.jpg',
                    'hrefhref video preview',
                    'Научись создавать крутейшие мобильные приложения для Android и iOS на JavaScript + React JS',
                    '0',
                    'https://www.youtube.com/embed/IxRJ8vplzAo',
                    '1',
                    '6'
                ],
                ['3',
                    'Google AdWords for Beginners 2020',
                    'Corey Rebazin',
                    '../images/course_3.jpg',
                    'hrefhref video preview',
                    'Learn how to effectively use AdWords to reach more customers online and grow your business.',
                    '225',
                    'https://www.youtube.com/embed/f02mOEt11OQ',
                    '0',
                    '8'
                ],
                ['4',
                    'Build Your Startup with No Coding (Design, Develop & Ship)',
                    'Team Copilot',
                    '../images/course_4.jpg',
                    'hrefhref video preview',
                    'Learn to design, structure, and deploy a SaaS startup with Bubble.',
                    '0',
                    'https://www.youtube.com/embed/UyoXKGQrmtY',
                    '1',
                    '18'
                ],
                ['5',
                    'Adobe Illustrator для всех: создание векторной иллюстрации',
                    'Андрей Коваль',
                    '../images/course_5.jpg',
                    'hrefhref video preview',
                    'Графический дизайн. Полный курс по Adobe Illustrator для начинающих от профессионального иллюстратора за 1,5 часа',
                    '112',
                    'https://www.youtube.com/embed/uOUXDipWeN8',
                    '0',
                    '21'
                ],
                ['6',
                    'PHP for Beginners - Become a PHP Master - CMS Project',
                    'Edwin Diaz',
                    '../images/course_6.jpg',
                    'hrefhref video preview',
                    'PHP for Beginners: learn everything you need to become a professional PHP developer with practical exercises & projects.',
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
