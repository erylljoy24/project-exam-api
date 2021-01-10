<?php
/**
 * Created by PhpStorm.
 * User: OS-ADMIN
 * Date: 1/9/2021
 * Time: 1:06 PM
 */
declare(strict_types=1);

namespace App\Controllers;

use App\Models\MenuModel;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
//use Slim\Http\Request;
//use Slim\Http\Response;

class MenuController
{
    protected $menu;
    public function __construct()
    {
        $this->menu = new MenuModel();
    }

    public function getItems(Request $request, Response $response, array $args)
    {
//        return $this->respondWithData($this->menu->getItems());
//        $response->getBody()->('Hello world!');
//        return json_encode($this->menu->getItems());
        $result = $this->menu->getItems();
        $response->getBody()->write(json_encode($result));
        $response = $response->withHeader('Content-Type','application/json');
        return $response;
    }

}