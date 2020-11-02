<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%course}}`.
 */
class m201102_091935_add_date_column_to_course_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%course}}', 'date', $this->dateTime()->defaultValue('2020.11.11 15.47'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%course}}', 'date');
    }
}
