<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property string $name
 * @property string $surname
 * @property string $phone
 * @property string $email
 * @property string $password
 * @property string $auth_key
 * @property string $access_token
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'surname', 'phone', 'email', 'password'], 'required'],
            [['name', 'surname', 'phone', 'password'], 'string', 'max' => 100],
            [['email'], 'email'],
            [['auth_key', 'access_token'], 'string', 'max' => 255],
            [['phone'], 'unique'],
            [['email'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function fields()
    {
        return [
            'name', 'surname', 'phone', 'email', 'access_token'
        ];
    }
}
