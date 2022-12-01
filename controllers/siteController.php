<?php

namespace app\controllers;


use app\core\Controller;
use app\core\Request;

class siteController extends Controller
{
    public function home(){
        $params = [
            "name"=>"mahmoud Jaafar",
            "id" => 120180521
        ];
         $this->render("home",$params);
    }
    public  function contact(){
        $this->render("contact");
    }
    public  function  handleContact(Request $request){
        $body = $request->getBody();
        var_dump($body);
        return "Handling Submitted Data";
    }

}