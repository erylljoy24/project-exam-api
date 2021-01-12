<?php
/**
 * Created by PhpStorm.
 * User: OS-ADMIN
 * Date: 1/11/2021
 * Time: 10:54 PM
 */

namespace App\Controllers;


use App\Models\TransactionHistory;

class TransactionController
{
    protected $menu;
    public function __construct()
    {
        $this->menu = new TransactionHistory();
    }

}