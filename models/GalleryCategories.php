<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "gallery_categories".
 *
 * @property integer $id
 * @property string $name
 * @property integer $active
 * @property integer $rank
 */
class GalleryCategories extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'gallery_categories';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'rank'], 'required'],
            [['active', 'rank'], 'integer'],
            [['name'], 'string', 'max' => 128],
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
            'active' => 'Active',
            'rank' => 'Rank',
        ];
    }

    public function getMaps() {
        return $this->hasMany(GalleryCategoryMapping::className(), ['category_id'=>'id']);
    }
}
