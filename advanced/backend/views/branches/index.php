<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\helpers\Url;
use yii\bootstrap\Modal;
use kartik\export\ExportMenu;
use yii\widgets\Pjax;
use yii\grid\SerialColumn;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\BranchesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider 
<?= Html::a('Create Branches', ['create'], ['class' => 'btn btn-success']) ?> */

$this->title = 'Branches';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="branches-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::button('Create Branches', [ 'value' => Url::to('index.php?r=branches/create'),'class' => 'btn btn-success', 'id'=>'modalButton']) ?> 
    </p>
    
     <?php
        Modal::begin([
                    'header'=>'<h4>Branches</h4>',
                    'id'=>'modal',
                    'size'=>'modal-lg',
                ]);
        echo "<div id='modelContent'></div>";
        Modal::end();        
    ?>
    
    <div class="exportMenu">
        
    <?php
    
    $this->params['test'] = 'Test String didas';
    $this->beginBlock('advertisement');
    
    ?>        
        
        <h3> This is advertisement </h3>        
        
    <?php    
      $this->endBlock();?>
        
    <?php  
      $gridColumns = [  
            'branch_name',
            'branch_address',
            'branch_created_date',
            'branch_status',            
        ]; 
      
        echo ExportMenu::widget([
            'dataProvider' => $dataProvider,
            'columns' => $gridColumns,
            'pdfLibraryPath'=>'@vendor/kartik-v/mpdf'
        ]);
    ?>
    </div>
    
    <?php
         $script = "$(document).ready(function() {".
         "$('.exportMenu .dropdown-toggle').dropdown();".
         "});﻿";
         $this->registerJs($script);
     ?>   

    <!--?php Pjax::begin(['id'=>'branchesGrid'])?-->
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'pjax'=>true,
        'export'=>false,
        'rowOptions'=>function($model){
            if($model->branch_status=='inactive'){
                return ['class'=>'danger'];
            }else{
                return ['class'=>'success'];
            }
        },
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            //'branch_id',
            //'companies_company_id',
            
            [
                'attribute'=>'companies_company_id',
                'value'=>'companiesCompany.company_name'
            ],
            [
                'class' => 'kartik\grid\EditableColumn',
                'header' => 'BRANCH',
                'attribute' => 'branch_name',
            ],
            //'companiesCompany.company_name',
            //'branch_name',
            'branch_address',
            'branch_created_date',
            'branch_status',            
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>    
    <!--?php Pjax::end(); ?-->
    
</div>
