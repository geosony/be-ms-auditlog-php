<?php

define('ROOT', __DIR__.'../');

define('AWS_PROFILE', 'localstack');
define('AWS_SDK_VERSION', '2013-12-02');
define('AWS_REGION', 'us-east-1');


/*======================= Simple Assertion Helper ================================*/

function stop($var, $e=1) {
    echo "<pre>";
    print_r($var);
    echo "</pre>";
    if ($e) exit;
}