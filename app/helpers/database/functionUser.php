<?php

use App\database\DataBase;


function login($email, $senha)
{
    $senhaMd5 = md5($senha);
    $conn = DataBase::connect();
    $sql = $conn->prepare("call login('{$email}','{$senhaMd5}');");
    $sql->execute();
    return $sql->fetch();
}

function produtos()
{
    $conn = DataBase::connect();
    $sql = $conn->prepare("call exibirProdutos();");
    $sql->execute();
    return $sql->fetchAll();
}

function produtosJson($busca)
{
    $conn = DataBase::connect();
    $sql = $conn->prepare("select * from produto where nome_produto LIKE :produto  or codigo_produto LIKE :produto limit 3;");
    $sql->bindValue(':produto', "%$busca%");
    $sql->execute();
    return $sql->fetchAll();
}

function produtosJsonAlerta($busca)
{
    $conn = DataBase::connect();
    $sql = $conn->prepare("select * from produto where  (qtd_estoque < 10) and nome_produto LIKE :produto  or codigo_produto LIKE :produto  limit 1;");
    $sql->bindValue(':produto', "%$busca%");
    $sql->execute();
    return $sql->fetchAll();
}

function uniqueAll($tabela, $coluna, $valor)
{
    $conn = DataBase::connect();
    $sql = $conn->prepare("select {$coluna} from {$tabela} where {$coluna} = :valor ;");
    $sql->bindValue(':valor', $valor);
    $sql->execute();
    $res = $sql->fetch();
    if (is_array($res)) {
        return $res[$coluna];
    } else {
        return $sql->fetch();
    }
}

function ValorBanco($valor)
{
    $verificaPonto = ".";
    if (strpos("[" . $valor . "]", "$verificaPonto")) :
        $valor = str_replace('.', '', $valor);
        $valor = str_replace(',', '.', $valor);
    else :
        $valor = str_replace(',', '.', $valor);
    endif;

    return $valor;
}

function buscaProduto($id)
{
    try {
        $conn = DataBase::connect();
        $sql = $conn->prepare("call buscaProdutoById({$id});");
        $sql->execute();
        return $sql->fetch();
    } catch (\Exception $e) {
        return false;
    }
}

function atualizarProduto($id, $nome, $fornecedor, $codigo, $custo, $venda, $estoque)
{
    try {
        $conn = DataBase::connect();
        $sql = $conn->prepare("call atualizarProduto({$id},{$codigo},'{$nome}','{$fornecedor}',{$custo},{$venda},{$estoque});");
        return $sql->execute();
    } catch (\Exception $e) {
        return false;
    }
}

function criarProduto($nome, $fornecedor, $codigo, $custo, $venda, $estoque)
{
    try {
        $conn = DataBase::connect();
        $sql = $conn->prepare("call criarProduto({$codigo},'{$nome}','{$fornecedor}',{$custo},{$venda},{$estoque});");
        return $sql->execute();
    } catch (\Exception $e) {
        return false;
    }
}

function deletarProduto($id)
{
    try {
        $conn = DataBase::connect();
        $sql = $conn->prepare("call deletarProduto({$id});");
        return $sql->execute();
    } catch (\Exception $e) {
        return false;
    }
}


function alertaEstoque()
{
    try {
        $conn = DataBase::connect();
        $sql = $conn->prepare("call alertaEstoque();");
        $sql->execute();
        return $sql->fetchAll();
    } catch (\Exception $e) {
        return false;
    }
}

function vendas()
{
    $conn = DataBase::connect();
    $sql = $conn->prepare("call exibirVendas();");
    $sql->execute();
    return $sql->fetchAll();
}

function vendasTopDezMes()
{
    $conn = DataBase::connect();
    $sql = $conn->prepare("call topDezVendaMes(); ");
    $sql->execute();
    return $sql->fetchAll();
}

function vendasTopDezDia()
{
    $conn = DataBase::connect();
    $sql = $conn->prepare("call topDezVendaDia();");
    $sql->execute();
    return $sql->fetchAll();
}

function vendasTopDia()
{
    $conn = DataBase::connect();
    $sql = $conn->prepare("call topVendaDia();");
    $sql->execute();
    return $sql->fetchAll();
}

function vendasTopMes()
{
    $conn = DataBase::connect();
    $sql = $conn->prepare("call topVendaMes();");
    $sql->execute();
    return $sql->fetchAll();
}

function valorTotalPorVenda()
{
    $conn = DataBase::connect();
    $sql = $conn->prepare("call totalPorVenda();");
    $sql->execute();
    return $sql->fetchAll();
}

function totalVendas()
{
    $conn = DataBase::connect();
    $sql = $conn->prepare("call totalVendasId();");
    $sql->execute();
    return $sql->fetch();
}
