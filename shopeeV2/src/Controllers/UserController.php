<?php
/**
 * Created by PhpStorm.
 * User: OS-ADMIN
 * Date: 1/9/2021
 * Time: 12:58 PM
 */
declare(strict_types=1);
namespace App\Controllers;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class UserController
{

    public function registerFunction(Request $request, Response $response, array $args)
    {
        $body = $request->getParsedBody();
        $email = $body['email'];
        $name = $request->getParam('name');

        return $response->withJson(compact('body', 'email', 'name', 'args'));
    }

    public function loginFunction(Request $request, Response $response, array $args)
    {
        $queryParams = $request->getParsedBody();
        $email = $queryParams['email'];
        $password = $queryParams['password'];

        $response->getBody()->write(json_encode($email));
        $response = $response->withHeader('Content-Type','application/json');
        return $response;
    }
}