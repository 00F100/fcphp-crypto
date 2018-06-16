<?php

namespace FcPhp\Crypto
{
	use FcPhp\Crypto\Interfaces\ICrypto;

	class Crypto implements ICrypto
	{
		private $nonce;

		public function __construct(?string $nonce = null)
		{
			$this->nonce = !empty($nonce) ? base64_decode($nonce) : $this->generateNonce();
		}

		public function encode(string $key, $input)
		{
			$keyDecode = base64_decode($key);
			$keypair1_public = $this->getPublic($keyDecode);
			$keypair1_secret = $this->getSecret($keyDecode);
			return $this->_encode(serialize($input), $keypair1_public, $keypair1_secret);
		}

		public function decode(string $key, string $input)
		{
			$keyDecode = base64_decode($key);
			$keypair1_public = $this->getPublic($keyDecode);
			$keypair1_secret = $this->getSecret($keyDecode);
			return unserialize($this->_decode($input, $keypair1_public, $keypair1_secret));
		}

		public function generateKey()
		{
			return base64_encode(sodium_crypto_box_keypair());
		}

		public function generateNonce()
		{
			return random_bytes(SODIUM_CRYPTO_BOX_NONCEBYTES);
		}

		public static function getNonce()
		{
			return base64_encode(random_bytes(SODIUM_CRYPTO_BOX_NONCEBYTES));
		}

		private function _decode(string $input, string $keyPublic, string $keySecret)
		{
			$decryption_key = sodium_crypto_box_keypair_from_secretkey_and_publickey(base64_decode($keySecret), base64_decode($keyPublic));
			return sodium_crypto_box_open(base64_decode($input), $this->nonce, $decryption_key);
		}

		private function _encode(string $input, string $keyPublic, string $keySecret)
		{
			$encryption_key = sodium_crypto_box_keypair_from_secretkey_and_publickey(base64_decode($keySecret), base64_decode($keyPublic));
			return base64_encode(sodium_crypto_box($input, $this->nonce, $encryption_key));
		}

		private function getSecret(string $key)
		{
			return base64_encode(sodium_crypto_box_secretkey($key));
		}

		private function getPublic(string $key)
		{
			return base64_encode(sodium_crypto_box_publickey($key));
		}
	}
}