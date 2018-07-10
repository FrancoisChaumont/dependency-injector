<?php

require __DIR__ . "/../vendor/autoload.php";

// simple elements
$int = 1;
$double = 1.2;
$bool = true;
$string = "Hello World!";

// array
$array = ['first' => 'one', 'second' => 'two'];

// object
$json = '{
    "forth": "four",
    "fifth": "five"
}';
$object = json_decode($json);

// instantiate a new object
$di = new \FC\DependencyInjector\Di();

// add all elements to the container (can use either 'set' or 'add')
$di->set('int', $int);
$di->add('double', $double);
$di->set('bool', $bool);
$di->add('string', $string);
$di->set('array', $array);
$di->add('object', $object);

// retrieve all elements from the container (can use either 'get' or 'retrieve')
$intDi = $di->get('int');
$doubleDi = $di->retrieve('double');
$boolDi = $di->get('bool');
$stringDi = $di->retrieve('string');
$arrayDi = $di->get('array');
$objectDi = $di->retrieve('object');

// print out all elements retrieved from the container
var_dump($intDi);
var_dump($doubleDi);
var_dump($boolDi);
var_dump($stringDi);
var_dump($arrayDi);
var_dump($objectDi);

// some random examples using array and object
echo "array 'second' = " . $di->get('array')['second'] . "\n";
echo "object 'forth' = " . $di->get('object')->forth . "\n";

// verify the existence in the container (can use either 'has' or 'contain')
echo "Contains 'int'\n";
var_dump($di->has('int'));
echo "Does NOT contain 'WRONG'";
var_dump($di->contain('WRONG'));
