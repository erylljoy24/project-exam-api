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

class MenuController
{
    protected $menu;
    public function __construct()
    {
        $this->menu = new MenuModel();
    }

    public function addItem(Request $request, Response $response, array $args)
    {
        $queryParams = $request->getParsedBody();
        $name = $queryParams['name'];
        $price = $queryParams['price'];
        $user_id = $queryParams['user_id'];
        $image = $queryParams['image'];

        $result = $this->menu->addMenu($name, $price, $user_id, $image);
        $response->getBody()->write(json_encode($result));
        $response = $response->withHeader('Content-Type','application/json');
        return $response;
    }

    public function deleteMenu(Request $request, Response $response, array $args)
    {
        $queryParams = $request->getParsedBody();
        $id = $queryParams['menu_id'];

        $result = $this->menu->deleteMenu($id);
        $response->getBody()->write(json_encode($result));
        $response = $response->withHeader('Content-Type','application/json');
        return $response;
    }

    public function updateMenu(Request $request, Response $response, array $args)
    {
        $queryParams = $request->getParsedBody();
        $id = $queryParams['menu_id'];

        $result = $this->menu->updateMenu($queryParams);
        $response->getBody()->write(json_encode($result));
        $response = $response->withHeader('Content-Type','application/json');
        return $response;
    }

    public function myItems(Request $request, Response $response, array $args)
    {
        $name = $args['user_id'];
        $result = $this->menu->getMyItems($name);
        $response->getBody()->write(json_encode($result));
        $response = $response->withHeader('Content-Type','application/json');
        return $response;
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