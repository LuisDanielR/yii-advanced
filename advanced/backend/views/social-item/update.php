<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\SocialItem */

$this->title = 'Update Social Item: ' . $model->id_red_social;
$this->params['breadcrumbs'][] = ['label' => 'Social Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_red_social, 'url' => ['view', 'id' => $model->id_red_social]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="social-item-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
