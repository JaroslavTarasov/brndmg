<?php

use yii\helpers\Html;
use yii\db\Query;
use app\models\Login;
use yii\grid\GridView;
use yii\bootstrap\ActiveForm;
use app\models\BalanceForm;

$this->title = 'Balance';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="login-balance">

    <h1><?= Html::encode('Your balance is') ?></h1>

    <?php
    //$balance = (new Query())->select('balance')->where(['id' => Yii::$app->user->getId()]);
    //$balance = new Login::find()->where(['id'=>Yii::$app->user->getId()]);
    //echo $balance->createCommand()->getRawSql();
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'balance',
        ],
    ]); ?>

    <?php
    //$user = Login::find();
    //$user->$balance=
    ?>
    <div class="row">
        <?php $form = ActiveForm::begin(['id' => 'form-balance']); ?>
        <div>
            <fieldset>
                <legend><?= Yii::t('app', 'Balance') ?></legend>
                <?= $form->field($model, 'balance') ?>
            </fieldset>
            <div class="form-group">
                <?= Html::submitButton('Increase balance', ['class' => 'btn btn-primary', 'name' => 'inc-button']) ?>
            </div>
            <?php ActiveForm::end(); ?>
        </div>

    </div>

</div>