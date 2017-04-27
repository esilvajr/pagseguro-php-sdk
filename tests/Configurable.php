<?php

namespace Tests;

trait Configurable
{
    private static $email = "edison.junior@s2it.com.br";
    private static $tokenSandbox = "256422BF9E66458CA3FE41189AD1C94A";
    private static $apiIdSandbox = "your_sandbox_application_id";
    private static $apiKeySandbox = "your_sandbox_application_key";

    /**
     * @beforeClass
     */
    public static function setUpLibrary()
    {
        \PagSeguro\Library::initialize();
    }

    /**
     * @beforeClass
     */
    public static function setUpCredentials()
    {
        \PagSeguro\Configuration\Configure::setAccountCredentials(self::$email, self::$tokenSandbox);
    }

    /**
     * @beforeClass
     */
    public static function setUpEnvironment()
    {
        \PagSeguro\Configuration\Configure::setEnvironment('sandbox');
    }
}