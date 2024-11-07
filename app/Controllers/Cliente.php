<?php

namespace App\Controllers;

class Cliente extends BaseController
{
    public function index(): string
    {
        return view('/cliente');
    }
}