<?php

namespace app\models;

use app\repositories\AuthAssigmentRepository;
use app\repositories\CityRepository;
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
 * @property integer $city_id
 * @property string $auth_key
 * @property string $access_token
 *
 * @property AuthAssigmentRepository $authAssigment
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
            [['name', 'surname', 'phone', 'email', 'password', 'city_id'], 'required'],
            [['name', 'surname', 'phone', 'password'], 'string', 'max' => 100],
            [['email'], 'email'],
            [['auth_key', 'access_token'], 'string', 'max' => 255],
            [['city_id'], 'integer'],
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
            'id', 'name', 'surname', 'phone', 'email', 'access_token', 'city_id'
        ];
    }

    public function attributeLabels()
    {
        return [
            'name' => 'Имя',
            'surname' => 'Фамилия',
            'phone' => 'Телефон',
            'city_id' => 'Город',
        ];
    }

    public function resolveFields(array $fields, array $expand)
    {
        $expand = ['city', 'authAssigment'];

        return parent::resolveFields($fields, $expand);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCity()
    {
        return $this->hasOne(CityRepository::class, ['id' => 'city_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuthAssigment()
    {
        return $this->hasOne(AuthAssigmentRepository::class, ['user_id' => 'id']);
    }
}
