<?php

namespace app\repositories;

use app\models\User;
use Firebase\JWT\JWT;
use yii\web\IdentityInterface;

class UserRepository extends User implements IdentityInterface
{
    /** @var string $jwtKey */
    const JWT_KEY = 'JXj3DKgbDXyiuQtc82RjQemQkkfnp0NkhBoACQVB5X4=';

    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        return self::findOne($id);
    }

    /**
     * Find User by conditions
     *
     * @param array $condition
     * @return UserRepository|null
     */
    public function findByConditions(array $condition)
    {
        return self::findOne($condition);
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        $decoded = JWT::decode($token, self::JWT_KEY, array('HS256'));

        $condition = [
            'id' => $decoded->iss,
            'name' => $decoded->aud,
            'email' => $decoded->iat,
            'phone' => $decoded->nbf,
        ];

        return self::findOne($condition);
    }

    /**
     * Generate new user's access token
     *
     * @return string
     */
    public function generateToken()
    {
        $token = array(
            "iss" => $this->id,
            "aud" => $this->name,
            "iat" => $this->email,
            "nbf" => $this->phone
        );

        return JWT::encode($token, self::JWT_KEY);
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }
}