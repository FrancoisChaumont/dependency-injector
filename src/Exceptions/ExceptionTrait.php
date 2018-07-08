<?php

namespace FC\DependencyInjector\Exceptions;

trait ExceptionTrait
{
    public function __construct(string $message = '', int $code = null)
    {
        $codeTxt = '';

        if ($code !== null) {
            $codeTxt = "[$code] ";
        }

        echo $codeTxt . $message . "\n";
    }
}
