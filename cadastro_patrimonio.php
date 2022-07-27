<!DOCTYPE HTML>
<html land="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>CADASTRO PATRIMONIO</title>
    <meta name="description" content="PHP OO PDO" />
    <meta name="robots" content="index, follow" />
    <link rel="stylesheet" href="css/bootstrap.css" />
    <link rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    

    <!--[if lt IE 9]>
      <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
   <![endif]-->
</head>

<body>

    <div class="container">

        <?php

        require './classes/Patrimonio.php';


        $patr = new Patrimonio();

        if (isset($_POST['cadastrar'])) :
            
            $nome  = $_POST['nome'];
            $descricao  = $_POST['descricao'];
            $detalhes  = $_POST['detalhes'];
            $data_origem  = $_POST['data_origem'];
            $data_cadastro  = $_POST['data_cadastro'];
            $localizacao = $_POST['localizacao'];
            $googlemaps  = $_POST['googlemaps'];
            $url_video  = $_POST['url_video'];
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
            

            # Insert
            if ($patr->insert()) {
                echo "Inserido com sucesso!";
            }

        endif;

        ?>
        <header class="masthead">
            <h1 class="muted">PATRIMONIO CORRENTE</h1>
            <nav class="navbar">
                <div class="navbar-inner">
                    <div class="container">
                        <ul class="nav">
                            <li class="active"><a href="pagina.php">Página Inicial</a></li>
                            <li class="active"><a href="cadastro_turma.php">Cadastro Turma</a></li>
                            <li class="active"><a href="cadastro_aluno.php">Cadastro Aluno</a></li>
                            <li class="active"><a href="cadastro_patrimonio.php">Cadastro Patrimonio</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>

        <?php
        if (isset($_POST['atualizar'])) :

            $id = $_POST['id'];
            $nome  = $_POST['nome'];
            $descricao  = $_POST['descricao'];
            $detalhes  = $_POST['detalhes'];
            $data_origem  = $_POST['data_origem'];
            $data_cadastro  = $_POST['data_cadastro'];
            $localizacao = $_POST['localizacao'];
            $googlemaps  = $_POST['googlemaps'];
            $url_video  = $_POST['url_video'];
 
            $patr->setNome($nome);
            $patr->setDescricao($descricao);
            $patr->setDetalhes($detalhes);
            $patr->setData_origem($data_origem);
            $patr->setData_cadastro($data_cadastro);
            $patr->setLocalizacao($localizacao);
            $patr->setGooglemaps($googlemaps);
            $patr->setUrl_video($url_video);

            if ($patr->update($id)) {
                echo "Atualizado com sucesso!";
            }

        endif;
        ?>

        <?php
        if (isset($_GET['acao']) && $_GET['acao'] == 'deletar') :

            $id = (int)$_GET['id'];
      
            if ($patr->delete($id)) {
                echo "Deletado com sucesso!";
            }

        endif;
        ?>

        <?php
        if (isset($_GET['acao']) && $_GET['acao'] == 'editar') {

            $id = (int)$_GET['id'];
            $resultado = $patr->find($id);
        ?>
        <!-- FORMULARIO DE EDITAR  -->
        <form method="post" action="" enctype="multipart/form-data">
            <div class="input-prepend">
                <span class="add-on"><i class="icon-user"></i></span>
                <input type="text" name="nome" value="<?php echo $resultado->nome; ?>" placeholder="Nome:" />
            </div>
            <div class="input-prepend">
                <span class="add-on"><i class="bi bi-chat-left-text-fill"></i></span>
                <input type="text" name="descricao" value="<?php echo $resultado->descricao; ?>"
                    placeholder="Descrição:" />
            </div>
            <div class="input-prepend">
                <span class="add-on"><i class="bi bi-ticket-detailed-fill"></i></span>
                <input type="text" name="detalhes" value="<?php echo $resultado->detalhes; ?>"
                    placeholder="Detalhes:" />
            </div>
            <div class="input-prepend">
                <span class="add-on"><i class="bi bi-geo-alt-fill"></i></span>
                <input type="text" name="localizacao" value="<?php echo $resultado->localizacao; ?>"
                    placeholder="Localização:" />
            </div>
            <div class="input-prepend">
                <span class="add-on"><i class="bi bi-link-45deg"></i></span>
                <input type="url" name="googlemaps" value="<?php echo $resultado->googlemaps; ?>"
                    placeholder="Google Maps:" />
            </div>
            <div class="input-prepend">
                <span class="add-on"><i class="bi bi-youtube"></i></span>
                <input type="url" name="url_video" value="<?php echo $resultado->url_video; ?>"
                    placeholder="Url Video:" />
            </div>
            <div class="input-prepend">
                <label class="form-label"><b> DATA ORIGEM: </b>:</label>
                <span class="add-on"><i class="bi bi-calendar-date-fill"></i></span>
                <input type="date" name="data_origem" value="<?php echo $resultado->data_origem; ?>"
                    placeholder="Data Origem:" />
            </div>
            <div class="input-prepend">
                <label class="form-label"><b> DATA CADASTRO: </b></label>
                <span class="add-on"><i class="bi bi-calendar-date-fill"></i></span>
                <input type="date" name="data_cadastro" value="<?php echo $resultado->data_cadastro; ?>"
                    placeholder="Data Cadastro:" />
            </div>
            <div class="input-prepend">
                <label class="form-label"><b> SELECIONAR IMAGEM: </b> </label>
                <span class="add-on"><i class="bi bi-image-fill"></i></span>
                <input type="file" name="imagem" required />
            </div>
            <input type="hidden" name="id" value="<?php echo $resultado->id; ?>">
            <br />
            <input type="submit" name="atualizar" class="btn btn-primary" value="Atualizar dados">
        </form>

        <!-- Formulario para cadastrar  -->

        <?php } else { ?>
        <form method="post" action="" enctype="multipart/form-data">
            <div class="input-prepend">
                <span class="add-on"><i class="icon-user"></i></span>
                <input type="text" name="nome" placeholder="Nome:" />
            </div>
            <div class="input-prepend">
                <span class="add-on"><i class="bi bi-chat-left-text-fill"></i></span>
                <input type="text" name="descricao" placeholder="Descrição:" />
            </div>
            <div class="input-prepend">
                <span class="add-on"><i class="bi bi-ticket-detailed-fill"></i></span>
                <input type="text" name="detalhes" placeholder="Detalhes:" />
            </div>
            <div class="input-prepend">
                <span class="add-on"><i class="bi bi-geo-alt-fill"></i></span>
                <input type="text" name="localizacao" placeholder="Localização:" />
            </div>
            <div class="input-prepend">
                <span class="add-on"><i class="bi bi-link-45deg"></i></span>
                <input type="url" name="googlemaps" placeholder="Google Maps:" />
            </div>
            <div class="input-prepend">
                <span class="add-on"><i class="bi bi-youtube"></i></span>
                <input type="url" name="url_video" placeholder="Url Video:" />
            </div>
            <br>
            <div class="input-prepend">
                <label class="form-label"><b> DATA ORIGEM: </b>:</label>
                <span class="add-on"><i class="bi bi-calendar-date-fill"></i></span>
                <input type="date" name="data_origem" placeholder="Data Origem:" />
            </div>
            <div class="input-prepend">
                <label class="form-label"><b> DATA CADASTRO: </b></label>
                <span class="add-on"><i class="bi bi-calendar-date-fill"></i></span>
                <input type="date" name="data_cadastro" placeholder="Data Cadastro:" />
            </div>
            <div class="input-prepend">
                <label class="form-label"><b> SELECIONAR IMAGEM: </b> </label>
                <span class="add-on"><i class="bi bi-image-fill"></i></span>
                <input type="file" name="imagem" required />
            </div>
            <br>
            <input type="submit" name="cadastrar" class="btn btn-primary" value="Cadastrar dados">
        </form>

        <?php } ?>

        <table class="table table-responsive">

            <thead class="table">
                <tr>
                    <!-- <th>#</th> -->
                    <th>Nome:</th>
                    <th>Descrição:</th>
                    <th>Detalhes:</th>
                    <th>Data Origem:</th>
                    <th>Data Cadastro:</th>
                    <th>Localização:</th>
                    <th>imagem:</th>
                    <!-- <th>Google Maps:</th>
                    <th>Url video :</th> -->
                    <th>Ações:</th>
                </tr>
            </thead>

            <?php foreach ($patr->findAll() as $key => $value) : ?>

            <tbody>
                <tr>
                    <!-- <td><?php echo $value->id; ?></td> -->
                    <td><?php echo $value->nome; ?></td>
                    <td><?php echo $value->descricao; ?></td>
                    <td><?php echo $value->detalhes; ?></td>
                    <td><?php echo $value->data_origem; ?></td>
                    <td><?php echo $value->data_cadastro; ?></td>
                    <td><?php echo $value->localizacao; ?></td>
                    <td><?php echo $value->nome_imagem; ?></td>
                        <!-- <td><?php echo $value->url_video; ?></td> -->
                    <td>
                        <?php echo "<a href='cadastro_patrimonio.php?acao=editar&id=" . $value->id . "'>Editar</a>"; ?>
                        <?php echo "<a href='cadastro_patrimonio.php?acao=deletar&id=" . $value->id . "' onclick='return confirm(\"Deseja realmente deletar?\")'>Deletar</a>"; ?>
                    </td>
                </tr>
            </tbody>

            <?php endforeach; ?>

        </table>

    </div>

    <script src="js/jQuery.js"></script>
    <script src="js/bootstrap.js"></script>
</body>

</html>