<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Platillos */

$this->title = 'Update Platillos: ' . $model->id_platillos;
$this->params['breadcrumbs'][] = ['label' => 'Platillos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_platillos, 'url' => ['view', 'id' => $model->id_platillos]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="platillos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
