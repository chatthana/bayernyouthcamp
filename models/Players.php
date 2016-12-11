<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "players".
 *
 * @property integer $id
 * @property string $unique_id
 * @property string $name
 * @property string $name_en
 * @property string $nickname
 * @property string $birthdate
 * @property integer $age
 * @property string $identity_card_no
 * @property string $identity_card_path
 * @property string $school
 * @property integer $year
 * @property string $address
 * @property string $telephone
 * @property string $line_id
 * @property string $facebook_link
 * @property string $email
 * @property string $foot
 * @property string $pp
 * @property string $ppa
 * @property integer $weight
 * @property integer $height
 * @property string $team
 * @property integer $virtual_team
 * @property string $guardian_name
 * @property string $guardian_telephone
 * @property string $source
 * @property string $arena
 * @property string $created
 */
class Players extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'players';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'name_en', 'nickname', 'birthdate', 'age', 'identity_card_no', 'identity_card_path', 'school', 'year', 'address', 'telephone', 'line_id', 'facebook_link', 'email', 'foot', 'pp', 'ppa', 'weight', 'height', 'guardian_name', 'guardian_telephone', 'source', 'created'], 'required'],
            [['birthdate', 'created'], 'safe'],
            [['age', 'year', 'weight', 'height', 'virtual_team'], 'integer'],
            [['identity_card_path', 'school', 'address', 'facebook_link', 'team'], 'string'],
            [['unique_id', 'telephone', 'guardian_telephone'], 'string', 'max' => 10],
            [['name', 'name_en', 'nickname', 'guardian_name', 'arena'], 'string', 'max' => 255],
            [['identity_card_no'], 'string', 'max' => 13],
            [['line_id'], 'string', 'max' => 32],
            [['email', 'source'], 'string', 'max' => 128],
            [['foot'], 'string', 'max' => 16],
            [['pp', 'ppa'], 'string', 'max' => 8],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'unique_id' => 'Unique ID',
            'name' => 'Name',
            'name_en' => 'Name En',
            'nickname' => 'Nickname',
            'birthdate' => 'Birthdate',
            'age' => 'Age',
            'identity_card_no' => 'Identity Card No',
            'identity_card_path' => 'Identity Card Path',
            'school' => 'School',
            'year' => 'Year',
            'address' => 'Address',
            'telephone' => 'Telephone',
            'line_id' => 'Line ID',
            'facebook_link' => 'Facebook Link',
            'email' => 'Email',
            'foot' => 'Foot',
            'pp' => 'Pp',
            'ppa' => 'Ppa',
            'weight' => 'Weight',
            'height' => 'Height',
            'team' => 'Team',
            'virtual_team' => 'Virtual Team',
            'guardian_name' => 'Guardian Name',
            'guardian_telephone' => 'Guardian Telephone',
            'source' => 'Source',
            'arena' => 'Arena',
            'created' => 'Created',
        ];
    }
}
