<?php

namespace app\modules\unit\models;

use Yii;

/**
 * This is the model class for table "unit".
 *
 * @property string $id
 * @property string $name
 * @property string $img
 * @property string $hp
 * @property string $atk
 * @property integer $lvl
 *
 * @property GamerHasUnit[] $gamerHasUnits
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
            [['lvl'], 'integer'],
            ['hp', 'default', 'value' => 1000],
            ['atk', 'default', 'value' => 100],
            ['lvl', 'default', 'value' => 0],
            [['name', 'img', 'hp', 'atk'], 'string', 'max' => 45],
          
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
            'hp' => 'Hp',
            'atk' => 'Atk',
            'lvl' => 'Lvl',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGamerHasUnits() {
        return $this->hasMany(GamerHasUnit::className(), ['unit_id' => 'id']);
    }





}
