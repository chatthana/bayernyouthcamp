<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "gallery_images".
 *
 * @property integer $id
 * @property integer $album_id
 * @property string $path
 * @property string $external_link
 */
class GalleryImages extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'gallery_images';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['album_id', 'path'], 'required'],
            [['album_id'], 'integer'],
            [['path', 'external_link'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'album_id' => 'Album ID',
            'path' => 'Path',
            'external_link' => 'External Link',
        ];
    }

    public function getAlbum() {
        return $this->hasOne(GalleryAlbums::className(), ['id'=>'album_id']);
    }
}
