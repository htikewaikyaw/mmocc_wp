<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInit7c3d20aa4093c6e2e0ef44074d2eff47
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        spl_autoload_register(array('ComposerAutoloaderInit7c3d20aa4093c6e2e0ef44074d2eff47', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInit7c3d20aa4093c6e2e0ef44074d2eff47', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInit7c3d20aa4093c6e2e0ef44074d2eff47::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
