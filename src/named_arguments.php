<?php

/**
 * PHP 8 NAMED ARGUMENTS EXAMPLES
 * 
 * @see https://stitcher.io/blog/php-8-named-arguments
 */

/**
 * lets pretend we want to create an instance of an entity with named arguments
 * we use constructor promotion and named arguments in combination to instantiate an object
 */
class User
{
    public function __construct(
        public ?string $username = null,
        public ?string $email = null,
        public ?string $firstName = null,
        public ?string $lastName = null
    ) {}
}

// create our object with named arguments
$user = new User(
    username: 'pr0grammr',
    firstName: 'Fabian',
    lastName: 'Schilf',
    email: 'schilf.fabian@gmail.com',
);

/**
 * with this method, we dont have any getters and setters, because we dont need them here
 * but for data objects: do we really still need getters and setters?
 */
var_dump($user->username);
var_dump($user->firstName);
var_dump($user->lastName);
var_dump($user->email);

# => string(9) "pr0grammr"
# => string(6) "Fabian"
# => string(6) "Schilf"
# => string(23) "schilf.fabian@gmail.com"

/**
 * instantiate an object from array
 * pretend we have a request array
 */
$request = [
    'username' => 'fabianschilf',
    'firstName' => 'Fabian',
    'lastName' => 'Schilf',
    'email' => 'schilf.fabian@gmail.com'
];

$user = new User(...$request);

var_dump($user->username);
var_dump($user->firstName);
var_dump($user->lastName);
var_dump($user->email);

# => string(9) "pr0grammr"
# => string(6) "Fabian"
# => string(6) "Schilf"
# => string(23) "schilf.fabian@gmail.com"