<?php

namespace App\controller;

use App\config\view\View;

class AdmController
{
    public function index()
    {
        if (verificarSession('adm') && !verificarSession('user')) {
            return View::loadView([
                "view" => 'adm/dashboard',
                "title" => 'Dashboard',
                "sub_title" => "dashboard Adm"
            ]);
        }
        return  redirecionar('/user/login');
    }

    public function getSair()
    {

        if (verificarSession('adm')) {
            excluirSession('adm');
            return redirecionar('/');
        }
    }

    public function fmrCriar()
    {
        if (verificarSession('adm')) {
            excluirSession('adm-at-prod');
            return View::loadView([
                "view" => 'adm/criar',
                "title" => 'Cadastrar produto',
                "sub_title" => "Criar produto"
            ]);
        }

        return redirecionar('/adm/dashboard');
    }

    public function getProtudos()
    {
        if (verificarSession('adm')) {
            excluirSession('adm-at-prod');
            return View::loadView([
                "view" => 'adm/produtos',
                "title" => 'Produtos',
                "sub_title" => "Produtos Cadastrados",
                "produtos" => ''
            ]);
        }
        return redirecionar('/user/login');
    }
    public function jsonProdutosLike()
    {

        if (verificarSession('adm')) {
            $busca = filter_input(INPUT_POST, 'buscaAdm');
            echo  json_encode(getJsonProdutos($busca), JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
        }
    }

    public function jsonProdutos()
    {

        if (verificarSession('adm')) {
            echo json_encode(produtosUser(), JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
        }
    }


    public function postCriar()
    {
        if (!verificarSession('user') && verificarSession('adm')) {
            $v =  validar('/adm/criar', 'criar', [
                "ad_prod_nome" => "required|validarProduto|unique:produto,nome_produto|mincaracter:3",
                "ad_prod_cod" => "required|unique:produto,codigo_produto|isNumber|mincaracter:4",
                "ad_prod_forne" => 'required|validarNome|mincaracter:5',
                "ad_prod_c_venda" => 'required|isNumber',
                "ad_prod_v_custo" => "required|isNumber",
                "ad_prod_qtd_est" => "required|isNumber"
            ]);
            if (!is_null($v)) {
                extract($v);
                return cadastrarProdutoADM($ad_prod_nome, $ad_prod_forne, $ad_prod_cod, ValorBanco($ad_prod_v_custo), ValorBanco($ad_prod_c_venda), $ad_prod_qtd_est);
            }
        }
    }

    public function atualizarProdutoGet($param)
    {
        if (verificarSession('adm')) {
            $busca = getProdutoById($param);
            if (!empty($busca)) {
                $_SESSION['adm-at-prod'] = $busca;
                return redirecionar('/adm/atualizar-produto');
            }
        } else {
            return redirecionar('/adm/produtos');
        }
    }

    public function fmrAtualizarProduto()
    {

        if (verificarSession('adm-at-prod')) {
            return View::loadView([
                "view" => 'adm/atualizar',
                "title" => 'Atualizar produto (adm)',
                "sub_title" => "Atualizar produto",
                "produtos" => dadosOnjSession('adm-at-prod')
            ]);
        } else {
            return redirecionar('/adm/produtos');
        }
    }

    public function deletarProduto($id)
    {
        if (verificarSession('adm')) {
            return deletarProdutoByIdADM($id);
        }
    }

    public function atualizarProdutoPost()
    {
        if (verificarSession('adm-at-prod')) {
            $v =  validar('/adm/atualizar-produto', 'ad', [
                "up_prod_nome" => "required|validarProduto|mincaracter:3",
                "up_prod_cod" => "required|isNumber|mincaracter:4",
                "up_prod_forne" => 'required|validarNome|mincaracter:5',
                "up_prod_c_venda" => 'required|isNumber',
                "up_prod_v_custo" => "required|isNumber",
                "up_prod_qtd_est" => "required|isNumber"
            ]);
            if (!is_null($v)) {
                extract($v);
                $id = dadosOnjSession('adm-at-prod')->id_produto;
                return atualiarProdutoByIdADM($id, $up_prod_nome, $up_prod_forne, $up_prod_cod, ValorBanco($up_prod_v_custo), ValorBanco($up_prod_c_venda), $up_prod_qtd_est);
            }
        }
    }

    public function relatorioVendas()
    {
        if (verificarSession('adm')) {
            return View::loadView([
                "view" => 'adm/vendas',
                "title" => 'Relatorio de Vendas',
                "sub_title" => "Relatorio de Vendas",
                "vendas" => exibirVendasADM(),
                "vendaDia" => vendaTopDiaADM(),
                "vendaMes"=> vendaTopMesADM(),
                "vendaTopDezDia" => vendaTopDezDiaADM(),
                "vendaTopDezMes" => vendaTopDezMesADM(),
                "vendaTotalPorID" => vendaTotalByIdADM(),
                "vendaTotID" => totalVendasIdADM()
            ]);
        }
    }

    public function alertaEstoque()
    {
        if (verificarSession('adm')) {
            return View::loadView([
                "view" => 'adm/alerta',
                "title" => 'Alerta de Estoque',
                "sub_title" => "Alertas de estoque de Vendas",
                "produtos" => ""
            ]);
        }
        return redirecionar('/adm/produtos');
    }
    public function  jsonAlertaEstoque()
    {
        if (verificarSession('adm')) {
            echo json_encode(alertaEstoqueAdm(), JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
        }
    }


    public function jsonProdutosLikeAlerta()
    {

        if (verificarSession('adm')) {
            $busca = filter_input(INPUT_POST, 'buscaAdmAlerta');
            echo  json_encode(produtosJsonAlerta($busca), JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
        }
    }
}
