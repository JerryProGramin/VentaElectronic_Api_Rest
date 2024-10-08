<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit4d34e3d4307c1c97a565a48b091ee0c9
{
    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Src\\' => 4,
        ),
        'R' => 
        array (
            'Router\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Src\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
        'Router\\' => 
        array (
            0 => __DIR__ . '/../..' . '/Router',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit4d34e3d4307c1c97a565a48b091ee0c9::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit4d34e3d4307c1c97a565a48b091ee0c9::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit4d34e3d4307c1c97a565a48b091ee0c9::$classMap;

        }, null, ClassLoader::class);
    }
}
