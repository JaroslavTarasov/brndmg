<?php

namespace app\controllers;

use Yii;
use app\models\Login;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\BalanceForm;

/**
 * LoginController implements the CRUD actions for Login model.
 */
class BalanceController extends Controller
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
     * Lists all Login models.
     * @return mixed
     */

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


        /*if ($model->load(Yii::$app->request->post())) {
            return $user = $model->increase();        }
        return $this->render('balance', [
            'model' => $model,
        ]);*/
    }

    /**
     * Finds the Login model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Login the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Login::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
