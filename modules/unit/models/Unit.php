<?php

namespace app\modules\unit\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "unit".
 *
 * @property integer $id
 * @property string $name
 * @property string $img
 */
class Unit extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'unit';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['name'], 'required'],
            [['name', 'img'], 'string', 'max' => 255],
            [['img'], 'file', 'extensions' => 'png, jpg'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'img' => 'Img',
        ];
    }

    public function getImageurl($data = null) {
        return \Yii::$app->request->BaseUrl . '/uploads/' . $data;
    }

}
