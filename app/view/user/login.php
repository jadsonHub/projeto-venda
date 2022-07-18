<div class="col d-flex justify-content-center login-div">
    <div class="card card-login">
        <div class="card-body">
            <form method="POST" action="/user/login">
                <div class="d-flex justify-content-center ">
                    <img src="/assets/img/carrinho-logo.jpg" class=" img-perfil rounded-circle" alt="...">
                </div><br>
                <div class="mb-3 text-center">
                    <h2>Projeto Vendas</h2>
                </div>
                <div class="mb-3">
                    <?php echo exibirMensagem("login_error"); ?>
                </div>
            
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name='email_usuario' id="usuario" value="<?php echo exibirDado("dado_email_usuario_login"); ?>"  >
                    <label for="usuario" class="floatingInput">Email</label>
                </div>
               
                <div class="mb-3">
                    <?php echo exibirMensagem("email_usuario_login"); ?>
                </div>

                <div class="form-floating mb-3">
                    <input type="password" name='senha_usuario' class="form-control" value="<?php echo exibirDado("dado_senha_usuario_login"); ?>"id="senha">
                    <label for="usuario" class="floatingInput">Senha</label>
                </div>
                <div class="mb-3">
                    <?php echo exibirMensagem("senha_usuario_login"); ?>
                </div>
                <button type="submit" class="btn btn-login text-end">Entrar</button>
            </form>
            <br>
        </div>
    </div>
</div>