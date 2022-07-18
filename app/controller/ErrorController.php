<?php

namespace App\controller;

use App\config\view\View;

class ErrorController
{

    public function errorGet()
    {

        http_response_code(404);
        return View::loadView([
            "view" => 'error/error',
            "title" => 'Ops...',
            "sub_title" => "Parece que deu ruim!, Pagina não encontrada :("
        ]);
    }
    public function errorPost()
    {
        http_response_code(404);
        echo json_encode("rota post invalida");
    }


    public function errorGetParam($param)
    {

        http_response_code(404);
        return View::loadView([
            "view" => 'error/error',
            "title" => 'Ops...',
            "sub_title" => $param
        ]);
    }

    public function errorGetDB()
    {

        http_response_code(500);
        return View::loadView([
            "view" => 'error/error',
            "title" => 'Ops...',
            "sub_title" => "Erros internos status 500 contate o ADM error DATABSE :("
        ]);
    }
}
