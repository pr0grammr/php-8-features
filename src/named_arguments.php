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
class Entity
{
    /**
     * loop overy properties and assign values using reflection class
     * will assign all class properties
     * $args will be a key-value array with name of property as key
     */
    private function initialize(...$args)
    {
        $reflectionClass = new ReflectionClass($this);

        foreach ($args as $key => $value) {
            if (property_exists($this, $key)) {
                $property = $reflectionClass->getProperty($key);
                $property->setAccessible(true);
                $property->setValue($this, $value);
            }
        }
    }

    public function __construct(...$args)
    {
        $this->initialize(...$args);
    }
}


class User extends Entity 
{
    /**
     * @var string
     */
    private $username;

    /**
     * @var string
     */
    private $firstName;

    /**
     * @var string
     */
    private $lastName;

    /**
     * @var string
     */
    private $email;

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @param string
     */
    public function setUsername(string $username)
    {
        $this->username = $username;
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @param string
     */
    public function setFirstName(string $firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * @param string
     */
    public function setLastName(string $lastName)
    {
        $this->lastName = $lastName;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string
     */
    public function setEmail(string $email)
    {
        $this->email = $email;
    }
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
var_dump($user->getUsername());
var_dump($user->getFirstName());
var_dump($user->getLastName());
var_dump($user->getEmail());

# => string(9) "pr0grammr"
# => string(6) "Fabian"
# => string(6) "Schilf"
# => string(23) "schilf.fabian@gmail.com"

/**
 * instantiate an object from array
 * pretend we have a request array
 */
$request = [
    'username' => 'pr0grammr',
    'firstName' => 'Fabian',
    'lastName' => 'Schilf',
    'email' => 'schilf.fabian@gmail.com'
];

$user = new User(...$request);

var_dump($user->getUsername());
var_dump($user->getFirstName());
var_dump($user->getLastName());
var_dump($user->getEmail());

# => string(9) "pr0grammr"
# => string(6) "Fabian"
# => string(6) "Schilf"
# => string(23) "schilf.fabian@gmail.com"