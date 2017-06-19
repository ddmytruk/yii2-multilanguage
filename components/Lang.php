<?php
/**
 * Created by PhpStorm.
 * User: dmytrodmytruk
 * Date: 19.06.17
 * Time: 15:57
 */

namespace ddmytruk\multilanguage\components;

use ddmytruk\multilanguage\models\orm\Lang as ORMLang;
use Yii;

class Lang extends ORMLang {

    static $current = null;

    static function getCurrent()
    {
        if( self::$current === null ){
            self::$current = self::getDefaultLang();
        }
        return self::$current;
    }

    static function setCurrent($url = null)
    {
        $language = self::getLangByUrl($url);
        self::$current = ($language === null) ? self::getDefaultLang() : $language;
        Yii::$app->language = self::$current->local;
    }

    static function getDefaultLang()
    {
        return Lang::find()->where('`default` = :default', [':default' => 1])->one();
    }

    static function getLangByUrl($url = null)
    {
        if ($url === null) {
            return null;
        } else {
            $language = Lang::find()->where('url = :url', [':url' => $url])->one();
            if ( $language === null ) {
                return null;
            }else{
                return $language;
            }
        }
    }

}