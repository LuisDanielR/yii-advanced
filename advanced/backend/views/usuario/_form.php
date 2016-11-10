<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use wbraganca\dynamicform\DynamicFormWidget;

/* @var $this yii\web\View */
/* @var $model backend\models\Usuario */
/* @var $form yii\widgets\ActiveForm 
*/
?>

<div class="usuario-form">    
    
    <?php $form = ActiveForm::begin(['id' => 'dynamic-form']); ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'apellido_paterno')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'apellido_materno')->textInput(['maxlength' => true]) ?>
            
    <div class ="row">
        <div class="panel panel-default">
            <div class="panel-heading"><h4><i class="glyphicon glyphicon-envelope"></i> Agenda de contactos</h4></div>
            <div class="panel-body">
             <?php DynamicFormWidget::begin([
                'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]                
                'widgetBody' => '.container-items-agendas', // required: css class selector
                'widgetItem' => '.agendas', // required: css class
                'limit' => 10, // the maximum times, an element can be cloned (default 999)
                'min' => 1, // 0 or 1 (default 1)
                'insertButton' => '.add-agendas', // css class
                'deleteButton' => '.remove-agendas', // css class
                'model' => $modelsAgendaItem[0],
                'formId' => 'dynamic-form',
                'formFields' => [
                    'telefono',
                    'tipo',
                ],
            ]); ?>
                
            <div class="container-items-agendas"><!-- widgetContainer -->
            <?php foreach ($modelsAgendaItem as $i => $modelAgendaItem): ?>
                <div class="agendas panel panel-default"><!-- widgetBody -->
                    <div class="panel-heading">
                           <h3 class="panel-title pull-left">Contacto Item</h3>
                        <div class="pull-right">
                            <button type="button" class="add-agendas btn btn-success btn-xs"><i class="glyphicon glyphicon-plus">Usuario Items</i></button>
                            <button type="button" class="remove-agendas btn btn-danger btn-xs"><i class="glyphicon glyphicon-minus"></i></button>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-body">
                        <?php
                            // necessary for update action.
                            if (! $modelAgendaItem->isNewRecord) {
                                echo Html::activeHiddenInput($modelAgendaItem, "[{$i}]id");
                            }
                        ?>                        
                        <div class="row">
                            <div class="col-sm-6">
                                <?= $form->field($modelAgendaItem, "[{$i}]telefono")->textInput(['maxlength' => true]) ?>
                            </div>
                            <div class="col-sm-6">                                
                                <?= $form->field($modelAgendaItem,"[{$i}]tipo")->dropDownList([ 'Casa' => 'casa', 'Trabajo' => 'trabajo', 'Movil' => 'movil', ], ['prompt' => '']) ?>
                            </div>
                        </div><!-- .row -->
                    </div>
                </div>
            <?php endforeach; ?>
            </div>
                
            <?php DynamicFormWidget::end(); ?>
        </div>
    </div>
    </div>
    
    
    <div class ="row">
        <div class="panel panel-default">
            <div class="panel-heading"><h4><i class="glyphicon glyphicon-envelope"></i> Agenda de Correos</h4></div>
            <div class="panel-body">
             <?php DynamicFormWidget::begin([
                'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]                
                'widgetBody' => '.container-items-correos', // required: css class selector
                'widgetItem' => '.correos', // required: css class
                'limit' => 10, // the maximum times, an element can be cloned (default 999)
                'min' => 1, // 0 or 1 (default 1)
                'insertButton' => '.add-correos', // css class
                'deleteButton' => '.remove-correos', // css class
                'model' => $modelsCorreoItem[0],
                'formId' => 'dynamic-form',
                'formFields' => [
                    'correo',
                    'tipo',
                ],
            ]); ?>
                
            <div class="container-items-correos"><!-- widgetContainer -->
            <?php foreach ($modelsCorreoItem as $i => $modelCorreoItem): ?>
                <div class="correos panel panel-default"><!-- widgetBody -->
                    <div class="panel-heading">
                        <h3 class="panel-title pull-left">Correo Item</h3>
                        <div class="pull-right">
                            <button type="button" class="add-correos btn btn-success btn-xs"><i class="glyphicon glyphicon-plus">Usuario Items</i></button>
                            <button type="button" class="remove-correos btn btn-danger btn-xs"><i class="glyphicon glyphicon-minus"></i></button>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-body">
                        <?php
                            // necessary for update action.
                            if (! $modelCorreoItem->isNewRecord) {
                                echo Html::activeHiddenInput($modelCorreoItem, "[{$i}]id");
                            }
                        ?>                        
                        <div class="row">
                            <div class="col-sm-6">
                                <?= $form->field($modelCorreoItem, "[{$i}]correo")->textInput(['maxlength' => true]) ?>
                            </div>
                            <div class="col-sm-6">                                
                                <?= $form->field($modelCorreoItem,"[{$i}]tipo")->dropDownList([ 'Social' => 'social', 'Trabajo' => 'trabajo',], ['prompt' => '']) ?>
                            </div>
                        </div><!-- .row -->
                    </div>
                </div>
            <?php endforeach; ?>
            </div>
                
            <?php DynamicFormWidget::end(); ?>
        </div>
    </div>
    </div> 
    
    <div class ="row">
        <div class="panel panel-default">
            <div class="panel-heading"><h4><i class="glyphicon glyphicon-envelope"></i> Agenda de Direcciones</h4></div>
            <div class="panel-body">
             <?php DynamicFormWidget::begin([
                'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]                
                'widgetBody' => '.container-items-direcciones', // required: css class selector
                'widgetItem' => '.direcciones', // required: css class
                'limit' => 10, // the maximum times, an element can be cloned (default 999)
                'min' => 1, // 0 or 1 (default 1)
                'insertButton' => '.add-direcciones', // css class
                'deleteButton' => '.remove-direcciones', // css class
                'model' => $modelsDireccionItem[0],
                'formId' => 'dynamic-form',
                'formFields' => [
                    'direccion',
                    'tipo',
                ],
            ]); ?>
                
            <div class="container-items-direcciones"><!-- widgetContainer -->
            <?php foreach ($modelsDireccionItem as $i => $modelDireccionItem): ?>
                <div class="direcciones panel panel-default"><!-- widgetBody -->
                    <div class="panel-heading">
                        <h3 class="panel-title pull-left">Direccion Item</h3>
                        <div class="pull-right">
                            <button type="button" class="add-direcciones btn btn-success btn-xs"><i class="glyphicon glyphicon-plus">Usuario Items</i></button>
                            <button type="button" class="remove-direcciones btn btn-danger btn-xs"><i class="glyphicon glyphicon-minus"></i></button>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-body">
                        <?php
                            // necessary for update action.
                            if (! $modelDireccionItem->isNewRecord) {
                                echo Html::activeHiddenInput($modelDireccionItem, "[{$i}]id");
                            }
                        ?>                        
                        <div class="row">
                            <div class="col-sm-6">
                                <?= $form->field($modelDireccionItem, "[{$i}]direccion")->textInput(['maxlength' => true]) ?>
                            </div>
                            <div class="col-sm-6">
                                <?= $form->field($modelDireccionItem,"[{$i}]tipo")->dropDownList([ 'Casa' => 'casa', 'Trabajo' => 'trabajo',], ['prompt' => '']) ?>
                            </div>
                        </div><!-- .row -->
                    </div>
                </div>
            <?php endforeach; ?>
            </div>
                
            <?php DynamicFormWidget::end(); ?>
        </div>
    </div>
    </div> 
    
    <div class ="row">
        <div class="panel panel-default">
            <div class="panel-heading"><h4><i class="glyphicon glyphicon-envelope"></i> Agenda de Redes Sociales</h4></div>
            <div class="panel-body">
             <?php DynamicFormWidget::begin([
                'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]                
                'widgetBody' => '.container-items-sociales', // required: css class selector
                'widgetItem' => '.sociales', // required: css class
                'limit' => 10, // the maximum times, an element can be cloned (default 999)
                'min' => 1, // 0 or 1 (default 1)
                'insertButton' => '.add-sociales', // css class
                'deleteButton' => '.remove-sociales', // css class
                'model' => $modelsSocialItem[0],
                'formId' => 'dynamic-form',
                'formFields' => [
                    'tipo',
                    'enlace',
                ],
            ]); ?>
                
            <div class="container-items-sociales"><!-- widgetContainer -->
            <?php foreach ($modelsSocialItem as $i => $modelSocialItem): ?>
                <div class="sociales panel panel-default"><!-- widgetBody -->
                    <div class="panel-heading">
                        <h3 class="panel-title pull-left">Agenda Item</h3>
                        <div class="pull-right">
                            <button type="button" class="add-sociales btn btn-success btn-xs"><i class="glyphicon glyphicon-plus">Usuario Items</i></button>
                            <button type="button" class="remove-sociales btn btn-danger btn-xs"><i class="glyphicon glyphicon-minus"></i></button>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-body">
                        <?php
                            // necessary for update action.
                            if (! $modelSocialItem->isNewRecord) {
                                echo Html::activeHiddenInput($modelSocialItem, "[{$i}]id");
                            }
                        ?>                        
                        <div class="row">                           
                            <div class="col-sm-6">
                                <?= $form->field($modelSocialItem,"[{$i}]tipo")->dropDownList([ 'Facebook' => 'facebook', 'Instagram' => 'instagram', 'Google+' => 'google+', 'Linkedin' => 'linkedin', ], ['prompt' => '']) ?>
                            </div>
                            <div class="col-sm-6">
                                <?= $form->field($modelSocialItem, "[{$i}]enlace")->textInput(['maxlength' => true]) ?>
                            </div>
                        </div><!-- .row -->
                    </div>
                </div>
            <?php endforeach; ?>
            </div>
                
            <?php DynamicFormWidget::end(); ?>
        </div>
    </div>
    </div> 
          
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
     <?= $form->field($model, 'reCaptcha')->widget( \himiklab\yii2\recaptcha\ReCaptcha::className(),
    ['siteKey' => '6Le7HQkUAAAAAI6lRKb1fB9tMkl-tmpluodxfD64']) ?>
    
    <?php ActiveForm::end(); ?>
    
</div>
