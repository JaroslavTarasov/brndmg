<?php

use yii\helpers\Html;
use yii\db\Query;
use app\models\Login;
use yii\grid\GridView;
use yii\bootstrap\ActiveForm;
use app\models\BalanceForm;

// TODO $users = Login::find()->all();
// TODO $items = \yii\helpers\ArrayHelper::getColumn($users, 'username');
// TODO $params = ['prompt' => 'Choose name'];
$this->title = 'Share';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="login-balance">

    <h1><?= Html::encode('Укажите имя пользователя в системе и сумму перевода') ?></h1>


    <div class="row">
        <?php $form = ActiveForm::begin(['id' => 'form-balance']); ?>

        <div>
            <fieldset>
                <?= $form->field($model, 'username')->textInput() ?>
                <!-- TODO <!-- $form->field($model, 'username')->dropDownList($items,$params) ?> -->
                <?= $form->field($model, 'balance')->textInput() ?>
            </fieldset>
            <div class="form-group">
                <?= Html::submitButton('Отправить!', ['class' => 'btn btn-primary', 'name' => 'inc-button']) ?>
            </div>
            <?php ActiveForm::end(); ?>
        </div>

    </div>


</div>