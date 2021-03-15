<?php

$path = __DIR__ . "/";

require $path. 'vendor/autoload.php';

use Aws\Kinesis\KinesisClient; 
use Aws\Exception\AwsException;

$kinesisClient = new Aws\Kinesis\KinesisClient([
    'profile' => 'localstack',
    'version' => '2013-12-02',
    'region' => 'us-east-1'
]);


function stop($var, $e=1) {
    echo "<pre>";
    print_r($var);
    echo "</pre>";
    if ($e) exit;
}

$WriteToKinesisStream = function ($data) use ($kinesisClient) {
    $encoded_data = json_encode($data);
    stop($encoded_data);
};