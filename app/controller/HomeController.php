<?php

namespace App\controller;



use App\config\view\View;

class HomeController{

    public  function index(){

        return View::loadView([
            "view" => 'home/index',
            "title" => 'Home',
            "sub_title" => "Pagina de Home"
        ]);
    }

    

}