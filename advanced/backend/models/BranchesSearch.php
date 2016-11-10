<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Branches;

/**
 * BranchesSearch represents the model behind the search form about `backend\models\Branches`.
 */
class BranchesSearch extends Branches
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            //[['branch_id', 'companies_company_id'], 'integer'],
            [['branch_id'], 'integer'],
            //[['branch_name', 'branch_address', 'branch_created_date', 'branch_status'], 'safe'],
            [['branch_name', 'branch_address', 'branch_created_date', 'branch_status', 'companies_company_id'], 'safe'],
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
        $query = Branches::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        
        $query->joinWith('companiesCompany'); //video 53
        
        $dataProvider->setSort([
           'attributes' =>  [
               'branch_name',
               'branch_created_date',
               'branch_status',
               'companies_company_id'=>[
                   'asc'=>['companies.company_name'=>SORT_ASC],
                   'desc'=>['companies.company_name'=>SORT_DESC],
               ]
           ]
        ]);
        
        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'branch_id' => $this->branch_id,
            'branch_created_date' => $this->branch_created_date,
            'companies_company_id' => $this->companies_company_id,
        ]);

        $query->andFilterWhere(['like', 'branch_name', $this->branch_name])
            ->andFilterWhere(['like', 'branch_address', $this->branch_address])
            ->andFilterWhere(['like', 'branch_status', $this->branch_status]);

        return $dataProvider;
    }
}
