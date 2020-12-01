<?php

/**
 * PHP 8 ATTRIBUTES EXAMPLES
 * 
 * @see https://stitcher.io/blog/attributes-in-php-8
 */

class Route
{
    // example of a Route class with GET as default request method
    public function __construct(public string $path, public ?string $method = 'GET') {}
}

/**
 * lets pretend creating a controller to test annotation features
 * will be helpful for generic controllers to get properties like: entity class or route name
 */
#[Route('/users')]
class UserController
{
    /**
     * dummy method 
     */
    public function getUsers()
    {
        return [];
    }
}

$reflectionClass = new ReflectionClass(UserController::class);
$attributes = $reflectionClass->getAttributes(Route::class);

// lets parse all class attributes
$parsedAttributes = [];
foreach($attributes as $attribute) {
    $className = $attribute->getName();
    if (class_exists($className)) {
        // $className will be the fully qualified class name
        $parsedAttributes = new $className(...$attribute->getArguments());
    }
}

var_dump($parsedAttributes);
# => object(App\Route)#3 (2) {
#    ["path"]=>
#    string(6) "/users"
#    ["method"]=>
#    string(3) "GET"
#  }