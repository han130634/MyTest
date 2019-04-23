<?php

namespace Bookshelf;

use Slim\Router;
use RKA\ContentTypeRenderer\HalRenderer;

final class AuthorController
{
    private $router;

    public function __construct(Router $router)
    {
        $this->router = $router;
    }

    public function listAuthors($request, $response)
    {
        echo '<pre/>';
        var_dump([1 => 'Bob']);exit;
    }

    public function authors($request, $response)
    {
        echo '<pre/>';
        var_dump([1 => 'Bob111']);exit;
    }

}
