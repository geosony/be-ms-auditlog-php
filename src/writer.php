<?php

declare(strict_types=1);
namespace AuditLog;

require '../config/config.php';
require ROOT. 'vendor/autoload.php';

use Aws\Exception\AwsException;
use Aws\Kinesis\KinesisClient; 

class Writer
{
    private $AWS_PROFILE = 'localstack';
    private $AWS_SDK_VERSION = '2013-12-02';
    private $AWS_REGION = 'us-east-1';

    private $kinesisClient;

    /**
     *  Create a new Kinesis writer instance
     */
    public function __construct()
    {
        $this->kinesisClient = new Aws\Kinesis\KinesisClient([
            'profile' => $this->AWS_PROFILE,
            'version' => $this->AWS_SDK_VERSION,
            'region' => $this->AWS_REGION,
        ]);
    }

    /**
     * Dummy write function to kinesis stream
     * 
     * @param: array $data data to the stream
     * @return boolean
     */
    public function write(array $data)
    {
        if (empty($data)) {
            throw new \Exception\InvalidArgumentException('Required data is empty!');
        }

        if (!is_array($data)) {
            throw new \Exception\UnexpectedValueException('Required data should be an array');
        }

        $encoded_data = json_encode($data);
        stop($encoded_data);
    }
}