<?php

return [
    /** DOCUMENTATION ROUTES */

    'documentation' => 'site/documentation',
    'json-schema' => 'site/json-schema',

    /** API ROUTES FOR THE ADMIN PANEL */
    [
        'class' => 'yii\rest\UrlRule',
        'controller' => 'admin/auth',
        'extraPatterns' => [
            'POST login' => 'login',
        ]
    ],[
        'class' => 'yii\rest\UrlRule',
        'controller' => [
            'admin/course'
        ]
    ],
    /** API ROUTES FOR THE TO SITE  */
];