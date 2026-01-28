<?php

namespace Core;

class App
{
    protected static $container;

    public static function setContainer($container)
    {
        static::$container = $container; //initiliaze it
    }

    public static function container() //şu anki container’ı ver
    {
        return static::$container;
    }

    public static function bind($key, $resolver)
    {
        static::container()->bind($key, $resolver);
    }

    public static function resolve($key)
    {
        return static::container()->resolve($key);
    }


//Mini benzetme
//
//setContainer → anahtarı koy
//
//container() → anahtarı al
//
//bind / resolve → kapıyı aç
}