<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInita5db7f453891d5c9a77fceec7846c3fd
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
            $loader->prefixLengthsPsr4 = ComposerStaticInita5db7f453891d5c9a77fceec7846c3fd::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInita5db7f453891d5c9a77fceec7846c3fd::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInita5db7f453891d5c9a77fceec7846c3fd::$classMap;

        }, null, ClassLoader::class);
    }
}
