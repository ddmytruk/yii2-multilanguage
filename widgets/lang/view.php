<?php

/* @var $current \ddmytruk\multilanguage\components\Lang */
/* @var $langs[] \ddmytruk\multilanguage\components\Lang */

use yii\helpers\Html;
?>
<?= Yii::t('app', 'Language of the site')?>
<ul class="lang">
    <?php foreach ($langs as $lang):?>
        <li class="<?= $current->id == $lang->id ? 'current' : '' ?>">
            <?= Html::a(strtoupper($lang->url),
                '/'.$lang->url.Yii::$app->getRequest()->getLangUrl(),
                ['class' => 'undr']
            )?>
            <a class="undr" href="#"></a>
        </li>
    <?php endforeach;?>
</ul>