<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return 
        view('/topMenu').
        view('/principal');
    }

    public function Menu(): string
    {
        return 
        view('/Menu');

    }

}
