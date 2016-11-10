<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\DireccionItem */

$this->title = 'Create Direccion Item';
$this->params['breadcrumbs'][] = ['label' => 'Direccion Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="direccion-item-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
