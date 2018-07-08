<?php 

namespace FC\DependencyInjector\Exceptions;

class DependencyInjectorException extends \Exception
{
    use ExceptionTrait;
    
    public function __construct(string $message, int $code = null)
    {
        parent::__construct($message, $code);
    }

    public static function NotFound(string $name, int $code = null)
    {
        return new self($name." dependency not found!", $code);
    }

    public static function Duplicated(string $name, int $code = null)
    {
        return new self($name." dependency already exists!", $code);
    }
}

