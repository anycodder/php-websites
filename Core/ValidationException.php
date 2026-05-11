<?php

namespace Core;

class ValidationException extends \Exception   //inherits class expection hazır class paretns validetion expection child class
{
    public readonly array $errors; //readonly we assign to it once and then you can never update this
    public readonly array $old;
    public static function throw($errors , $old)
    {
        $instance = new static('The form failed to validate.');
        $instance->errors = $errors;
        $instance->old = $old;


        throw $instance;
    }
}