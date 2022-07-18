// Example starter JavaScript for disabling form submissions if there are invalid fields

//mascaras
$(document).ready(function () {
  // $('.date').mask('00/00/0000' , {reverse: true});
  // $('.time').mask('00:00:00');
  // $('.cep').mask('00000-000');
  //  $('#telefone').mask('(00) 00000-0000');
  // $('.cpf').mask('000.000.000-00');
  $('.money').mask('000.000.000.000.000,00', { reverse: true });
  // $('#cep').mask('00000-000');
  // $("#cnpj").mask('000.000.000-00');
});

function voltar() {
  history.go(-1);
}

function gerarCardsAdm(obj, id) {

  if (obj !== '') {
    var filterRt = JSON.parse(JSON.stringify(obj))
    var objRT = JSON.parse(filterRt)
    if (objRT != undefined) {
      objRT.forEach(element => {
        $(id).append(`<div class="col">
        <div class="card">
         <div class="card-body">
           <h5 class="card-title">Produto Cadastrado</h5>
           <p class="card-text"> Nome produto: ` + element.nome_produto + `</p>
           <p class="card-text"> Fornecedor: ` + element.fornecedor + `</p>
           <p class="card-text"> Valor de venda: ` + number_format(element.valor_venda, 2, '.', ',') + `</p>
           <p class="card-text"> Valor de custo : ` + number_format(element.custo_produto, 2, '.', ',') + `</p>
           <p class="card-text"> QTD.estoque :  ` + element.qtd_estoque + `</p>
           <p class="card-text"> Codigo produto : ` + element.codigo_produto + `</p>
           <p class="card-text"> Data de atualização : ` + element.data_cadastro + `</p>
           <a class="btn btn-danger" href="/adm/atualizar-produto/`+ element.id_produto + `"><i class="fas  fa-pen"></i></a>
           <a class="btn btn-danger" href="/adm/deletar-produto/`+ element.id_produto + `"><i class="fas  fa-trash"></i></a>
         </div>
       </div>
     </div>`);
      });
    }
  }

}

function gerarCardsUser(obj, id) {
  if (obj !== '') {
    var filterRt = JSON.parse(JSON.stringify(obj))
    var objRT = JSON.parse(filterRt)
    if (objRT != undefined) {
      objRT.forEach(element => {
        $(id).append(`<div class="col">
        <div class="card">
         <div class="card-body">
           <h5 class="card-title">Produto Cadastrado</h5>
           <p class="card-text"> Nome produto: ` + element.nome_produto + `</p>
           <p class="card-text"> Fornecedor: ` + element.fornecedor + `</p>
           <p class="card-text"> Valor de venda: ` + number_format(element.valor_venda, 2, '.', ',') + `</p>
           <p class="card-text"> Valor de custo : ` + number_format(element.custo_produto, 2, '.', ',') + `</p>
           <p class="card-text"> QTD.estoque :  ` + element.qtd_estoque + `</p>
           <p class="card-text"> Codigo produto : ` + element.codigo_produto + `</p>
           <p class="card-text"> Data de atualização : ` + element.data_cadastro + `</p>
           <a class="btn btn-danger" href="/user/atualizar-produto/`+ element.id_produto + `"><i class="fas  fa-pen"></i></a>
         </div>
       </div>
     </div>`);
      });
    }
  }

}

function number_format(number, decimals, dec_point, thousands_sep) {
  number = (number + '').replace(',', '').replace(' ', '');
  var n = !isFinite(+number) ? 0 : +number,
    prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
    sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
    dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
    s = '',
    toFixedFix = function (n, prec) {
      var k = Math.pow(10, prec);
      return '' + Math.round(n * k) / k;
    };
  // Fix for IE parseFloat(0.55).toFixed(0) = 0;
  s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
  if (s[0].length > 3) {
    s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
  }
  if ((s[1] || '').length < prec) {
    s[1] = s[1] || '';
    s[1] += new Array(prec - s[1].length + 1).join('0');
  }
  return s.join(dec);
}




function SucessAtualizar() {

  Swal.fire({
    icon: 'success',
    title: 'Oops...',
    text: 'Something went wrong!',
    footer: '<a href="">Why do I have this issue?</a> <a href="">Why do I have this issue?</a>',
  })
}

function ErrorAtualizar() {

}
