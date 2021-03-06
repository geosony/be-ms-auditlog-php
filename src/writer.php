<?php

declare(strict_types=1);
namespace AuditLog;
define('ROOT_PATH', dirname(  __FILE__, 2));

require ROOT_PATH . '/vendor/autoload.php';

use Aws\Exception\AwsException;
use Aws\Kinesis\KinesisClient; 

class Writer
{
    private static $kinesisClient;

    /**
     *  Create a new Kinesis writer instance
     */
    public function __construct()
    {
        self::$kinesisClient = new KinesisClient([
            'profile' => 'localstack',
            'version' => '2013-12-02',
            'region' => 'us-east-1',
            'endpoint' => 'http://localhost:4566/',
        ]);

    }


    /**
     * Dummy write function to kinesis stream
     * 
     * @param: array $data data to the stream
     * @return boolean
     */
    public static function write(array $data)
    {
        if (empty($data)) {
            throw new \Exception\InvalidArgumentException('Required data is empty!');
        }

        if (!is_array($data)) {
            throw new \Exception\UnexpectedValueException('Required data should be an array');
        }

        $encoded_data = json_encode($data);
        
        try {
            $result = self::$kinesisClient->PutRecord([
                'Data' => $encoded_data,
                'StreamName' => "teststream",
                'PartitionKey' => "1"
            ]);
            //print("<p>ShardID = " . $result["ShardId"] . "</p>");
            self::assert($result);
        } catch (AwsException $e) {
            // output error message if fails
            echo $e->getMessage();
            echo "\n";
        }
    }    

    /**
     *  Method to assert
     *  
     *  @param array | string variable to assert
     *  @param int 1 is true hence 0 is false
     *  @return void
     */
    private static function assert($var, $e=1)
    {
        echo "<pre>";
        print_r($var);
        echo "</pre>";
        if ($e) exit;
    }
}