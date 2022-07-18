<?php

function validar(string $uri, string $page, array $arrValidacao)
{
    $result = [];
    foreach ($arrValidacao as $indice => $value) {
        if (!str_contains($value, "|")) {

            $result[$indice] = (singleValidation($indice, $value, $uri, $page));
        }
        foreach ((multValidate($indice, $value, $uri, $page)) as $indices) {
            $result[$indice] = $indices;
        }
    }

    foreach ($result as $indice => $value) {
        if (is_null($value)) {
            $result = null;
        }
    }

    return $result;
}

function singleValidation($indice, $validate, $uri, $page)
{

    if (!str_contains($validate, '|')) {
        if (str_contains($validate, ':')) {
            [$method, $param] = explode(':', $validate);
            return $method($indice, $param, $uri, $page);
        } else {
            return $validate($indice, $uri, $page);
        }
    }
}

function multValidate($indice, $validate, $uri, $page)
{

    $result = [];
    if (str_contains($validate, '|')) {
        $explode = explode('|', $validate);
        foreach ($explode as $indices => $value) {
            if (str_contains($explode[$indices], ':')) {
                [$method, $param] = explode(":", $explode[$indices]);
                $result[$indice] = ($method($indice, $param, $uri, $page));
            } else {
                $method = $explode[$indices];
                $result[$indice] = $method($indice, $uri, $page);
            }
        }
    }

    return $result;
}

function mincaracter($indice, $param, $uri, $page)
{
    $valor = filter_input(INPUT_POST, $indice);
    if (strlen($valor) < $param) {
        errorEredirect($indice . "_" . $page, 'Inserir ' . filterParamentros($indice) . " com mais de {$param} caracter", $uri);
        return null;
    }
    return $valor;
}

function validarNome($indice, $uri, $page)
{
    $valor = filter_input(INPUT_POST, $indice);
    if (!preg_match("/^[A-Za-záàâãéèêíïóôõöúçñ ÁÀÂÃÊÉÈÍÏÓÔÕÖÚÇÑ]+$/", $valor)) {
        errorEredirect($indice . "_" . $page, 'Inserir ' . filterParamentros($indice) . " valido!", $uri);
        return null;
    }
    return $valor;
}

function validarProduto($indice, $uri, $page)
{
    $valor = filter_input(INPUT_POST, $indice);
    if (!preg_match("/^[A-Za-záàâãéèêíïóôõöúçñ\ ÁÀÂÃÊÉÈÍÏÓÔÕÖÚÇÑ\ 0-9]+$/", $valor)) {
        errorEredirect($indice . "_" . $page, 'Inserir ' . filterParamentros($indice) . " valido!", $uri);
        return null;
    }
    return $valor;
}

function email($indice, $uri, $page)
{

    $valor = filter_input(INPUT_POST, $indice, FILTER_VALIDATE_EMAIL);

    if (!$valor) {
        errorEredirect($indice . "_" . $page, 'Inserir ' . filterParamentros($indice) . " valido!", $uri);
        return null;
    }
    return $valor;
}

function required($indice, $uri, $page)
{


    $valor = filter_input(INPUT_POST, $indice);
    if (campoVazio($valor)) {
        dadosPagina($indice . "_" . $page, $valor);
        return $valor;
    } else {
        dadosPagina($indice . '_' . $page, $valor);
        //criar a mesangem de error para o user
        errorEredirect($indice . '_' . $page, 'Preencha o campo  ' . filterParamentros($indice), $uri);
        return null;
    }
}

function numberMax($indice, $uri, $page)
{
    $valor = floatval(filter_input(INPUT_POST, $indice));
    if ($valor >= 0 && $valor <= 10) {
        dadosPagina($indice . "_" . $page, $valor);
        return $valor;
    } else {
        dadosPagina($indice . '_' . $page, $valor);
        //criar a mesangem de error para o user
        errorEredirect($indice . '_' . $page, 'Colocar  de 0 a 10 no campo ' . filterParamentros($indice), $uri);

        return null;
    }
}



function isNumber($indice, $uri, $page)
{


    $valor = filter_input(INPUT_POST, $indice);
    if (!preg_match("/^[0-9.,0-9]+$/", $valor)) {
        errorEredirect($indice . "_" . $page, 'Inserir ' . filterParamentros($indice) . " valido!", $uri);
        return null;
    }
    return $valor;
}


function campoVazio($campo)
{

    if (!empty(ltrim($campo, ' '))) {
        return true;
    }
    return false;
}
function unique($indice, $param, $uri, $page)
{

    [$tabela, $coluna] = explode(',', $param);
    $valor = filter_input(INPUT_POST, $indice);
    if (campoVazio($valor)) {
        $busca = uniqueAll($tabela, $coluna, $valor);
        if ($valor == $busca) {
            dadosPagina($indice . "_" . $page, $valor);
            errorEredirect($indice . '_' . $page,  filterParamentros($indice) . ' já existe! ', $uri);
            return null;
        }
        dadosPagina($indice . "_" . $page, $valor);
        return $valor;
    } else {
        return null;
    }
}

function filterParamentros($valor)
{
    $filter = [
        'nome_usuario' => 'usuário',
        'validarSenha' => 'repetir senha',
        "senha_usuario" => 'senha',
        "email_usuario" => 'email',

        'prod_qtd_est' => 'QTD.estoque',
        'prod_nome' => 'Nome produto',
        "prod_cod" => 'Codigo produto',
        "prod_forne" => 'Fornecedor',
        "prod_c_venda" => "valor de venda",
        "prod_v_custo" => "Valor de custo",

        "ad_prod_nome" => 'Nome produto',
        "ad_prod_cod" => 'Codigo produto',
        "ad_prod_forne" => 'Fornecedor',
        "ad_prod_c_venda" => 'valor de venda',
        "ad_prod_v_custo" => 'Valor de custo',
        "ad_prod_qtd_est" => 'QTD.estoque',

        "up_prod_nome" => "Nome produto",
        "up_prod_cod" => 'Codigo produto',
        "up_prod_forne" => 'Fornecedor',
        "up_prod_c_venda" => 'valor de venda',
        "up_prod_v_custo" => 'Valor de custo',
        "up_prod_qtd_est" => 'QTD.estoque',

        "us_prod_cod" => 'Codigo produto',
        "us_prod_forne" => 'Fornecedor',
        "us_prod_c_venda" => 'valor de venda',
        "us_prod_v_custo" => 'Valor de custo',
        "us_prod_qtd_est" => 'QTD.estoque',

        "us_up_prod_cod" => 'Codigo produto',
        "us_up_prod_forne" => 'Fornecedor',
        "us_up_prod_c_venda" => 'valor de venda',
        "us_up_prod_v_custo" => 'Valor de custo',
        "us_up_prod_qtd_est" => 'QTD.estoque'

    ];
    foreach ($filter as $indice => $value) {
        if ($indice === $valor) {
            return $value;
        }
    }
    return $valor;
}

function senhaValidate($indice, $param, $uri, $page)
{

    $senha = filter_input(INPUT_POST, $indice);
    $auxSenha = filter_input(INPUT_POST, $param);


    if (campoVazio($senha) && campoVazio($auxSenha)) {
        if ($senha != $auxSenha) {
            dadosPagina($indice, $senha);
            dadosPagina("{$param}_{$page}" . $page, $auxSenha);
            errorEredirect($param . '_' . $page, 'Error  senhas diferentes', $uri);
            return null;
        }
        dadosPagina($indice, $senha);
        dadosPagina("{$param}_{$page}", $auxSenha);
        return $senha;
    } else {
        return null;
    }
}
