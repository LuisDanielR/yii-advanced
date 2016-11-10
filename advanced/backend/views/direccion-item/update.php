<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\DireccionItem */

$this->title = 'Update Direccion Item: ' . $model->id_direccion;
$this->params['breadcrumbs'][] = ['label' => 'Direccion Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_direccion, 'url' => ['view', 'id' => $model->id_direccion]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="direccion-item-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
