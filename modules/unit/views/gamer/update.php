<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\unit\models\Gamer */

$this->title = 'Update Gamer: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Gamers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="gamer-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
