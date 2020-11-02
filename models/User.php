<?php
namespace app\models;


use yii\db\ActiveRecord;
use yii\helpers\Url;
use yii\web\Link;
use yii\web\Linkable;


class User extends ActiveRecord implements Linkable
{
    public function fields()
    {
        $fields = parent::fields();

        // удаляем небезопасные поля
        unset($fields['auth_key'], $fields['password_hash'], $fields['password_reset_token'],
            $fields['status'], $fields['created_at'], $fields['updated_at'], $fields['verification_token']);

        return $fields;
    }

    public function getLinks()
    {
        return [
            Link::REL_SELF => Url::to(['user/view', 'id' => $this->id], true),
        ];
    }
}
