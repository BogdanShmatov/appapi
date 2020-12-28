<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%course}}`.
 */
class m201221_180113_add_user_id_column_to_course_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%course}}', 'user_id', $this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%course}}', 'user_id');
    }
}
