<?php

use yii\helpers\Html;
use yii\grid\GridView;
use dosamigos\datepicker\DatePicker;
use backend\models\CompaniesSearch;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\departmentsid\models\CompaniesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Companies';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="companies-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Companies', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'companies_id',
            'company_name',
            'company_email:email',
            'company_address',
            //'company_created_date', Se quito 23 
            [
                'attribute'=>'company_start_date',
                'value'=>'company_start_date',
                'format'=>'raw',
                'filter'=>DatePicker::widget([
                    'model' => $searchModel,
                    'attribute' => 'company_start_date',                    
                    'clientOptions' => [
                    'autoclose' => true,
                    'format' => 'yyyy-mm-dd'
                    ]
                ]),
            ],
           
            // 'company_status',
            // 'company_start_date',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
