<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.98.0">
    <title>HOME</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/album/">





    <link href="css1/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="/docs/5.2/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
    <link rel="icon" href="/docs/5.2/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
    <link rel="icon" href="/docs/5.2/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
    <link rel="manifest" href="/docs/5.2/assets/img/favicons/manifest.json">
    <link rel="mask-icon" href="/docs/5.2/assets/img/favicons/safari-pinned-tab.svg" color="#712cf9">
    <link rel="icon" href="/docs/5.2/assets/img/favicons/favicon.ico">
    <meta name="theme-color" content="#712cf9">


    <style>
    .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
    }

    @media (min-width: 768px) {
        .bd-placeholder-img-lg {
            font-size: 3.5rem;
        }
    }

    .b-example-divider {
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
    }

    .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
    }

    .bi {
        vertical-align: -.125em;
        fill: currentColor;
    }

    .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
    }

    .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
    }
    </style>


</head>

<body>
    <?php
    require './classes/Patrimonio.php';


    $patr = new Patrimonio();

    if (isset($_POST['cadastrar'])) :

    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $detalhes = $_POST['detalhes'];
    $data_origem = $_POST['data_origem'];
    $data_cadastro = $_POST['data_cadastro'];
    $localizacao = $_POST['localizacao'];
    $googlemaps = $_POST['googlemaps'];
    $url_video = $_POST['url_video'];
    $imagem = $_FILES['imagem'];
    $diretorio="img/";
    $nome_imagem = $imagem['name'];
    move_uploaded_file($imagem['tmp_name'],$diretorio.$nome_imagem); 

    $patr->setNome($nome);
    $patr->setDescricao($descricao);
    $patr->setDetalhes($detalhes);
    $patr->setData_origem($data_origem);
    $patr->setData_cadastro($data_cadastro);
    $patr->setLocalizacao($localizacao);
    $patr->setGooglemaps($googlemaps);
    $patr->setUrl_video($url_video);
    $patr->setNome_imagem($nome_imagem);


    endif;

?>


    <header>
        <div class="bg-dark collapse " id="navbarHeader">
            <div class="container">
                <div class="row">
                    <div class="col-sm-8 col-md-7 py-4">
                        <h4 class="text-white">Menu</h4>
                        <p class="text-muted"></p>
                    </div>
                    <div class="col-sm-4 offset-md-1 py-4">
                        <h4 class="text-white">Cadastro:</h4>
                        <ul class="list-unstyled">
                            <li><a href="cadastro_turma.php" style="text-decoration:none" class="text-white">Cadastrar
                                    Turma</a></li>
                            <li><a href="cadastro_aluno.php" style="text-decoration:none" class="text-white">Cadastrar
                                    Aluno</a></li>
                            <li><a href="cadastro_patrimonio.php" style="text-decoration:none"
                                    class="text-white">Cadastrar Patrimônio</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="navbar navbar-dark  shadow-sm">
            <div class="container">
                <a href="#" class="navbar-brand d-flex align-items-center">
                    <img src="img/if.png" alt="">
                    <!-- <strong>PatCor</strong> -->
                </a>
                <button class="navbar-toggler bg-dark" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon "></span>
                </button>
            </div>
        </div>
    </header>
    <main>
        <section class="py-5 text-center container">
            <div class="row py-lg-5">
                <div class="col-lg-6 col-md-8 mx-auto">
                    <h1 class=>Patrimônios Corrente - PI</h1>
                    <p class="lead text-muted">Bem Vindo!! <br> Listamos pra voce alguns Patrimônios da nossa querida
                        cidade <b>CORRENTE-PI</b>
                    </p>
                </div>
            </div>
        </section>
        <!-- LISTAR TODOS OS PATRIMONIOS  E MOSTRAR NO CARD--> 
        <?php foreach ($patr->findAll() as $key => $value) : ?>
        <div class="album py-5 bg-light">
            <div class="container">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                    <div class="col">
                        <div class="card shadow" >
                            <img src="img/<?php echo $value->nome_imagem ?>" alt="imagem" width="100%" height="225" width="100%"
                                height="100%" fill="#55595c" /><text x="50%" y="50%" fill="#eceeef">
                                <div class="card-body">
                                    <h1><?php echo $value->nome; ?></h1>
                                    <p class="card-text"><?php echo $value->descricao; ?></p>
                                    <p class="card-text">
                                    <h6>Detalhes:</h6> <?php echo $value->detalhes; ?></p>
                                    <p class="cadr-text"> Localizado: <?php echo $value->localizacao; ?></p>
                                    <h6> Data de Origem: <?php echo date('d-m-Y', strtotime ($value->data_origem)); ?>
                                    </h6>
                                    <h6> Data Cadastro: <?php echo date('d-m-Y', strtotime  ($value->data_cadastro)); ?>
                                    </h6>
                                    <br>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-sm btn-outline-dark"><a
                                                    href="<?php echo $value->googlemaps; ?>"
                                                    style="text-decoration:none" target="_blank"
                                                    rel="noopener noreferrer"> Google Maps</a></button>
                                            <button type="button" class="btn btn-sm btn-outline-dark "><a
                                                    href=" <?php echo $value->url_video; ?>"
                                                    style="text-decoration:none" target="_blank"
                                                    rel="noopener noreferrer">YouTube</a></button>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </main>

    <footer class="text-muted py-5">
        <div class="container">
            <p class="float-end mb-1">
                <a href="#" style="text-decoration:none">Voltar ao topo</a>
            </p>
            <p class="mb-1">&copy; Jennifer Bianca, Melvim Rafael</p>
        </div>
    </footer>
    <script src="js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>


</body>

</html>