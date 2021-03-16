<?php

declare(strict_types=1);
namespace AuditLog;

require '../config/config.php';
require ROOT. 'vendor/autoload.php';

use Aws\Exception\AwsException;
use Aws\Kinesis\KinesisClient; 

class Writer
{
    private $kinesisClient;

    /**
     *  Create a new Kinesis writer instance
     */
    public function __construct()
    {
        $this->kinesisClient = new Aws\Kinesis\KinesisClient([
            'profile' => AWS_PROFILE,
            'version' => AWS_SDK_VERSION,
            'region' => AWS_REGION,
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