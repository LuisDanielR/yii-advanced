<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\AgendaItem */

$this->title = 'Update Agenda Item: ' . $model->id_agenda;
$this->params['breadcrumbs'][] = ['label' => 'Agenda Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_agenda, 'url' => ['view', 'id' => $model->id_agenda]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="agenda-item-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
