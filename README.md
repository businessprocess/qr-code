QR-code PHP SDK
=============================
![PHP 8.x](https://img.shields.io/badge/PHP-%5E8.0-blue)
[![Laravel 8.x](https://img.shields.io/badge/Laravel-8.x-orange.svg)](http://laravel.com)
[![Yii 2.x](https://img.shields.io/badge/Yii-2.x-orange)](https://www.yiiframework.com/doc/guide/2.0/ru)
[![Latest Stable Version](https://poser.pugx.org/businessprocess/geo-service-sdk/v/stable)](https://packagist.org/packages/businessprocess/geo-service-sdk)
![Release date](https://img.shields.io/github/release-date/businessprocess/qr-code)
![Release Version](https://img.shields.io/github/v/release/businessprocess/qr-code)
![Total Downloads](https://poser.pugx.org/businessprocess/geo-service-sdk/downloads)
![Pull requests](https://img.shields.io/bitbucket/pr/businessprocess/qr-code)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE)
![Stars](https://img.shields.io/github/stars/businessprocess/qr-code?style=social)

Qr-code Service is a PSR-compatible PHP package for working with Qr-code service api.

[API Documentation](https://qr.vipsite.biz/api-docs/#/)


## Installation
The recommended way to install Qr-code service is through
[Composer](http://getcomposer.org).

```bash
# Install Composer
curl -sS https://getcomposer.org/installer | php
```

Next, run the Composer command to install the latest stable version of Guzzle:

```bash
composer require businessprocess/qr-code
```

After installing, you need to require Composer's autoloader:

```php
require 'vendor/autoload.php';
```

You can then later update Guzzle using composer:

 ```bash
composer update
 ```

## Usage Laravel

```php
$qrcode = \QrCode\Facade\QrCode::width(300)->generate('We from Ukraine');

echo $qrcode
```

#### Available Methods

| Methods                 | Description                   | Return value | 
|-------------------------|-------------------------------|--------------|
| generate                | Generate qr-code              | string       |
| rendererDeflateLevel    | Set renderer deflate level    | static       |
| rendererDeflateStrategy | Set renderer deflate strategy | static       |
| type                    | Set type                      | static       |
| margin                  | Set margin                    | static       |
| scale                   | Set scale                     | static       |
| width                   | Set width                     | static       |
| colorDark               | Set colorDark                 | static       |
| colorLight              | Set colorLight                | static       |
| version                 | Set version                   | static       |
