<?php
declare(strict_types=1);

use App\Application\Actions\User\ListUsersAction;
use App\Application\Actions\User\ViewUserAction;
use App\Controllers\MenuController;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\App;
use Slim\Interfaces\RouteCollectorProxyInterface as Group;

return function (App $app) {
    $app->options('/{routes:.*}', function (Request $request, Response $response) {
        // CORS Pre-Flight OPTIONS Request Handler
        return $response;
    });

    $app->get('/', function (Request $request, Response $response) {
        $response->getBody()->write('Hello world!');
        return $response;
    });

    $app->group('/users', function (Group $group) {
        $group->get('', ListUsersAction::class);
        $group->get('/{id}', ViewUserAction::class);
    });

    $app->get('/hello/{name}', function (Request $request, Response $response, array $args) {
        $name = $args['name'];
        $response->getBody()->write("Hello world!, $name");
        return $response;
    });

    $app->group('/user_auth', function (Group $group) {
        // TODO Users API
        $group->post('/register', UserController::class . ':registerFunction');
        $group->post('/login', UserController::class . ':loginFunction');

    });

    $app->group('/menu', function (Group $group) {
        // TODO Menu API
        $group->post('/save_menu', \App\Controllers\MenuController::class . ':registerFunction');
        $group->post('/delete_menu', MenuController::class . ':registerFunction');
        $group->get('/menu_list', MenuController::class . ':getItems');
    });


    $app->group('/cart', function (Group $group) {
        // TODO Cart API
        $group->get('/get_cart_item/{id}', CartController::class . ':registerFunction');
        $group->get('/delete/{id}/{cart_id}', CartController::class . ':registerFunction');
        $group->get('/order/{id}/{cart_id}', CartController::class . ':registerFunction');
    });
};
