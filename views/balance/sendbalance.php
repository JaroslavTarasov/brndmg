<?php

use yii\helpers\Html;
use yii\db\Query;
use app\models\Login;
use yii\grid\GridView;
use yii\bootstrap\ActiveForm;
use app\models\BalanceForm;

$this->title = 'Share';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="login-balance">

    <h1><?= Html::encode('Sent your balance to') ?></h1>


    <div class="row">
        <?php $form = ActiveForm::begin(['id' => 'form-balance']); ?>
        <div>
            <fieldset>
                <?= $form->field($model, 'username')->textInput() ?>
                <?= $form->field($model, 'balance')->textInput() ?>
            </fieldset>
            <div class="form-group">
                <?= Html::submitButton('Sent balance', ['class' => 'btn btn-primary', 'name' => 'inc-button']) ?>
            </div>
            <?php ActiveForm::end(); ?>
        </div>

    </div>

</div>