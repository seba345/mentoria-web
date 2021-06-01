<?php

namespace app\controllers;

use app\core\request;
use app\core\Controller;

class AuthController extends Controller
{
    public function login()
    {
        return $this->render('login');
    }

    public function register(request $request)
    {
        return $this->render('register');
    }
}