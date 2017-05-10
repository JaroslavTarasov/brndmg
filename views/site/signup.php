<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Sign up';
?>


<div class="site-signup">
    <h1>
        <?= Html::encode($this->title) ?>
    </h1>

    <p>Please fill out the following fields to sign up:</p>

    <br>

    <div class="row">
        <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
        <div>
            <fieldset>

                <?= $form->field($model, 'username') ?>
                <?= $form->field($model, 'mail') ?>
                <?= $form->field($model, 'password')->passwordInput() ?>
            </fieldset>
            <div class="form-group">
                <?= Html::submitButton('Sign Up', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
            </div>
            <?php ActiveForm::end(); ?>
        </div>

    </div>



