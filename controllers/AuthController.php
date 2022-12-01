<?php

namespace app\controllers;

use app\core\Controller;
use app\core\Request;

class AuthController extends Controller
{
    public function login(){
        $this->setLayout("Auth");
        $this->render("login");
    }
    public function register(Request $request){
        $this->setLayout("Auth");
        $this->render("register");
        if($request->is_Post()){
            echo "Handle Submitted data From Post";
        }

    }

}