<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\SocialItem */

$this->title = 'Create Social Item';
$this->params['breadcrumbs'][] = ['label' => 'Social Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="social-item-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
