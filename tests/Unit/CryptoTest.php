<?php

use FcPhp\Crypto\Crypto;
use FcPhp\Crypto\Interfaces\ICrypto;
use PHPUnit\Framework\TestCase;

class CryptoTest extends TestCase
{
	private $instance;

	public function setUp()
	{
		$this->instance = new Crypto();
	}

	public function testInstance()
	{
		$this->assertTrue($this->instance instanceof ICrypto);
		$key = $this->instance->generateKey();
		$plain = ['array' => ['item' => 'content']];
		$encoded = $this->instance->encode($key, $plain);
		$decoded = $this->instance->decode($key, $encoded);
		$this->assertEquals($decoded, $plain);
	}

	public function testGetNonce()
	{
		$this->assertTrue(!empty(Crypto::getNonce()));
	}

	public function testGetKey()
	{
		$this->assertTrue(!empty(Crypto::getKey()));
	}
}