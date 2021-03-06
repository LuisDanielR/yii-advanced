<?php

use yii\grid\GridView;
use yii\widgets\ActiveForm;
use yii\helpers\Html;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\CompaniesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Companies';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="companies-index"> 
    
    <h1><?= Html::encode($this->title) ?></h1>
    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

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
            'company_created_date',
            // 'company_status',
            // 'company_start_date',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
