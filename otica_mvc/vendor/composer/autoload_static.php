<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit51b5f72afff0f52fe4fc6d9df729c13e
{
    public static $prefixLengthsPsr4 = array (
        'M' => 
        array (
            'MF\\' => 3,
        ),
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'MF\\' => 
        array (
            0 => __DIR__ . '/..' . '/MF',
        ),
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/App',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit51b5f72afff0f52fe4fc6d9df729c13e::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit51b5f72afff0f52fe4fc6d9df729c13e::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}