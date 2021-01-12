<?php
/**
 * Created by PhpStorm.
 * User: OS-ADMIN
 * Date: 1/9/2021
 * Time: 12:58 PM
 */
declare(strict_types=1);
namespace App\Controllers;
use App\Models\UserModel;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class UserController
{
    protected $user;
    public function __construct()
    {
        $this->user = new UserModel();
    }

    public function registerFunction(Request $request, Response $response, array $args)
    {
        $body = $request->getParsedBody();

        $result = $this->user->addUser($body);
        $response->getBody()->write(json_encode($result));
        $response = $response->withHeader('Content-Type','application/json');
        return $response;
    }

    public function loginFunction(Request $request, Response $response, array $args)
    {
        $body = $request->getParsedBody();
        $email = $body['username'];
        $password = $body['password'];
        $result = $this->user->initLogin($email, $password);
        $response->getBody()->write(json_encode($result));
        $response = $response->withHeader('Content-Type','application/json');
        return $response;
    }
}