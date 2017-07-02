<?php
/**
 * Created by PhpStorm.
 * User: dmytrodmytruk
 * Date: 19.06.17
 * Time: 16:07
 */

namespace ddmytruk\multilanguage\components;

use yii\web\UrlManager;

class LangUrlManager extends UrlManager
{
    public function createUrl($params)
    {
        if( isset($params['lang_id']) ){
            $lang = Lang::findOne($params['lang_id']);
            if( $lang === null ){
                $lang = Lang::getDefaultLang();
            }
            unset($params['lang_id']);
        } else {
            $lang = Lang::getCurrent();
        }
        $url = parent::createUrl($params);
        if( $url == '/' ){
            return '/'.$lang->url;
        }else{
            return '/'.$lang->url.$url;
        }
    }
}