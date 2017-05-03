<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Sign up';
?>

<div class="site-signup">
    <h1>
        <?= Html::encode($this->title) ?>
    </h1>
    <div class="row">
        <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
        <div>
            <fieldset>
                <legend><?= Yii::t('app', 'User') ?></legend>
                <?= $form->field($model, 'username') ?>
                <?= $form->field($model, 'password')->passwordInput() ?>
            </fieldset>
            <div class="form-group">
                <?= Html::submitButton('Sign up', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
            </div>
            <?php ActiveForm::end(); ?>
        </div>

    </div>



