<?php
/**
 * Created by PhpStorm.
 * User: dmytrodmytruk
 * Date: 19.06.17
 * Time: 16:12
 */

namespace ddmytruk\multilanguage\widgets;

use \yii\bootstrap\Widget;
use ddmytruk\multilanguage\components\Lang;

class WLang extends Widget
{
    public $viewPath = null;

    public function init(){}

    public function run() {

        $view = ($this->viewPath != null) ? $this->viewPath : 'lang/view';

        return $this->render($view, [
            'current' => Lang::getCurrent(),
            'langs' => Lang::find()->all(),
        ]);
    }
}