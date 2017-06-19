# Установка Yii2-multilanguage

## Расширения

### 1. composer.json

```bash
"ddmytruk/yii2-multilanguage": "@dev"
```

### 2. База даных

```bash
$ php yii migrate/up --migrationPath=@vendor/ddmytruk/yii2-multilanguage/migrations
```

### 3. Подключение расширения

Добавить `LangUrlManager` в `urlManager`
```

'urlManager' => [
    'enablePrettyUrl' => true,
    'showScriptName' => false,
    'class'=>'frontend\components\LangUrlManager',
    'rules'=>[
        '/' => 'site/index',
        '<controller:\w+>/<action:\w+>/*'=>'<controller>/<action>',
    ]
],
```

Добавить `LangRequest` в `request`

```
'request' => [
       'class' => 'frontend\components\LangRequest'
   ],
```
Переводы
```
'i18n' => [
    'translations' => [
        '*' => [
            'class' => 'yii\i18n\PhpMessageSource',
            'fileMap' => [
                //'main' => 'main.php',
            ],
        ],
    ],
],
```
Язык по умолчанию
```
'language'=>'ru-RU',
```


## Виджет изменения языка

```
use frontend\widgets\WLang;
 
<?= WLang::widget();?> # view по умолчанию
 
<?= WLang::widget(['viewPath' => '@app\views\...']);?> # путь на вашу view
```