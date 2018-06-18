<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
\bedezign\yii2\audit\web\JSLoggingAsset::register($this);
/* @var $this yii\web\View */
/* @var $searchModel app\models\CiclosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Buscar Ciclos escolares');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ciclos-index">
        <style type="text/css">
body {  
    //background-image: url(../img/10.jpg);
}
</style>

    <h3><?= Html::encode($this->title) ?></h3>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Agregar nuevo ciclo escolar'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            

            //'id',
            'ciclo:ntext',
            'precio:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
