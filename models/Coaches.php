<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "coaches".
 *
 * @property integer $id
 * @property string $name
 * @property string $name_en
 * @property string $identity_card_no
 * @property string $identity_card_path
 * @property integer $age
 * @property string $telephone
 * @property string $email
 * @property string $school
 * @property string $address
 * @property integer $virtual_team
 * @property string $created
 */
class Coaches extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'coaches';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'name_en', 'identity_card_no', 'identity_card_path', 'age', 'telephone', 'email', 'school', 'address', 'virtual_team', 'created'], 'required'],
            [['identity_card_path', 'school', 'address'], 'string'],
            [['age', 'virtual_team'], 'integer'],
            [['created'], 'safe'],
            [['name', 'name_en', 'email'], 'string', 'max' => 255],
            [['identity_card_no'], 'string', 'max' => 13],
            [['telephone'], 'string', 'max' => 10],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'name_en' => 'Name En',
            'identity_card_no' => 'Identity Card No',
            'identity_card_path' => 'Identity Card Path',
            'age' => 'Age',
            'telephone' => 'Telephone',
            'email' => 'Email',
            'school' => 'School',
            'address' => 'Address',
            'virtual_team' => 'Virtual Team',
            'created' => 'Created',
        ];
    }
}
