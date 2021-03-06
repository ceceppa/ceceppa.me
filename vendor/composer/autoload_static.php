<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit4dd54a489171656a959d0fb661548088
{
    public static $files = array (
        '681b13ea73067a986466fe88f2f85eef' => __DIR__ . '/..' . '/ceceppa/meno/meno.php',
    );

    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PostTypes\\' => 10,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PostTypes\\' => 
        array (
            0 => __DIR__ . '/..' . '/jjgrainger/posttypes/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit4dd54a489171656a959d0fb661548088::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit4dd54a489171656a959d0fb661548088::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
