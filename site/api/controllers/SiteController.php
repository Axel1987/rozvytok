<?php

namespace app\controllers;

use app\modules\admin\actions\auth\ErrorAction;
use Yii;
use yii\helpers\Url;
use yii\web\Controller;

class SiteController extends Controller
{
    /**
     * @SWG\Swagger(
     *     basePath="/",
     *     produces={"application/json"},
     *     consumes={"application/json"},
     *     @SWG\Info(version="1.0", title="ROZVYTOK API"),
     * )
     */

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'documentation' => [
                'class' => 'yii2mod\swagger\SwaggerUIRenderer',
                'restUrl' => Url::to(['site/json-schema']),
            ],
            'json-schema' => [
                'class' => 'yii2mod\swagger\OpenAPIRenderer',
                'cache' => null,
                // Тhe list of directories that contains the swagger annotations.
                'scanDir' => [
                    Yii::getAlias('@app/controllers'),
                    Yii::getAlias('@app/models'),
                    Yii::getAlias('@app/modules/admin/actions'),
                ],
            ],
            'error' => [
                'class' => ErrorAction::class,
            ]
        ];
    }
}
