<?php

namespace app\modules\unit\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\unit\models\Unit;

/**
 * UnitSearch represents the model behind the search form about `app\modules\unit\models\Unit`.
 */
class UnitSearch extends Unit
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'lvl'], 'integer'],
            [['name', 'img', 'hp', 'atk'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Unit::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'lvl' => $this->lvl,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'img', $this->img])
            ->andFilterWhere(['like', 'hp', $this->hp])
            ->andFilterWhere(['like', 'atk', $this->atk]);

        return $dataProvider;
    }
}
