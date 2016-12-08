<?php

namespace app\models;

use Yii;
use app\models\Arenas;

/**
 * This is the model class for table "regions".
 *
 * @property integer $id
 * @property string $name
 * @property string $remark
 */
class Regions extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'regions';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['remark'], 'string'],
            [['name'], 'string', 'max' => 64],
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
            'remark' => 'Remark',
        ];
    }

    public function getArenas() {
      return $this->hasMany(Arenas::className(), ['region_id'=>'id']);
    }
}
