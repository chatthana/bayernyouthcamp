<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "gallery_category_mapping".
 *
 * @property integer $id
 * @property integer $category_id
 * @property integer $album_id
 */
class GalleryCategoryMapping extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'gallery_category_mapping';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category_id', 'album_id'], 'required'],
            [['category_id', 'album_id'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_id' => 'Category ID',
            'album_id' => 'Album ID',
        ];
    }

    public function getAlbums() {
        return $this->hasMany(GalleryAlbums::className(), ['id'=>'album_id']);
    }
}
