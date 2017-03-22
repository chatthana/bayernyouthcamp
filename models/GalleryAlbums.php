<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "gallery_albums".
 *
 * @property integer $id
 * @property string $name
 * @property string $remark
 * @property integer $active
 */
class GalleryAlbums extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'gallery_albums';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'remark', 'active'], 'required'],
            [['remark'], 'string'],
            [['active'], 'integer'],
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
            'remark' => 'Remark',
            'active' => 'Active',
        ];
    }

    public function getImages() {
        return $this->hasMany(GalleryImages::className(), ['album_id'=>'id']);
    }
}
