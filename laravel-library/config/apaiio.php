<?php
// amazon productInfo API用
return [
    'AWS_API_KEY' => env('AWS_API_KEY', 'デフォルトのAPIキー'),
    'AWS_API_SECRET_KEY' => env('AWS_API_SECRET_KEY', 'デフォルトのシークレットキー'),
    'AWS_ASSOCIATE_TAG' => env('AWS_ASSOCIATE_TAG', 'デフォルトのアソシエイトタグ'),
    'ENDPOINT' => env('AWS_ENDPOINT', 'co.jp'),
    'REQUEST' => env('AWS_REQUEST', '\ApaiIO\Request\Rest\Request'),
    'RESPONSE' => env('AWS_RESPONSE', '\ApaiIO\ResponseTransformer\XmlToSimpleXmlObject')
];