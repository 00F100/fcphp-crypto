<?php

namespace FcPhp\Crypto\Interfaces
{
	interface ICrypto
	{
		public function __construct(?string $nonce = null);

		public function encode(string $key, $input) :string;

		public function decode(string $key, string $input);

		public function generateKey() :string;

		public function generateNonce() :string;

		public static function getNonce() :string;
	}
}