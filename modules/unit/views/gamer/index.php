<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\ArrayHelper;
use app\modules\unit\models\Gamer;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\unit\models\GamerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Gamers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gamer-index">

    <h1><?= Html::encode($this->title) ?></h1>
<?php // echo $this->render('_search', ['model' => $searchModel]);  ?>

    <p>
    <?= Html::a('Create Gamer', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php Pjax::begin(); ?>    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'name',
            [
                'format' => 'raw',
                'label' => 'Юниты',
                'value' => function($data) {
                    return $data->myunits;
                },
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
    ?>
<?php Pjax::end(); ?></div>
