<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class UserController extends BaseController
{
    public function main()
    {
        $main = new UserModel;
        $data = [
            'items' => $main->findAll()
        ];
        return view('main', $data);
    }
    public function about()
    {
        return view('about');
    }
    public function contact()
    {
        return view('contact');
    }
    public function new()
    {
        return view('new');
    }
    public function product()
    {
        $main = new UserModel;
        $data = [
            'items' => $main->findAll()
        ];
        return view('product', $data);
    }
    public function cart()
    {
        return view('cart');
    }
}
