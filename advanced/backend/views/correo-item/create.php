<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\CorreoItem */

$this->title = 'Create Correo Item';
$this->params['breadcrumbs'][] = ['label' => 'Correo Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="correo-item-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
