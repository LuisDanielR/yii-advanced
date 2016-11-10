<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\SocialItem */

$this->title = $model->id_red_social;
$this->params['breadcrumbs'][] = ['label' => 'Social Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="social-item-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_red_social], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_red_social], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_red_social',
            'tipo',
            'id_usuario',
            'enlace',
        ],
    ]) ?>

</div>
