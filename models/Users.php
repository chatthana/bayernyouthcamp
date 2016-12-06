<?php

namespace app\models;

use Yii;
use app\components\Encryptor;

/**
 * This is the model class for table "users".
 *
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $firstname
 * @property string $lastname
 * @property string $email
 * @property string $telephone
 * @property string $address
 */
class Users extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'password', 'firstname', 'lastname', 'email', 'telephone'], 'required'],
            [['address'], 'string'],
            [['username'], 'string', 'max' => 32],
            [['password'], 'string', 'max' => 128],
            [['firstname', 'lastname', 'email'], 'string', 'max' => 255],
            [['telephone'], 'string', 'max' => 16],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'password' => 'Password',
            'firstname' => 'Firstname',
            'lastname' => 'Lastname',
            'email' => 'Email',
            'telephone' => 'Telephone',
            'address' => 'Address',
        ];
    }

    public static function findByUsername($username) {
      return self::findOne(['username'=>$username]);
    }

    public function validatePassword($password) {
      return $this->password = Encryptor::encrypt($password);
    }

    /**
     * IDENTITY RESTRICTED METHODS (INTERFACE)
     */

    public static function findIdentity($id)
    {
        return self::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        // return static::findOne(['access_token' => $token]);
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAuthKey()
    {
        // return $this->authKey;
    }

    public function validateAuthKey($authKey)
    {
        // return $this->authKey === $authKey;
    }
}
