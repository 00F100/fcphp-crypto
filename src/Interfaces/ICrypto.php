<?php

namespace FcPhp\Crypto\Interfaces
{
    interface ICrypto
    {
        /**
         * Method to construct instance of Crypto
         *
         * @param string $nonce Nonce to crypt string
         * @return void
         */
        public function __construct(?string $nonce = null);

        /**
         * Method to encode string
         *
         * @param string $key Key to encode
         * @param mixed $input Input to crypt
         * @return string
         */
        public function encode(string $key, $input) :string;

        /**
         * Method to decode string
         *
         * @param string $key Key to decode
         * @param string $input String to decode
         * @return mixed
         */
        public function decode(string $key, string $input);

        /**
         * Method to generate new key
         *
         * @return string
         */
        public function generateKey() :string;

        /**
         * Method to generate new key
         *
         * @return string
         */
        public static function getKey() :string;

        /**
         * Method to generate new nonce
         *
         * @return string
         */

        public function generateNonce() :string;

        /**
         * Method to generate new nonce
         *
         * @return string
         */
        public static function getNonce() :string;
    }
}
