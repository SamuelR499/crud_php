<?php
  session_start();
  require 'conexao.php';
?>
<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>usuário - Editar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
  </head>
  <body>
    <?php include('navbar.php') ?>

    <div class="container mt-5">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            
            <div class="card-header">
              <h4>
                Editar usuário
                <a href="index.php" class="btn btn-danger float-end">Voltar</a>
              </h4>
            </div>

            <div class="card-body">
              <?php 
                if(isset($_GET['id'])) {
                  $usuario_id = mysqli_real_escape_string($conexao, $_GET['id']);
                  $sql = "SELECT * FROM usuarios WHERE id='$usuario_id'";
                  $resultado = mysqli_query($conexao, $sql);

                  if(mysqli_num_rows($resultado) > 0) {
                    $usuario = mysqli_fetch_array($resultado);

              ?>
              <form action="acoes.php" method="POST">
                <input type="hidden" name="usuario_id" value="<?=$usuario['id']?>">
                <div class="mb-3">
                  <label for="nome" class="form-label">Nome</label>
                  <input type="text" name="nome" id="nome" value="<?=$usuario['nome']?>" class="form-control">
                </div>

                <div class="mb-3">
                  <label for="email" class="form-label">Email</label>
                  <input type="text" name="email" id="email" value="<?=$usuario['email']?>" class="form-control">
                </div>

                <div class="mb-3">
                  <label for="nascimento" class="form-label">Data de Nascimento</label>
                  <input type="date" name="data_nascimento" id="nascimento" value="<?=$usuario['data_nascimento']?>" class="form-control">
                </div>

                <div class="mb-3">
                  <label for="senha" class="form-label">Senha</label>
                  <input type="password" name="senha" id="senha" class="form-control">
                </div>

                <div class="mb-3">
                  <button type="submit" name="update_usuario" class="btn btn-primary">Salvar</button>
                </div>

              </form>
              <?php
                  } else {
                    echo "<h4>Usuário não encontrado</h4>";
                  }
                }
              ?>
            </div>

          </div>
        </div>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
  </body>
</html>
