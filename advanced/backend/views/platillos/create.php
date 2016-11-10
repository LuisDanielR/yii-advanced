<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Platillos */

$this->title = 'Create Platillos';
$this->params['breadcrumbs'][] = ['label' => 'Platillos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="platillos-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
