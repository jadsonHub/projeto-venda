
function buscaProdAdm() {
  $("#pesquisa-ad").keyup(function () {
    var buscaAdm = $("#pesquisa-ad").val();
    if (buscaAdm != '') {
      $.post('/adm/refresh', {
        buscaAdm: buscaAdm
      }, function (data) {
        if (data != "null") {
          gerarCardsAdm(data, ".resultado-ad");
        } else {
          $(".resultado-ad").append(`<div class="text-center mt-5">
                                      <h1 class="">Produto não encontrado!</h1>
                                    </div>`);
        }
      });
    } else if (buscaAdm == '') {
      dadosProdutoAdm()
    }
    $('.resultado-ad').html(' ')

  });
}


function buscaProdAdmAlerta() {
  $("#pesquisa-ad-alerta").keyup(function () {
    var buscaAdmAlerta = $("#pesquisa-ad-alerta").val();
    if (buscaAdmAlerta != '') {
      $.post('/adm/alerta', {
        buscaAdmAlerta: buscaAdmAlerta
      }, function (data) {
        if (data != '[]') {
          gerarCardsAdm(data, ".resultado-ad-alerta");
        } else {

          $(".resultado-ad-alerta").append(`<div class="text-center mt-5">
                                      <h1 class="">Produto não se encontra em baixa de estoque!</h1>
                                    </div>`);
        }
      });
    } else if (buscaAdmAlerta == '') {
      dadosProdutoAdmAlerta()
    }
    $('.resultado-ad-alerta').html(' ')
  });
}



function dadosProdutoAdm() {
  $.get('/adm/produto', function (retorno) {
    if (retorno != "null") {
      $('.div-bs-prod-adm').css('display','block')
      gerarCardsAdm(retorno, ".resultado-ad");
    } else {
      $(".resultado-ad").html(" ")
      $(".bs-prod-ad").html(" ")
      $(".sem-prod").append(`<div class="text-center mt-5">
      <h1 class="">Sem produtos cadastrados no sistema!</h1>
    </div>`);
    }

  })
}



function dadosProdutoAdmAlerta() {
  $.get('/adm/alertas-prod', function (retorno) {

    if (retorno != "null") {
      $('.alerta-adm').append(`<div class="text-center mt-5 ">
      <h1 class="">Ei, tem relatorio de alertas </h1>
      <a class="btn btn-danger " href="/adm/alerta-estoque">Clique aqui para ver</a>
      </div>`);
      $(".div-btn-al-adm").css("display","block")
      gerarCardsAdm(retorno, ".resultado-ad-alerta");
    } else {
      $(".resultado-ad-alerta").html(" ")
      $(".bs-prod-ad-alerta").html(" ")
      $('.alerta-adm').css('display', 'none')
      $(".sem-prod-alerta").append(`<div class="text-center mt-5">
      <h1 class="">Tudo ok, avisaremos se algo acontecer :)!</h1>
    </div>`);
    }

  })
}

dadosProdutoAdm()
buscaProdAdm()
buscaProdAdmAlerta()
dadosProdutoAdmAlerta()