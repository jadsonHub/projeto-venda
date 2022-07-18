<?php


namespace App\config\view;


class View
{

    public static function loadView($dados = [])
    {
     extract($dados);
     return  require __DIR__ . '/../../view/master.php';
    }
}
