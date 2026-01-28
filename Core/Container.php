<?php

namespace Core;
use Exception;

class Container
{
    protected $bindings = [];

    public  function bind($key, $resolver)
    {
        $this->bindings[$key] = $resolver;
    }
//bind  → kutuya bir şey koy
//db diye bir şey var, lazım olunca bunu üret
//    $this → obje demek
//    static → obje yok, class üzerinden çağrılır sttaatic oluştumyınca new ile obje üretmek lazım static olunca :: ile direk kullanabiliyordun !!

    public  function resolve($key)
    {
        if (!array_key_exists($key, $this->bindings)) {
            throw new Exception("No matching binding found for {$key}");
        }
        $resolver = $this->bindings[$key];

        return call_user_func($resolver);
    }
//resolve → kutudan o şeyi al
//db’yi bana ver
}

?>