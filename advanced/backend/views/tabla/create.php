<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Tabla */

$this->title = 'Create Tabla';
$this->params['breadcrumbs'][] = ['label' => 'Tablas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tabla-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
