<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitf4005a6d1d8a3914da40d527a3a029c1
{
    public static $prefixLengthsPsr4 = array (
        'R' => 
        array (
            'RRZE\\WP\\' => 8,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'RRZE\\WP\\' => 
        array (
            0 => __DIR__ . '/..' . '/rrze/wp/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitf4005a6d1d8a3914da40d527a3a029c1::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitf4005a6d1d8a3914da40d527a3a029c1::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitf4005a6d1d8a3914da40d527a3a029c1::$classMap;

        }, null, ClassLoader::class);
    }
}