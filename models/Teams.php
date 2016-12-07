<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "teams".
 *
 * @property integer $id
 * @property string $pretty_unique_id
 * @property string $selected_arena
 * @property string $created
 */
class Teams extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'teams';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pretty_unique_id', 'selected_arena', 'created'], 'required'],
            [['created'], 'safe'],
            [['pretty_unique_id'], 'string', 'max' => 32],
            [['selected_arena'], 'string', 'max' => 64],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'pretty_unique_id' => 'Pretty Unique ID',
            'selected_arena' => 'Selected Arena',
            'created' => 'Created',
        ];
    }
}
