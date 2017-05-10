<?php

namespace app\controllers;

use Yii;
use app\models\Login;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\BalanceForm;

class BalanceController extends Controller
{
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

    public function actionSendbalance()
    {
        $model = new BalanceForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->sendbal()) {
            }
            return $this->goHome();
        }

        return $this->render('sendbalance', [
            'model' => $model,

        ]);
    }

    public function actionBalance()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Login::find()->where(['id' => Yii::$app->user->getId()]),
        ]);

        $model = new BalanceForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->increase()) {
                return $this->redirect(\Yii::$app->urlManager->createUrl("balance/balance"));
            }
        }

        return $this->render('balance', [
            'dataProvider' => $dataProvider,
            'model' => $model,
        ]);
    }

    protected function findModel($id)
    {
        if (($model = Login::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
