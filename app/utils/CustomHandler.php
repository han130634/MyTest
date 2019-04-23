<?php
/**
 * Created by PhpStorm.
 * User: xueersi
 * Date: 2019-04-23
 * Time: 20:08
 */
namespace utils;

class CustomHandler
{
    public function __invoke($request, $response, $exception) {
        return $response
            ->withStatus(500)
            ->withHeader('Content-Type', 'text/html')
            ->write('Something went wrong!');
    }
}