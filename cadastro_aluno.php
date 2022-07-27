<!DOCTYPE HTML>
<html land="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>PHPOO-PDO</title>
    <meta name="description" content="PHP OO PDO" />
    <meta name="robots" content="index, follow" />
    <link rel="stylesheet" href="css/bootstrap.css" />
    <link rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <!--[if lt IE 9]>
      <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
   <![endif]-->
</head>

<body>

    <div class="container">

        <?php
                require './classes/Aluno.php';
				require './classes/Turma.php';
                
	
		$aluno = new Aluno();

		if(isset($_POST['cadastrar'])):

			$nome  = $_POST['nome'];
			$matricula  = $_POST['matricula'];
			$telefone  = $_POST['telefone'];
			$email = $_POST['email'];
			$senha = $_POST['senha'];

			$aluno->setNome($nome);
			$aluno->setMatricula($matricula);
			$aluno->setTelefone($telefone);
			$aluno->setEmail($email);
			$aluno->setSenha($senha);

			# Insert
			if($aluno->insert()){
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
			$matricula  = $_POST['matricula'];
			$telefone  = $_POST['telefone'];
			$email = $_POST['email'];
			$senha = $_POST['senha'];
			$turma_id = $_POST['turma_id'];

			$aluno->setNome($nome);
			$aluno->setMatricula($matricula);
			$aluno->setTelefone($telefone);
			$aluno->setEmail($email);
			$aluno->setSenha($senha);
			$aluno->setturma_id($turma_id);
			

			if($aluno->update($id)){
				//print_r($aluno);

				echo "Atualizado com sucesso!";
			}

		endif;
		?>

        <?php
		if(isset($_GET['acao']) && $_GET['acao'] == 'deletar'):

			$id = (int)$_GET['id'];
			if($aluno->delete($id)){
				echo "Deletado com sucesso!";
			}

		endif;
		?>

        <?php
		if(isset($_GET['acao']) && $_GET['acao'] == 'editar'){

			$id = (int)$_GET['id'];
			$resultado = $aluno->find($id);
		?>

        <form method="post" action="">
            <div class="input-prepend">
                <span class="add-on"><i class="icon-user"></i></span>
                <input type="text" name="nome" value="<?php echo $resultado->nome; ?>" placeholder="Nome:" />
            </div>
            <div class="input-prepend">
                <span class="add-on"><i class="bi bi-123"></i></span>
                <input type="text" name="matricula" value="<?php echo $resultado->matricula; ?>"
                    placeholder="Matricula:" />
            </div>
            <div class="input-prepend">
                <span class="add-on"><i class="bi bi-telephone-inbound-fill"></i></span>
                <input type="text" name="telefone" value="<?php echo $resultado->telefone; ?>"
                    placeholder="Telefone:" />
            </div>
            <div class="input-prepend">
                <span class="add-on"><i class="icon-envelope"></i></span>
                <input type="text" name="email" value="<?php echo $resultado->email; ?>" placeholder="E-mail:" />
            </div>
            <div class="input-prepend">
                <span class="add-on"><i class="bi bi-key-fill"></i></span>
                <input type="password" name="senha" value="<?php echo $resultado->senha; ?>" placeholder="Senha:" />
            </div>
            <div class="input-prepend">
                <span class="add-on"><i class="bi bi-people-fill"></i></span>
                <select name="turma_id" id="">
                    <option selected>Turma:</option>
                    <?php 
					$turma = new Turma();
					foreach ($turma->findAll() as $key => $value) { ?>
                    <option value="<?php echo $value->id; ?>"><?php echo $value->nome; ?>
                        <?php echo $value->periodo_letivo; ?></option>
                    <?php }?>

                </select>
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
                <span class="add-on"><i class="bi bi-123"></i></span>
                <input type="text" name="matricula" placeholder="Matricula:" />
            </div>
            <div class="input-prepend">
                <span class="add-on"><i class="bi bi-telephone-inbound-fill"></i></span>
                <input type="text" name="telefone" placeholder="Telefone:" />
            </div>
            <div class="input-prepend">
                <span class="add-on"><i class="icon-envelope"></i></span>
                <input type="email" name="email" placeholder="E-mail:" />
            </div>
            <div class="input-prepend">
                <span class="add-on"><i class="bi bi-key-fill"></i></span>
                <input type="password" name="senha" placeholder="Senha:" />
            </div>
            <div class="input-prepend">
                <span class="add-on"><i class="bi bi-people-fill"></i></span>
                <select name="turma_id" id="">
                    <option selected>Turma:</option>
                    <?php 
					$turma = new Turma();
					foreach ($turma->findAll() as $key => $value) { ?>
                    <option value="<?php echo $value->id; ?>"><?php echo $value->nome; ?>
                        <?php echo $value->periodo_letivo; ?></option>
                    <?php }?>
                </select>
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
                    <th>Matricula:</th>
                    <th>Telefone:</th>
                    <th>E-mail:</th>
                    <!-- <th>Senha:</th> -->
                    <th>Ações:</th>
                </tr>
            </thead>

            <?php foreach($aluno->findAll() as $key => $value): ?>

            <tbody>
                <tr>
                    <!--  <td><?php echo $value->id; ?></td> -->
                    <td><?php echo $value->nome; ?></td>
                    <td><?php echo $value->matricula; ?></td>
                    <td><?php echo $value->telefone; ?></td>
                    <td><?php echo $value->email; ?></td>
                    <!-- <td><?php echo $value->senha; ?></td> -->
                    <td>
                        <?php echo "<a href='cadastro_aluno.php?acao=editar&id=" . $value->id . "'>Editar</a>"; ?>
                        <?php echo "<a href='cadastro_aluno.php?acao=deletar&id=" . $value->id . "' onclick='return confirm(\"Deseja realmente deletar?\")'>Deletar</a>"; ?>
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