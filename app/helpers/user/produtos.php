<?php

function produtosUser()
{
   $busca = produtos();
   if ($busca) {
      return $busca;
   } else {
      return null;
   }
}

function getJsonProdutos($busca)
{
   $busca = produtosJson($busca);
   if ($busca) {
      return $busca;
   } else {
      return null;
   }
}

function getJsonProdutosAlertaADM($busca)
{
   $busca = produtosJsonAlerta($busca);
   if ($busca) {
      return $busca;
   } else {
      return null;
   }
}

function getProdutoById($id)
{
   $busca = buscaProduto($id);
   if (!empty($busca)) {
      return $busca;
   } else {
      return '';
   }
}


function atualiarProdutoByIdUSER($id, $nome, $fornecedor, $codigo, $custo, $venda, $estoque)
{
   $arr = [
      "user-at-prod", "dado_us_up_prod_nome_us", "dado_us_up_prod_cod_ad", "dado_us_up_prod_forne_us",
      "dado_us__up_prod_c_venda_us", "dado_us_up_prod_v_custo_us", "dado_us_up_prod_qtd_est_us"
   ];
   $up = atualizarProduto($id, $nome, $fornecedor, $codigo, $custo, $venda, $estoque);
   if ($up) {
      excluirSession($arr);
      redirecionar('/user/produtos');
   } else {
      return errorEredirect('up_us_error', 'Falha ao Atualizar codigo ou nome do produto já existe!', '/user/atualizar-produto');
   }
}
function cadastrarProdutoADM($nome, $fornecedor, $codigo, $custo, $venda, $estoque)
{
   $arr = ["dado_ad_prod_nome_criar", "dado_ad_prod_cod_criar", "dado_ad_prod_forne_criar", "dado_ad_prod_c_venda_criar", "dado_ad_prod_v_custo_criar", "dado_ad_prod_qtd_est_criar"];

   $cad = criarProduto($nome, $fornecedor, $codigo, $custo, $venda, $estoque);
   if ($cad) {
      excluirSession($arr);
      redirecionar('/adm/produtos');
   } else {
      excluirSession($arr);
      return errorEredirect('up_ad_error', 'Falha ao cadastrar', '/adm/criar');
   }
}

function cadastrarProdutoUSER($nome, $fornecedor, $codigo, $custo, $venda, $estoque)
{
   $arr = [
      "dado_prod_nome_criar", "dado_prod_cod_criar", "dado_prod_forne_criar",
      "dado_prod_c_venda_criar", "dado_prod_v_custo_criar", "dado_prod_qtd_est_criar"
   ];

   $cad = criarProduto($nome, $fornecedor, $codigo, $custo, $venda, $estoque);
   if ($cad) {
      excluirSession($arr);
      redirecionar('/user/produtos');
   } else {
      return errorEredirect('ca_us_error', 'Falha ao cadastrar', '/user/criar');
   }
}


function atualiarProdutoByIdADM($id, $nome, $fornecedor, $codigo, $custo, $venda, $estoque)
{
   $arr = [
      "adm-at-prod", "dado_up_prod_nome_ad", "dado_up_prod_cod_ad", "dado_up_prod_forne_ad",
      "dado_up_prod_c_venda_ad", "dado_up_prod_v_custo_ad", "dado_up_prod_qtd_est_ad"
   ];
   $up = atualizarProduto($id, $nome, $fornecedor, $codigo, $custo, $venda, $estoque);
   if ($up) {

      excluirSession($arr);
      redirecionar('/adm/produtos');
   } else {
      return errorEredirect('up_ad_error', 'Falha ao Atualizar codigo ou nome do produto já existe!', '/adm/atualizar-produto');
   }
}


function deletarProdutoByIdADM($id)
{
   $del = deletarProduto($id);
   if ($del) {
      redirecionar('/adm/produtos');
   } else {
      return errorEredirect('up_ad_error', 'Falha ao Deletar', '/adm/produtos');
   }
}

function alertaEstoqueAdm()
{
   $al = alertaEstoque();
   if ($al) {
      $_SESSION['alerta-adm'] = true;
      return $al;
   } else {
      excluirSession('alerta-adm');
      return null;
   }
}

function exibirVendasADM()
{

   $vendas = vendas();
   if ($vendas) {
      return $vendas;
   } else {
      return false;
   }
}

function vendaTopDezDiaADM()
{
   $top = vendasTopDezDia();
   if ($top) {
      return $top;
   } else {
      return false;
   }
}

function vendaTopDezMesADM()
{
   $top = vendasTopDezMes();
   if ($top) {
      return $top;
   } else {
      return false;
   }
}

function vendaTopDiaADM()
{
   $top = vendasTopDia();
   if ($top) {
      return $top;
   } else {
      return false;
   }
}

function vendaTopMesADM()
{
   $top = vendasTopMes();
   if ($top) {
      return $top;
   } else {
      return false;
   }
}

function vendaTotalByIdADM()
{
   $tot = valorTotalPorVenda();
   if ($tot) {
      return $tot;
   } else {
      return false;
   }
}

function totalVendasIdADM()
{

   $tot =  totalVendas();
   if ($tot) {
      return $tot['count(id_venda)'];
   } else {
      return false;
   }
}
