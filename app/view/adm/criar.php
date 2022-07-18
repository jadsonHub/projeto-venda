<div class="col d-flex justify-content-center login-div">
    <div class="card card-login">
        <div class="card-body">
            <form method="POST" action="/adm/criar">

                <div class="mb-4 text-center">
                    <h2>Cadastrar Produto (adm)</h2>
                </div>
                <div class="mb-3">
                    <?php echo exibirMensagem("ca_ad_error"); ?>
                </div>
                <div class="form-floating mb-4">
                    <input type="text" class="form-control" id="nomeProduto" name='ad_prod_nome' value="<?php echo exibirDado("dado_ad_prod_nome_criar"); ?>">
                    <label for="prod_nome" class="floatingInput">Nome produto</label>
                </div>
                <div class=" form-floating mb-3">
                    <?php echo exibirMensagem("ad_prod_nome_criar"); ?>
                </div>
                <div class=" form-floating mb-4">
                    <input type="text" class="form-control" id="usuario" name='ad_prod_cod' value="<?php echo exibirDado("dado_ad_prod_cod_criar"); ?>">
                    <label for="usuario" class="form-label">Codigo produto</label>
                </div>
                <div class="form-floating mb-4">
                    <?php echo exibirMensagem("ad_prod_cod_criar"); ?>
                </div>

                <div class="form-floating mb-4">
                    <input type="text" class="form-control" id="senha" name='ad_prod_forne' value="<?php echo exibirDado("dado_ad_prod_forne_criar"); ?>">
                    <label for="usuario" class="form-label">Fornecedor</label>
                </div>
                <div class="mb-3">
                    <?php echo exibirMensagem("ad_prod_forne_criar"); ?>
                </div>
                <div class="form-floating mb-4">
                    <input type="text" class="form-control money" id="senha" name='ad_prod_c_venda' value="<?php echo exibirDado("dado_ad_prod_c_venda_criar"); ?>">

                    <label for="usuario" class="form-label">Valor de venda</label>
                </div>
                <div class="mb-3">
                    <?php echo exibirMensagem("ad_prod_c_venda_criar"); ?>
                </div>
                <div class="form-floating mb-4">
                    <input type="text" class="form-control money" id="senha" name='ad_prod_v_custo' value="<?php echo exibirDado("dado_ad_prod_v_custo_criar"); ?>">

                    <label for="usuario" class="form-label">Valor de custo</label>
                </div>
                <div class="mb-3">
                    <?php echo exibirMensagem("ad_prod_v_custo_criar"); ?>
                </div>
                <div class="form-floating mb-4">
                    <input type="text" class="form-control" id="senha" name='ad_prod_qtd_est' value="<?php echo exibirDado("dado_ad_prod_qtd_est_criar"); ?>">

                    <label for="usuario" class="form-label">QTD.estoque</label>
                </div>
                <div class="mb-3">
                    <?php echo exibirMensagem("ad_prod_qtd_est_criar"); ?>
                </div>
                <div class="mb-4">
                </div>
                <button type="submit" class="btn btn-login text-end text-white">Cadastrar</button>
            </form>
            <br>
        </div>
    </div>
</div>