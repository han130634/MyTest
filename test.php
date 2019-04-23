<?php
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Model\MyModel;
use utils\CustomHandler;


require 'vendor/autoload.php';
require 'middleware/MyMiddleware.php';

// Create and configure Slim app
$config = ['settings' => [
    'addContentLengthHeader' => false,
]];
$container = new \Slim\Container;
//create new application
$app = new \Slim\App($container);

//php runtime error;
$c = $app->getContainer();
$c['phpErrorHandler'] = function ($c) {
    return function ($request, $response, $error) use ($c) {
        return $response->withStatus(500)
            ->withHeader('Content-Type', 'text/html')
            ->write('Something went wrong!');
    };
};

//$c = $app->getContainer();
$c['errorHandler'] = function ($c) {
    return new CustomHandler();
};

//Override the default Not Found Handler after App
unset($app->getContainer()['notFoundHandler']);
$app->getContainer()['notFoundHandler'] = function ($c) {
    return function ($request, $response) use ($c) {
        $response = new \Slim\Http\Response(404);
        return $response->write("Page not found");
    };
};

//$container = $app->getContainer();
//$container['myService'] = function ($container) {
//    $myService = new MyService();
//    return $myService;
//};

$container = $app->getContainer();
$container['\Services\MyService'] = function ($c) {
//    $myModel = new Models\MyModel;
    return new Services\MyService();
};

$container['\Controllers\HomeController'] = function ($c) {
    $peopleService = $c->get('\Services\MyService');
    return new Controllers\HomeController($c, $peopleService);
};


$app->get('/test/{name}', '\Controllers\HomeController:getEveryone');

// hooks change to use middleware .

// function middleware function chain after the $app
//$app->add(function ($request, $response, $next) {
//    $response->getBody()->write('BEFORE');
//    $response = $next($request, $response);
//    $response->getBody()->write('AFTER');
//
//    return $response;
//});

// object middleware .
//$app->add(new MyMiddleware());



// Define app routes
$app->get('/hello/{name}', function (Request $request, Response $response, array $args) {
    $name = $args['name'];
    return $response->write("Hello, $name ");
});


// group middleware , this code can implements different date type string .
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

//$app->get('/foo', function ($req, $res, $args) {
//    if($this->has('myService')) {
//        $myService = $this->myService;
//    }
//
//    return $res;
//});

// Run app
$app->run();
