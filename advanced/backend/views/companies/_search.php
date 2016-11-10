<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\CompaniesSearch */
/* @var $form yii\widgets\ActiveForm 

 *   <?= $form->field($model, 'companies_id') ?>

    <?= $form->field($model, 'company_name') ?>

    <?= $form->field($model, 'company_email') ?>

    <?= $form->field($model, 'company_address') ?>

    <?= $form->field($model, 'company_created_date') ?> */
?>

<div class="companies-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>
    
    <?= $form->field($model, 'globalSearch') ?>
    
    <?php // echo $form->field($model, 'company_status') ?>

    <?php // echo $form->field($model, 'company_start_date') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
