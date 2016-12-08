<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "arenas".
 *
 * @property integer $id
 * @property string $code
 * @property string $text
 * @property string $reg_date
 * @property string $last_reg_date
 * @property integer $region_id
 */
class Arenas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'arenas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['code', 'text', 'reg_date', 'last_reg_date', 'region_id'], 'required'],
            [['text'], 'string'],
            [['reg_date', 'last_reg_date'], 'safe'],
            [['region_id'], 'integer'],
            [['code'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'code' => 'Code',
            'text' => 'Text',
            'reg_date' => 'Reg Date',
            'last_reg_date' => 'Last Reg Date',
            'region_id' => 'Region ID',
        ];
    }
}
