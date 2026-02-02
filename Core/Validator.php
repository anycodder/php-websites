<?php
namespace Core;
class Validator
{
    //pure function is a function that is no contingent or dependent upon state or values from outside world
    // bu yüzden stattic olabilir böyle metod direkt çağırabilir Validator::string şeklinde
    public static function string($value, $min=1 , $max = INF)
    {
        $value = trim($value);

        return strlen($value) >= $min && strlen($value) <= $max;
    }

    //mnatık anlamak için şuan kullanmıyoryz

     public static function email(string $value): bool
    {
        //Validator::email('jefreyy@@example.com')
        return filter_var($value, FILTER_VALIDATE_EMAIL);

    }

}




?>