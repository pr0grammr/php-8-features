<?php


/**
 * PHP 8 MATCH EXAMPLES
 * 
 * @see https://stitcher.io/blog/php-8-match-or-switch
 */


 /**
  * lets test match statement with http status code
  */
$statusCode = 200;
$content = match($statusCode) {
    200 => 'Response Content OK',
    404 => 'Resource not found'
};

var_dump($content);
# => string(19) "Response Content OK"

$statusCode = 404;
$content = match($statusCode) {
    200 => 'Response Content OK',
    404 => 'Resource not found'
};

var_dump($content);
# => string(18) "Resource not found"