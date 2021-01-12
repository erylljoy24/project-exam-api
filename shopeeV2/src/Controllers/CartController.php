<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\CartModel;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

/**
 * Created by PhpStorm.
 * User: OS-ADMIN
 * Date: 1/9/2021
 * Time: 1:08 PM
 */

class CartController
{
    protected $cart;
    public function __construct()
    {
        $this->cart = new CartModel();
    }

    public function addToCart(Request $request, Response $response, array $args)
    {
        $queryParams = $request->getParsedBody();
        $result = $this->cart->addToCart($queryParams);
        $response->getBody()->write(json_encode($result));
        $response = $response->withHeader('Content-Type','application/json');
        return $response;
    }

    public function getCartItems(Request $request, Response $response, array $args)
    {
        $user_id = $args['user_id'];
        $result = $this->cart->getCartItems($user_id);
        $response->getBody()->write(json_encode($result));
        $response = $response->withHeader('Content-Type','application/json');
        return $response;
    }

    public function updateCart(Request $request, Response $response, array $args)
    {
        $queryParams = $request->getParsedBody();
        $quantity = $queryParams['quantity'];
        $cart_id = $queryParams['cart_id'];
        $result = $this->cart->updateCart($quantity, $cart_id);
        $response->getBody()->write(json_encode($result));
        $response = $response->withHeader('Content-Type','application/json');
        return $response;
    }

    public function removeCart(Request $request, Response $response, array $args)
    {
        $queryParams = $request->getParsedBody();
        $cart_id = $queryParams['cart_id'];
        $result = $this->cart->removeCart($cart_id);
        $response->getBody()->write(json_encode($result));
        $response = $response->withHeader('Content-Type','application/json');
        return $response;
    }

}