<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\CorreoItem;

/**
 * CorreoItemSearch represents the model behind the search form about `backend\models\CorreoItem`.
 */
class CorreoItemSearch extends CorreoItem
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_correo', 'id_usuario'], 'integer'],
            [['correo', 'tipo'], 'safe'],
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
        $query = CorreoItem::find();

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
            'id_correo' => $this->id_correo,
            'id_usuario' => $this->id_usuario,
        ]);

        $query->andFilterWhere(['like', 'correo', $this->correo])
            ->andFilterWhere(['like', 'tipo', $this->tipo]);

        return $dataProvider;
    }
}
