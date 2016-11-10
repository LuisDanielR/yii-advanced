<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Companies;
use kartik\select2\Select2; 
use himiklap\yii2\recaptcha\ReCaptcha;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model backend\models\Branches */
/* @var $form yii\widgets\ActiveForm 
    <?= $form->field($model, 'branch_created_date')->textInput() ?> 
    <?= $form->field($model, 'companies_company_id')->dropDownList(
            ArrayHelper::map(Companies::find()->all(),'companies_id','company_name'),['prompt'=>'el mensaje']);
           ?>
 *  */
?>

<div class="branches-form">

     <?php $form = ActiveForm::begin(['id'=>$model->formName(),
                                    'enableAjaxValidation'=>true, 
                                    'validationUrl' => Url::toRoute('branches/validation'),]); ?>
    
    <?=$form->field($model, 'companies_company_id')->widget(Select2::classname(), [
    'data' => ArrayHelper::map(Companies::find()->all(),'companies_id','company_name'),
    'language' => 'en',
    'options' => ['placeholder' => 'Select a state ...'],
    'pluginOptions' => [
        'allowClear' => true
    ],
    ]);?>
    
    <?= $form->field($model, 'branch_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'branch_address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'branch_status')->dropDownList([ 'active' => 'Active', 'inactive' => 'Inactive', ], ['prompt' => 'Status']) ?>         

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
  <?php $script =           
        "$('form#{$model->formName()}').on('beforeSubmit',function(e)
        {
        var \$form = $(this);
        $.post(
            \$form.attr('action'),
            \$form.serialize()
	).done(function(result){
            console.log(result);
            if(result == 1){		
                $(\$form).trigger('reset');
		$.pjax.reload({container:'#branchesGrid'});
	}else{		
		$('#message').html(result);
	}
        }).fail(function()
        {
		console.log('server error');
	});
	return false;
});";
        $this->registerJs($script);?>


