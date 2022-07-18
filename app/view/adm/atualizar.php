<div class="col d-flex justify-content-center login-div">
    <div class="card card-login">
        <div class="card-body">
            <form method="POST" action="/adm/atualizar-produto">

                <div class="mb-4 text-center">
                    <h2>Atualizar Produto (Adm)</h2>
                </div>
                <div class="mb-3">
                    <?php echo exibirMensagem("up_ad_error"); ?>
                </div>
                <div class="form-floating mb-4">
                    <input type="text" class="form-control" id="nomeProduto" name='up_prod_nome' value="<?php echo exibirDado("dado_up_prod_nome_ad") ?? $produtos->nome_produto; ?>">
                    <label for="prod_nome" class="floatingInput">Nome produto</label>
                </div>
                <div class=" form-floating mb-3">
                    <?php echo exibirMensagem("up_prod_nome_ad"); ?>
                </div>
                <div class=" form-floating mb-4">
                    <input type="text" class="form-control" id="usuario" name='up_prod_cod' value="<?php echo exibirDado("dado_up_prod_cod_ad") ?? $produtos->codigo_produto; ?>">
                    <label for="usuario" class="form-label">Codigo produto</label>
                </div>
                <div class="form-floating mb-4">
                    <?php echo exibirMensagem("up_prod_cod_ad"); ?>
                </div>

                <div class="form-floating mb-4">
                    <input type="text" class="form-control" id="senha" name='up_prod_forne' value="<?php echo exibirDado("dado_up_prod_forne_ad") ?? $produtos->fornecedor; ?>">
                    <label for="usuario" class="form-label">Fornecedor</label>
                </div>
                <div class="mb-3">
                    <?php echo exibirMensagem("up_prod_forne_ad"); ?>
                </div>
                <div class="form-floating mb-4">
                    <input type="text" class="form-control money" id="senha" name='up_prod_c_venda' value="<?php echo exibirDado("dado_up_prod_c_venda_ad") ?? $produtos->custo_produto; ?>">

                    <label for="usuario" class="form-label">Valor de venda</label>
                </div>
                <div class="mb-3">
                    <?php echo exibirMensagem("up_prod_c_venda_ad"); ?>
                </div>
                <div class="form-floating mb-4">
                    <input type="text" class="form-control money" id="senha" name='up_prod_v_custo' value="<?php echo exibirDado("dado_up_prod_v_custo_ad") ?? $produtos->valor_venda; ?>">

                    <label for="usuario" class="form-label">Valor de custo</label>
                </div>
                <div class="mb-3">
                    <?php echo exibirMensagem("up_prod_v_custo_ad"); ?>
                </div>
                <div class="form-floating mb-4">
                    <input type="text" class="form-control" id="senha" name='up_prod_qtd_est' value="<?php echo exibirDado("dado_up_prod_qtd_est_ad") ?? $produtos->qtd_estoque;?>">

                    <label for="usuario" class="form-label">QTD.estoque</label>
                </div>
                <div class="mb-3">
                    <?php echo exibirMensagem("up_prod_qtd_est_ad"); ?>
                </div>
                <div class="mb-4">
                </div>
                <button type="submit" class="btn btn-login text-end text-white">Atualizar</button>
            </form>
            <br>
        </div>
    </div>
</div>