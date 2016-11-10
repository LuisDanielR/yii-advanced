<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\AgendaItem */

$this->title = 'Create Agenda Item';
$this->params['breadcrumbs'][] = ['label' => 'Agenda Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="agenda-item-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
