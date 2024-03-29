<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitc116093b2ffa589c9b043c71ac31602b
{
    public static $prefixLengthsPsr4 = array (
        'L' => 
        array (
            'League\\Plates\\' => 14,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'League\\Plates\\' => 
        array (
            0 => __DIR__ . '/..' . '/league/plates/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitc116093b2ffa589c9b043c71ac31602b::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitc116093b2ffa589c9b043c71ac31602b::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitc116093b2ffa589c9b043c71ac31602b::$classMap;

        }, null, ClassLoader::class);
    }
}
