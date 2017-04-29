<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\db\ActiveRecord;

$this->title = 'Rename yourself';
$this->params['breadcrumbs'][] = $this->title;

$user=\app\models\UserLogin::findOne(Yii::$app->user->id);
$name=$user->name;
$surname=$user->surname;
echo 'Hello,'." ".$name." ".$surname.'. You can change your name lower';

?>

<?php $form=ActiveForm::begin() ?>
<?= $form->field($model,'name'); ?>
<?= $form->field($model,'surname'); ?>
<?= HTML::submitButton('Accept',['class'=>'btn btn-success']); ?>
<?php $form=ActiveForm::end() ?>





</div>