<?php

namespace backend\modules\departmentsid\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\departmentsid\models\Companies;

/**
 * CompaniesSearch represents the model behind the search form about `backend\modules\departmentsid\models\Companies`.
 */
class CompaniesSearch extends Companies
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['companies_id'], 'integer'],
            [['company_name', 'company_email', 'company_address', 'company_created_date', 'company_status', 'company_start_date'], 'safe'],
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
        $query = Companies::find();

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
            'companies_id' => $this->companies_id,
            'company_created_date' => $this->company_created_date,
            'company_start_date' => $this->company_start_date,
        ]);

        $query->andFilterWhere(['like', 'company_name', $this->company_name])
            ->andFilterWhere(['like', 'company_email', $this->company_email])
            ->andFilterWhere(['like', 'company_address', $this->company_address])
            ->andFilterWhere(['like', 'company_status', $this->company_status]);

        return $dataProvider;
    }
}
