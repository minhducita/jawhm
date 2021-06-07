<?php
/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use backend\assets\BoostrapAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;
//BoostrapAsset::register($this);
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
        <script language="javascript" src="http://code.jquery.com/jquery-2.2.4.js"></script>
        <script language="javascript" src="http://code.jquery.com/jquery-2.0.0.min.js"></script>

    </head>
    <body>
        <?php $this->beginBody() ?>

        <div class="wrap">
            <?php
            NavBar::begin([
                'brandLabel' => 'Home',
                'brandUrl' => '/advanced/backend/interview/index',
                'options' => [
                    'class' => 'navbar-inverse navbar-static-top', //navbar-fixed-top
                ],
            ]);

            if (Yii::$app->user->isGuest) {
                $menuItems[] = ['label' => 'Login', 'url' => ['/admin/index']];
            } else {
                $menuItems[] = ['label' => '<i class="icon-custom-portlets"></i> <span class="title">Country</span>', 'url' => ['/countries/index'], 'template' => '<a href="{url}" class="href_class">{label}</a>'];
                $menuItems[] = [
                                'label' => 'QA',
                                'items' => [
                                    ['label' => 'Question', 'url' => ['/qa/question/index']],
                                    ['label' => 'Category', 'url' => ['/qa/category/index']],
                                    ['label' => 'Sort', 'url' => ['/qa/sort/index']]                                   
                                ]
                               ];
                $menuItems[] = ['label' => 'Visa', 'url' => ['/country/index']];
                $menuItems[] = ['label' => 'Office', 'url' => ['/office/index']];
                $menuItems[] = ['label' => 'Interview', 'url' => ['/interview/index']];
                $menuItems[] = ['label' => 'Api', 'url' => ['/api']];
                $menuItems[] = '<li>' .
                        Html::beginForm(['/admin/logout'], 'post')
                        . Html::submitButton(
                                'Logout (' . Yii::$app->user->identity->username . ')', ['class' => 'btn btn-link']
                        )
                        . Html::endForm();
                '</li>';
//        $menuItems = [
//            ['label' => 'All List', 'url' => ['/country/index']],
//            ['label' => 'All Api', 'url' => ['/api']],
//        ];
            }

            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => $menuItems,
                'encodeLabels' => false,
            ]);
            NavBar::end();
            ?>

            <div class="container">              
                
                <?=
                Breadcrumbs::widget([
                    'homeLink' => [
                        'label' => Yii::t('app', 'ワーキング・ホリデー（ワーホリ）協会 '),
                        'url' => '/advanced/backend/interview/index',
                    ],
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ])
                ?>
                
                <?= Alert::widget() ?>
                <?= $content ?>
            </div>
        </div>

        <footer class="footer">
            <div class="container">
                <p class="pull-left">&copy; JAWHM <?= date('Y') ?></p>

                <p class="pull-right"><?= Yii::powered() ?></p>
            </div>
        </footer>

        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
