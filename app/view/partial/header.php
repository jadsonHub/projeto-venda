<nav class="navbar navbar-expand-lg navbar-light nav-css">
  <div class="container-fluid container">
    <a class="navbar-brand" href="/">Projeto-Vendas</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <?php if (!verificarSession('user') and !verificarSession('adm')) { ?>
          <li class="nav-item">
            <a class="nav-link" href="/">Página Inícial</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="/user/login">Conecte-se</a>
          </li>
        <?php } else if (verificarSession('user')) { ?>
          <li class="nav-item">
            <a class="nav-link " href="/user/dashboard">Pagina inicial</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="/user/produtos">Lista de Produtos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="/user/criar">Cadastrar Produtos</a>
          </li>
        
        <?php } else if (verificarSession('adm')) { ?>
          <li class="nav-item">
            <a class="nav-link " href="/adm/dashboard">Pagina inicial</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="/adm/produtos">Lista de Produtos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="/adm/criar">Cadastrar Produtos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="/adm/relatorio-vendas">Relatorio de Vendas</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="/adm/alerta-estoque">Alertas</a>
          </li>
      </ul>
    <?php } ?>
    </div>
    <?php if (verificarSession('adm')) { ?>
      <div class="d-flex">
        <a class="nav-link text-black" href="/adm/sair">Sair</a>
        <span class=" nav-link text-black"><?php echo  "Olá,  " . dadosOnjSession('adm')->nivel . " " . dadosOnjSession('adm')->nome_usuario; ?></span>
      </div>

    <?php } else if (verificarSession('user')) { ?>
      <div class="d-flex">
        <a class="nav-link text-black" href="/user/sair">Sair</a>
        <span class="nav-link text-black"><?php echo  "Olá,  " . dadosOnjSession('user')->nivel . ' ' . dadosOnjSession('user')->nome_usuario; ?></span>
      </div>

    <?php } ?>
  </div>
</nav>

<?php if (verificarSession('adm') && $_SERVER['REQUEST_URI'] != '/adm/alerta-estoque') { ?>
  <div class="alerta-adm">
  
  </div>

<?php } ?>