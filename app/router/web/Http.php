<?php

namespace App\router\web;


class Http{

    public function __construct()
    {
        
    }
    
    public static function getRoutes(){

        /* para rotas que precise de parametros tipo id
        colocar ex: indice -> /admin/update/ E no valor -> AdminController@update
        dentro do AdminController criar um method que recebe um parametro,
         o router vai colocar o parametro la pra vc!
        */
        return [
            "GET" => [
                "/" => "HomeController@index",
                "/user/login" => "UserController@fmrLogin",
                "/user/detalhes/" => "UserController@txtParam",
                "/user/dashboard" => "UserController@index",
                "/user/criar" => "UserController@fmrCriar",
                "/user/sair" => "UserController@getSair",
                "/user/produtos" => "UserController@getProtudos",
                "/user/produto" => "UserController@jsonProdutos",
                "/user/atualizar-produto" =>"UserController@fmrAtualizarProduto",
                "/user/atualizar-produto/" => "UserController@atualizarProdutoGet",

                "/adm/dashboard" => "AdmController@index",
                "/adm/sair" => "AdmController@getSair",
                "/adm/criar" => "AdmController@fmrCriar",
                "/adm/produtos" => "AdmController@getProtudos",
                "/adm/produto" => "AdmController@jsonProdutos",
                "/adm/atualizar-produto" => "AdmController@fmrAtualizarProduto",
                "/adm/atualizar-produto/" => "AdmController@atualizarProdutoGet",
                "/adm/deletar-produto/" => "AdmController@deletarProduto",
                "/adm/relatorio-vendas" => "AdmController@relatorioVendas",
                "/adm/alerta-estoque" => "AdmController@alertaEstoque",
                "/adm/alertas-prod" => "AdmController@jsonAlertaEstoque"
            ],

            "POST" => [
                "/user/login" => "UserController@postLogin",
                "/user/criar" => "UserController@postCriar",
                "/user/atualizar-produto"=>"UserController@atualizarProdutoPost",
                "/user/refresh" => "UserController@jsonProdutosLike",

                "/adm/criar" => "AdmController@postCriar",
                "/adm/refresh" => "AdmController@jsonProdutosLike",
                "/adm/atualizar-produto" => "AdmController@atualizarProdutoPost",
                "/adm/alerta" => "AdmController@jsonProdutosLikeAlerta"
            ]
        ];
    }

}