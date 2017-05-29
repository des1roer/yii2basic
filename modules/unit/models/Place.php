<?php

namespace app\modules\unit\models;

use Yii;

/**
 * This is the model class for table "place".
 *
 * @property string $id
 * @property string $comm
 *
 * @property GamerHasUnit[] $gamerHasUnits
 */
class Place extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'place';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['comm'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'comm' => 'Comm',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGamerHasUnits()
    {
        return $this->hasMany(GamerHasUnit::className(), ['place_id' => 'id']);
    }
}
