# be-ms-auditlog-php

An SDK library for PHP to write auditlog data to a Kinesis stream.

## Install

Via composer

``` bash
{
    "require": {
        "be-ms-auditlog-php": "dev-master"
    },
    "repositories": [
        {
            "type": "vcs",
            "url":  "git@github.com:geosony/be-ms-auditlog-php.git"
        }
    ]
}
```

## Usage

``` bash
$kinesisWriter = new \AuditLog\Writer();
$kinesisWriter->write($data);
```

## Credits

- Sony George <geosony@gmail.com>

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.