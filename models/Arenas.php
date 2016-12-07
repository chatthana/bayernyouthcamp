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
            [['code', 'text', 'reg_date'], 'required'],
            [['text'], 'string'],
            [['reg_date'], 'safe'],
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
        ];
    }
}
