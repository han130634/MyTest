<?php
// DIC configuration
$c = $app->getContainer();

// Database
//$container['capsule'] = function ($c) {
//    $capsule = new Illuminate\Database\Capsule\Manager;
//    $capsule->addConnection($c['settings']['db']);
//    return $capsule;
//};

$c['errorHandler'] = function ($c) {
    return new utils\CustomHandler();
};
$c['phpErrorHandler'] = function ($c) {
    return function ($request, $response, $error) use ($c) {
        return $response->withStatus(500)
            ->withHeader('Content-Type', 'text/html')
            ->write('Something went wrong!');
    };
};

//Override the default Not Found Handler after App
unset($c['notFoundHandler']);
$c['notFoundHandler'] = function ($c) {
    return function ($request, $response) use ($c) {
        $response = new \Slim\Http\Response(404);
        return $response->write("Page not found");
    };
};
// controller
$c['Bookshelf\AuthorController'] = function ($c) {
    return new Bookshelf\AuthorController($c['router']);
};

