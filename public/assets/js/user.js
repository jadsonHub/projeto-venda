
function buscaProdUser() {
    $("#pesquisa-user").keyup(function () {
        var buscaUser = $("#pesquisa-user").val();
        if (buscaUser != '') {
            $.post('/user/refresh', {
                buscaUser: buscaUser
            }, function (data) {
                if (data != "null") {
                    gerarCardsUser(data, ".resultado-user");
                } else {
                    $(".resultado-user").append(`<div class="text-center mt-5">
                                        <h1 class="">Produto não encontrado!</h1>
                                      </div>`);
                }
            });
        } else if (buscaAdm == '') {
            dadosProdutoUser()
        }
        $('.resultado-user').html(' ')

    });
}




function dadosProdutoUser() {
    $.get('/user/produto', function (retorno) {
        if (retorno != "null") {
            $('.div-bs-prod-user').css('display', 'block')
            gerarCardsUser(retorno, ".resultado-user");
        } else {
            $(".resultado-user").html(" ")
            $(".bs-prod-us").html(" ")
            $(".sem-prod-user").append(`<div class="text-center mt-5">
        <h1 class="">Sem produtos cadastrados no sistema!</h1>
      </div>`);
        }

    })
}

dadosProdutoUser()
buscaProdUser()
