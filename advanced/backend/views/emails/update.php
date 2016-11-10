<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Emails */

$this->title = 'Update Emails: ' . $model->id_emails;
$this->params['breadcrumbs'][] = ['label' => 'Emails', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_emails, 'url' => ['view', 'id' => $model->id_emails]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="emails-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
