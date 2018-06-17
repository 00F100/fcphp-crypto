# FcPhp Crypto

Package to crypto contents using [Sodium PHP Cryptography Extensions](http://php.net/manual/en/intro.sodium.php)

[![Build Status](https://travis-ci.org/00F100/fcphp-crypto.svg?branch=master)](https://travis-ci.org/00F100/fcphp-crypto) [![codecov](https://codecov.io/gh/00F100/fcphp-crypto/branch/master/graph/badge.svg)](https://codecov.io/gh/00F100/fcphp-crypto) [![Total Downloads](https://poser.pugx.org/00F100/fcphp-crypto/downloads)](https://packagist.org/packages/00F100/fcphp-crypto)

## How to install

Composer:
```sh
$ composer require 00f100/fcphp-crypto
```

or add in composer.json
```json
{
	"require": {
		"00f100/fcphp-crypto": "*"
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