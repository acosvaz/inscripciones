<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'ICATCAM',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => 'Home', 'url' => ['/site/index']],
            [
            'label' => 'Agregar Registro',
            'items' => [
                 ['label' => 'Ciclos Escolares', 'url' => '/ciclos'],'<li class="divider"></li>',
                 //'<li class="dropdown-header">Dropdown Header</li>',
                 ['label' => 'Talleres', 'url' => '/talleres'],'<li class="divider"></li>',
                 ['label' => 'Horarios', 'url' => '/horarios'],'<li class="divider"></li>',
                 ['label' => 'Maestros', 'url' => '/docentes'],'<li class="divider"></li>',
                 ['label' => 'Grupos', 'url' => '/grupos'],
                        ],
            ],
            [
            'label' => 'Vincular Registros',
            'items' => [
                 ['label' => 'Alumnos', 'url' => '/alumnos'],'<li class="divider"></li>',
                 ['label' => 'Añadir docente al taller', 'url' => '/docentetaller'],'<li class="divider"></li>',
                 ['label' => 'Añadir a Grupo', 'url' => '/members'],
            ],            ],
            //['label' => 'About', 'url' => ['/site/about']],
            //['label' => 'Contact', 'url' => ['/site/contact']],
            Yii::$app->user->isGuest ? (
                ['label' => 'Login', 'url' => ['/site/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
            )
        ],
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
   
    
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left"><font color="brown"><?= date(' d/m/Y') ?></p>

        <p class="pull-right"> Av. Miguel Alemán Lt. 15 No. 16 </br>
Fundadores de Ah-Kim-Pech C.P. 24010</br>
Tel. (01-981) 81 6 15 10 y 81 1 49 60     </p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
