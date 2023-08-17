<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitfb34f1ec5099a359616609e23135b41e
{
    public static $prefixLengthsPsr4 = array (
        'D' => 
        array (
            'Dev\\Academia\\' => 13,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Dev\\Academia\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitfb34f1ec5099a359616609e23135b41e::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitfb34f1ec5099a359616609e23135b41e::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitfb34f1ec5099a359616609e23135b41e::$classMap;

        }, null, ClassLoader::class);
    }
}
