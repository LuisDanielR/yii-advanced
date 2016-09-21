<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\TablaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tablas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tabla-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Tabla', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_tabla',
            'nombre_tabla',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
