<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user}}`.
 */
class m210110_072840_create_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey(),
            'username' => $this->string()->notNull()->unique(),
            'auth_key' => $this->string()->notNull(),
            'password_hash' => $this->string()->notNull(),
            'email' => $this->string()->unique()->notNull(),
        ]); $this->batchInsert('{{%user}}',
        ['username',
            'auth_key',
            'password_hash',
            'email',
        ], [

            ['academic',
                'MzRQ7SOj2AYa2iOmyyUfAvJyegn0dD8Y',
                '$2y$13$1sJDjDFsSh0bHGF.8SgxH.rCr5fIAo.fMeMHL7XCD/YahVYgCF0Cy',
                'academic@info.com',
            ],

        ]
    );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%user}}');
    }
}
