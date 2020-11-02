<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user}}`.
 */
class m201014_160618_create_user_table extends Migration
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
            'password_reset_token' => $this->string(),
            'email' => $this->string()->unique()->notNull(),
            'status' => $this->smallInteger(6)->notNull(),
            'created_at' => $this->dateTime()->notNull(),
            'updated_at' => $this->dateTime()->notNull(),
            'verification_token' => $this->string(),
            'user_name' => $this->string(),
            'user_surname' => $this->string(),
            'user_balance' => $this->integer(),
        ]);
        $this->batchInsert('{{%user}}',
            ['username',
                'auth_key',
                'password_hash',
                'password_reset_token',
                'email',
                'status',
                'created_at',
                'updated_at',
                'verification_token',
                'user_name',
                'user_surname',
                'user_balance',
                ], [

                ['bogdanshmatov',
                    '0fE74IYNaSg3BanVSYQjyYfSNCHJCosI',
                    '$2y$13$Yv.dxeZoOVDTuWe3nfI1jOc50BJFjIev.Z.oHrz3kA73I8dtaXnPi',
                    '',
                    'bogdan@login.com',
                    '10',
                    '2020-10-19',
                    '2020-10-20',
                    '93R8kfPj_yqZyKZqOltjXXBrsst-asZ8_1603348497',
                    'Bogdan',
                    'Shmatov',
                    '1000',
                ],
                ['kolobok',
                    'FT0tWeRJKrqTIIr9Fqe6Pzpvu8FkP-nM',
                    '$2y$13$v/upRvuE5GUJEZMDEfbDlOVyvC3ZHSXy7/AhqyXYyoRbEeosIU1oi',
                    '',
                    'ivanlh@login.com',
                    '10',
                    '2020-11-19',
                    '2020-12-20',
                    '8QNm9djIpMXo-ss-kPGhfZrC5FcIL1Wm_1603377579',
                    'Ivan',
                    'Mi',
                    '250',
                ],
                ['john123',
                    '8oUC7Xnl7Sq0W-hnb0iwPsFvLDlj3jmN',
                    '$2y$13$vqNcgBwsWoAgRv9ZPrkqweUZk8sLPSLmF4AoMHbC6sW8myPTqzI1S',
                    '',
                    'john@login.com',
                    '10',
                    '2020-10-25',
                    '2020-10-26',
                    'h4ZjlI7xPiF-rKtpKuncrqVl9WwcEKaz_1603377600',
                    'John',
                    'Noa',
                    '363633',
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
