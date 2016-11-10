<?php

namespace backend\controllers;

use Yii;
use backend\models\Usuario;
use backend\models\UsuarioSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\models\AgendaItem;
use backend\models\Model;
use backend\models\CorreoItem;
use backend\models\DireccionItem;
use backend\models\SocialItem;

/**
 * UsuarioController implements the CRUD actions for Usuario model.
 */
class UsuarioController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Usuario models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UsuarioSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Usuario model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Usuario model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Usuario();
        $modelsAgendaItem = [new AgendaItem()];
        $modelsCorreoItem = [new CorreoItem()];
        $modelsDireccionItem = [new DireccionItem()];
        $modelsSocialItem = [new SocialItem()];        
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
              //codigo de upala            
            $modelsAgendaItem = Model::createMultiple(AgendaItem::classname());
            Model::loadMultiple($modelsAgendaItem, Yii::$app->request->post());
            
            $modelsCorreoItem = Model::createMultiple(CorreoItem::classname());
            Model::loadMultiple($modelsCorreoItem, Yii::$app->request->post());
            
            $modelsDireccionItem = Model::createMultiple(DireccionItem::classname());
            Model::loadMultiple($modelsDireccionItem, Yii::$app->request->post());
            
            $modelsSocialItem = Model::createMultiple(SocialItem::classname());
            Model::loadMultiple($modelsSocialItem, Yii::$app->request->post());

            // validate all models
            
            //$valid = $model->validate();
            //$valid = Model::validateMultiple($modelsAgendaItem) && $valid;
            
            
            //$valid = Model::validateMultiple($modelsAgendaItem) && Model::validateMultiple($modelsCorreoItem) && $valid;
            
            $valid = true;
            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $model->save(false)) {
                        foreach ($modelsAgendaItem as $modelAgendaItem) {
                            $modelAgendaItem->id_usuario = $model->id;
                            if (! ($flag = $modelAgendaItem->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                        
                         foreach ($modelsCorreoItem as $modelCorreoItem) {
                            $modelCorreoItem->id_usuario = $model->id;
                            if (! ($flag = $modelCorreoItem->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                        
                         foreach ($modelsDireccionItem as $modelDireccionItem) {
                            $modelDireccionItem->id_usuario = $model->id;
                            if (! ($flag = $modelDireccionItem->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                        
                         foreach ($modelsSocialItem as $modelSocialItem) {
                            $modelSocialItem->id_usuario = $model->id;
                            if (! ($flag = $modelSocialItem->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                    }
                    if ($flag) {
                        $transaction->commit();
                        return $this->redirect(['view', 'id' => $model->id]);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }                     
            
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'modelsAgendaItem'=>(empty($modelsAgendaItem)) ? [new AgendaItem()] : $modelsAgendaItem,
                'modelsCorreoItem'=>(empty($modelsCorreoItem)) ? [new CorreoItem()] : $modelsCorreoItem,
                'modelsDireccionItem'=>(empty($modelsDireccionItem)) ? [new DireccionItem()] : $modelsDireccionItem,
                'modelsSocialItem'=>(empty($modelsSocialItem)) ? [new SocialItem()] : $modelsSocialItem,
            ]);
        }
    }

    /**
     * Updates an existing Usuario model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Usuario model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Usuario model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Usuario the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Usuario::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
