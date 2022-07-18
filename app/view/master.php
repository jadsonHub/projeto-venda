<!doctype html>
<html lang="pt-br">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="imagex/png" href="/assets/img/carrinho-logo.jpg">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
     <link rel="stylesheet" href="/assets/css/style.css">
    <title><?php echo $title; ?></title>
</head>

<body style="background-color: #d3d3d3;">

    <?php require __DIR__ . '/partial/header.php'; ?>
    <div class="container-fluid">
        <?php require __DIR__ . '/' . $view . '.php'; ?>

    </div>
    <?php require __DIR__ . '/partial/footer.php'; ?>
    <script src="/assets/js/jquery.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
    <script src="/assets/js/kit.fontawesome.js"  ></script>
    <script src="/assets/js/jquery-mask.js" ></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="/assets/js/main.js" ></script>
    <script src="/assets/js/adm.js"></script>
    <script src="/assets/js/user.js"></script>
    <!-- caminho para importar seu css,js,img é o assets dentro de public , caminho do css 
          /assets/css/style.css  ,colocar no link certo !
    -->
</body>

</html>