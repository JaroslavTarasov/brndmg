<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Hi';
$this->params['breadcrumbs'][] = $this->title;
$connection = Yii::$app->db;
if ($connection)
    echo "Есть подключение к БД";
else
    echo "Нет подключения к БД";
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        This is the About page. You may modify the following file to customize its content:
    </p>

    <code><?= __FILE__ ?></code>
</div>
