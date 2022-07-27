<!DOCTYPE HTML>
<html land="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Pagina turma</title>
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
                require './classes/Turma.php';
                
	
		$turma = new Turma();

		if(isset($_POST['cadastrar'])):

			$nome  = $_POST['nome'];
			$periodo_letivo = $_POST['periodo_letivo'];
			$status_turma = $_POST['status_turma'];

			$turma->setNome($nome);
			$turma->setPeriodo_letivo($periodo_letivo);
			$turma->setStatus_turma($status_turma);
			

			# Insert
			if($turma->insert()){
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
		if(isset($_POST['atualizar'])):

			$id = $_POST['id'];
			$nome  = $_POST['nome'];
			$periodo_letivo = $_POST['periodo_letivo'];
			$status_turma = $_POST['status_turma'];

			$turma->setNome($nome);
			$turma->setPeriodo_letivo($periodo_letivo);
			$turma->setStatus_turma($status_turma);

			if($turma->update($id)){
                print_r($turma);
				echo "Atualizado com sucesso!";
			}

		endif;
		?>

        <?php
        if (isset($_GET['acao']) && $_GET['acao'] == 'deletar') :

            $id = (int)$_GET['id'];
      
            if ($turma->delete($id))
            {
                echo "Deletado com sucesso!";
            }

        endif;
        ?>

        <?php
		if(isset($_GET['acao']) && $_GET['acao'] == 'editar'){

			$id = (int)$_GET['id'];

			$resultado = $turma->find($id);
		?>
        <form method="post" action="">
            <div class="input-prepend">
                <span class="add-on"><i class="icon-user"></i></span>
                <input type="text" name="nome" value="<?php echo $resultado->nome; ?>" placeholder="Nome:" />
            </div>
            <div class="input-prepend">
                <span class="add-on"><i class="bi bi-calendar-check-fill"></i></span>
                <input type="text" name="periodo_letivo" value="<?php echo $resultado->periodo_letivo; ?>"
                    placeholder="Periodo letivo:" />
            </div>
            <div class="input-prepend">
                <span class="add-on"><i class="bi bi-check-square-fill"></i></span>
                <input type="text" name="Status_turma" value="<?php echo $resultado->status_turma; ?>"
                    placeholder="Status turma:" />
            </div>
            <input type="hidden" name="id" value="<?php echo $resultado->id; ?>">
            <br />
            <input type="submit" name="atualizar" class="btn btn-primary" value="Atualizar dados">
        </form>
        <?php }else{ ?>
        <form method="post" action="">
            <div class="input-prepend">
                <span class="add-on"><i class="icon-user"></i></span>
                <input type="text" name="nome" placeholder="Nome:" />
            </div>
            <div class="input-prepend">
                <span class="add-on"><i class="bi bi-calendar-check-fill"></i></span>
                <input type="text" name="periodo_letivo" placeholder="Periodo letivo:" />
            </div>
            <div class="input-prepend">
                <span class="add-on"><i class="bi bi-check-square-fill"></i></span>
                <input type="text" name="status_turma" placeholder="Status turma:" />
            </div>
            <br />
            <input type="submit" name="cadastrar" class="btn btn-primary" value="Cadastrar dados">
        </form>
        <?php } ?>
        <table class="table table-hover">

            <thead>
                <tr>
                    <!-- <th>#</th> -->
                    <th>Nome:</th>
                    <th>Periodo letivo:</th>
                    <th>Status da turma:</th>
                </tr>
            </thead>
            <?php foreach($turma->findAll() as $key => $value): ?>
            <tbody>
                <tr>
                    <!-- <td><?php echo $value->id; ?></td> -->
                    <td><?php echo $value->nome; ?></td>
                    <td><?php echo $value->periodo_letivo; ?></td>
                    <td><?php echo $value->status_turma; ?></td>
                    <td>
                        <?php echo "<a href='cadastro_turma.php?acao=editar&id=" . $value->id . "'>Editar</a>"; ?>
                        <?php echo "<a href='cadastro_turma.php?acao=deletar&id=" . $value->id . "' onclick='return confirm(\"Deseja realmente deletar?\")'>Deletar</a>"; ?>
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