<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
//        'cache' => [
//            'class' => 'yii\caching\FileCache',
//        ],
        'i18n' => [
            'translations' => [
                'cms' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@common/messages'
                ],
                'web' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@common/messages'
                ],
            ]
        ]
    ],
    'sourceLanguage' => 'en-US',
    'language' => 'vi',
    'timeZone' => 'Asia/Ho_Chi_Minh',
];
