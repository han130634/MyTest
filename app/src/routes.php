<?php
// Route configuration

$app->get('/', 'Bookshelf\AuthorController:listAuthors')->setName('list-authors');

// group this code can implements different date type string .
$app->group('/utils', function () use ($app) {
    $app->get('/date', function ($request, $response) {
        $foo = $request->getAttribute('foo');
        return $response->getBody()->write(date('Y-m-d H:i:s').$foo);
    });
    $app->get('/time', function ($request, $response) {
        return $response->getBody()->write(time());
    });
})->add(function ($request, $response, $next) {
    // passing variables from middleware .
    $request = $request->withAttribute('foo', 'bar');

    $response->getBody()->write('It is now ');
    $response = $next($request, $response);
    $response->getBody()->write('. Enjoy!');

    return $response;
});

// Routes that need a valid user token
$app->group('/v1', function () use ($app) {
    // Authors
    $app->get('/authors', 'Bookshelf\AuthorController:authors')->setName('authors');

})->add(middleware\MyMiddleware::class);