<?php

namespace App\controller;

use App\config\view\View;

class UserController
{


    public function index()
    {
        if (verificarSession('user')) {
            return View::loadView([
                "view" => 'user/dashboard',
                "title" => 'Dashboard',
                "sub_title" => "dashboard Usuário"
            ]);
        } else if (verificarSession('adm')) {
            return  redirecionar('/adm/dashboard');
        } else {
            return redirecionar('/user/login');
        }
    }

    public function txtParam($param)
    {
        return $param;
    }

    public function fmrLogin()
    {
        if (!verificarSession('user') && !verificarSession('adm')) {
            return View::loadView([
                "view" => 'user/login',
                "title" => 'Login',
                "sub_title" => "Login Usuário"
            ]);
        } else if (verificarSession('adm')) {
            return redirecionar('/adm/dashboard');
        }

        return redirecionar('/user/dashboard');
    }

    public function fmrCriar()
    {
        if (verificarSession('user')) {
            return View::loadView([
                "view" => 'user/criar',
                "title" => 'Cadastrar produto',
                "sub_title" => "Criar produto"
            ]);
        }

        return redirecionar('/user/dashboard');
    }

    public function postLogin()
    {
        if (!verificarSession('adm') && !verificarSession('user')) {
            $validacao =  validar('/user/login', 'login', [
                "email_usuario" => "required",
                "senha_usuario" => "required"
            ]);

            if (!is_null($validacao)) {
                return loginUser($validacao['email_usuario'], $validacao['senha_usuario']);
            }
        }
    }

    public function postCriar()
    {
        if (verificarSession('user') && !verificarSession('adm')) {
            $v =  validar('/user/criar', 'criar', [
                "prod_nome" => "required|validarProduto|unique:produto,nome_produto|mincaracter:3",
                "prod_cod" => "required|unique:produto,codigo_produto|isNumber|mincaracter:4",
                "prod_forne" => 'required|validarNome|mincaracter:5',
                "prod_c_venda" => 'required|isNumber',
                "prod_v_custo" => "required|isNumber",
                "prod_qtd_est" => "required|isNumber"
            ]);

            if (!is_null($v)) {
                extract($v);
                return cadastrarProdutoUSER($prod_nome, $prod_forne, $prod_cod, ValorBanco($prod_v_custo), ValorBanco($prod_c_venda), $prod_qtd_est);
            }
        }
    }

    public function getSair()
    {

        if (verificarSession('user')) {
            excluirSession('user');
            return redirecionar('/');
        }
        return redirecionar('/');
    }

    public function getProtudos()
    {
        if (verificarSession('user')) {
            return View::loadView([
                "view" => 'user/produtos',
                "title" => 'Produtos',
                "sub_title" => "Produtos Cadastrados",
                "produtos" => produtosUser()
            ]);
        }
        return redirecionar('/user/login');
    }

    public function jsonProdutosLike()
    {

        if (verificarSession('user')) {
            $busca = filter_input(INPUT_POST, 'buscaUser');
            echo  json_encode(getJsonProdutos($busca), JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
        }
    }
    public function jsonProdutos()
    {
        if (verificarSession('user')) {
            echo json_encode(produtosUser(), JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
        }
    }

    
    public function atualizarProdutoGet($param)
    {
        if (verificarSession('user')) {
            $busca = getProdutoById($param);
            if (!empty($busca)) {
                $_SESSION['user-at-prod'] = $busca;
                return redirecionar('/user/atualizar-produto');
            }
        } else {
            return redirecionar('/user/produtos');
        }
    }

    public function fmrAtualizarProduto()
    {
        if (verificarSession('user-at-prod')) {
            return View::loadView([
                "view" => 'user/atualizar',
                "title" => 'Atualizar produto',
                "sub_title" => "Atualizar produto",
                "produtos" => dadosOnjSession('user-at-prod')
            ]);
        } else {
            return redirecionar('/user/produtos');
        }
    }

    public function atualizarProdutoPost()
    {
        if (verificarSession('user-at-prod')) {
            $v =  validar('/user/atualizar-produto', 'us', [
                "us_up_prod_nome" => "required|validarProduto|mincaracter:3",
                "us_up_prod_cod" => "required|isNumber|mincaracter:4",
                "us_up_prod_forne" => 'required|validarNome|mincaracter:5',
                "us_up_prod_c_venda" => 'required|isNumber',
                "us_up_prod_v_custo" => "required|isNumber",
                "us_up_prod_qtd_est" => "required|isNumber"
            ]);
            if (!is_null($v)) {
                extract($v);
                $id = dadosOnjSession('user-at-prod')->id_produto;
                return atualiarProdutoByIdUSER($id, $us_up_prod_nome, $us_up_prod_forne, $us_up_prod_cod, ValorBanco($us_up_prod_v_custo), ValorBanco($us_up_prod_c_venda), $us_up_prod_qtd_est);
            }
        }
    }
}
