<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%category}}`.
 */
class m201014_155844_create_category_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%category}}', [
            'id' => $this->primaryKey(),
            'cat_name' => $this->string()->notNull(),
        ]);

        $this->batchInsert('{{%category}}', ['cat_name'], [
                ['Разработка игр'],
                ['Разработка мобильных приложений'],
                ['Интернет-маркетинг'],
                ['Предпринимательство'],
                ['Графический дизайн'],
                ['Веб-разработка'],
            ]
        );

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%category}}');
    }
}
