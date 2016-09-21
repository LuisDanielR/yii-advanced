<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Tabla */

$this->title = 'Update Tabla: ' . $model->id_tabla;
$this->params['breadcrumbs'][] = ['label' => 'Tablas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_tabla, 'url' => ['view', 'id' => $model->id_tabla]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tabla-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
