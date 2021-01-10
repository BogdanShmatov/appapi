<?php
namespace app\models;



use yii\db\ActiveRecord;
use yii\helpers\Url;
use yii\web\IdentityInterface;
use yii\web\Link;
use yii\web\Linkable;


class User extends ActiveRecord implements IdentityInterface
{
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['auth_key' => $token]);
    }

    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id]);
    }
    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }
    public function fields()
    {
        $fields = parent::fields();

        // удаляем небезопасные поля
        unset($fields['auth_key'], $fields['password_hash'], $fields['password_reset_token'],
            $fields['status'], $fields['created_at'], $fields['updated_at'], $fields['verification_token']);

        return $fields;
    }


}
