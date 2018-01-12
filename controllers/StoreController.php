<?php

namespace app\controllers;

use app\models\Store;
use app\models\StoreSearch;
use Yii;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * StoreController implements the CRUD actions for Store model.
 */
class StoreController extends Controller
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
     * Lists all Store models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new StoreSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * @return string
     */
    public function actionShowWorked()
    {
        $request = Yii::$app->request;
        $search = ArrayHelper::merge($request->queryParams, $request->bodyParams);

        $date = isset($search['date']) ? $search['date'] : null;
        if (!strtotime($date)) {
            $date = null;
        }

        $searchModel = new StoreSearch();
        $dataProvider = $searchModel->search($search);

        $params = [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'date' => $date,
        ];

        if ($request->isAjax) {
            return $this->renderPartial('filtered-list', $params);
        } else {
            $this->view->title = 'Работающие магазины';
            return $this->render('filtered-list', $params);
        }
    }

    /**
     * @return string
     * @throws NotFoundHttpException
     * @throws \yii\web\ConflictHttpException
     */
    public function actionSetSchedule()
    {
        $request = Yii::$app->request;
        $id = $request->post('store-id', 0);
        $name = $request->post('schedule-name', '');

        if ($request->isAjax) {
            $model = $this->findModel($id);
            $model->setDefaultSchedule($name);
            $model->refresh();
            return $this->renderPartial('schedule-table', ['store' => $model]);
        }
    }

    /**
     * Finds the Store model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Store the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Store::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }

    /**
     * Displays a single Store model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'store' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Store model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Store();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Store model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Store model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }
}
