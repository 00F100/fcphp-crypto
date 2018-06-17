# FcPhp Crypto

Package to crypto contents using [Sodium PHP Cryptography Extensions](http://php.net/manual/en/intro.sodium.php)

## How to install

Composer:
```sh
$ composer require 00f100/fcphp-di
```

or add in composer.json
```json
{
	"require": {
		"00f100/fcphp-di": "*"
	}
}
```

## How to use

```php
<?php

use FcPhp\Crypto\Crypto;

// Configure crypto
$nonce = Crypto::getNonce();
$cryto = new Crypto($nonce);
$key = $cryto->generateKey();


// Example
$var = ['index' => 'value'];
$encode = $crypto->encode($key, $var);
$decode = $crypto->decode($key, $encode);

```