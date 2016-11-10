<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Persona */

$this->title = $model->id_persona;
$this->params['breadcrumbs'][] = ['label' => 'Personas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="persona-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id_persona' => $model->id_persona, 'nombre' => $model->nombre], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id_persona' => $model->id_persona, 'nombre' => $model->nombre], [
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
            'id_persona',
            'nombre',
        ],
    ]) ?>

</div>
