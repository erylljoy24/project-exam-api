<?php
/**
 * Created by PhpStorm.
 * User: OS-ADMIN
 * Date: 1/9/2021
 * Time: 12:58 PM
 */


use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class UserController
{

    public function registerFunction(Request $request, Response $response, array $args)
    {
        $body = $request->getParams();
        $email = $request->getParam('email');
        $name = $request->getParam('name');

        return $response->withJson(compact('body', 'email', 'name', 'args'));
    }

    public function loginFunction(Request $request, Response $response, array $args)
    {
        $body = $request->getParams();
        $email = $request->getParam('email');
        $name = $request->getParam('name');

        return $response->withJson(compact('body', 'email', 'name', 'args'));
    }
}