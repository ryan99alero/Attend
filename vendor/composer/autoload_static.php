<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit19ef184bd648d006c787bfd502201694
{
    public static $prefixLengthsPsr4 = array (
        'R' => 
        array (
            'Randgraphics\\Attendance\\' => 24,
        ),
        'D' => 
        array (
            'DataTables\\' => 11,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Randgraphics\\Attendance\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
        'DataTables\\' => 
        array (
            0 => __DIR__ . '/..' . '/datatables.net/editor-php',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit19ef184bd648d006c787bfd502201694::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit19ef184bd648d006c787bfd502201694::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit19ef184bd648d006c787bfd502201694::$classMap;

        }, null, ClassLoader::class);
    }
}
