<?php
// Middleware

//$app->add($app->getContainer()->get('csrf'));

// object middleware .
$app->add(new middleware\MyMiddleware());

// function middleware function chain after the $app
//$app->add(function ($request, $response, $next) {
//    $response->getBody()->write('BEFORE');
//    $response = $next($request, $response);
//    $response->getBody()->write('AFTER');
//
//    return $response;
//});


