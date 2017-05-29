<?php

namespace app\modules\unit\models;

use Yii;
use yii\helpers\Html;
/**
 * This is the model class for table "gamer".
 *
 * @property string $id
 * @property string $name
 *
 * @property GamerHasUnit[] $gamerHasUnits
 */
class Gamer extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'gamer';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 45],
            [['unit_list'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'name' => 'Name',
        ];
    }

    public function getMyunits() {
        $myunits = $this->units;
        for ($i = 0; $i <= count($myunits); $i++) {
            if (!empty($myunits[$i]['name']))
                $myunit[] = Html::a($myunits[$i]['name'], ['/unit/unit/view', 'id' => $myunits[$i]['id'],], ['class' => 'btn btn-link']);
        }
        return ($myunit) ? implode($myunit) : '';
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGamerHasUnits() {
        return $this->hasMany(GamerHasUnit::className(), ['gamer_id' => 'id']);
    }

     public function getUnits()
    {
        return $this->hasMany(Unit::className(), ['id' => 'unit_id'])
                        ->viaTable('gamer_has_unit', ['gamer_id' => 'id']);
    }
    
    public function behaviors() {
        return [
            [
                'class' => \voskobovich\behaviors\ManyToManyBehavior::className(),
                'relations' => [
                    'unit_list' => 'myunits',
                ],
            ],
        ];
    }

}
