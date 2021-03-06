<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Persona */

$this->title = 'Update Persona: ' . $model->id_persona;
$this->params['breadcrumbs'][] = ['label' => 'Personas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_persona, 'url' => ['view', 'id_persona' => $model->id_persona, 'nombre' => $model->nombre]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="persona-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
