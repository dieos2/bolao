<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit8c2ea2358ae8425d70d0e45eda617b13
{
    public static $prefixLengthsPsr4 = array (
        'p' => 
        array (
            'phpseclib\\' => 10,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'phpseclib\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpseclib/phpseclib/phpseclib',
        ),
    );

    public static $classMap = array (
        'Jumbojett\\OpenIDConnectClient' => __DIR__ . '/..' . '/jumbojett/openid-connect-php/src/OpenIDConnectClient.php',
        'Jumbojett\\OpenIDConnectClientException' => __DIR__ . '/..' . '/jumbojett/openid-connect-php/src/OpenIDConnectClient.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit8c2ea2358ae8425d70d0e45eda617b13::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit8c2ea2358ae8425d70d0e45eda617b13::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit8c2ea2358ae8425d70d0e45eda617b13::$classMap;

        }, null, ClassLoader::class);
    }
}
