<?php require 'conexao.php'; ?>
<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>usuário - Criar</title>
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
                Adicionar usuário
                <a href="index.php" class="btn btn-danger float-end">Voltar</a>
              </h4>
            </div>

            <div class="card-body">
              <form action="acoes.php" method="POST">
                
                <div class="mb-3">
                  <label for="nome" class="form-label">Nome</label>
                  <input type="text" name="nome" id="nome" class="form-control">
                </div>

                <div class="mb-3">
                  <label for="email" class="form-label">Email</label>
                  <input type="text" name="email" id="email" class="form-control">
                </div>

                <div class="mb-3">
                  <label for="nascimento" class="form-label">Data de Nascimento</label>
                  <input type="date" name="data_nascimento" id="nascimento" class="form-control">
                </div>

                <div class="mb-3">
                  <label for="senha" class="form-label">Senha</label>
                  <input type="password" name="senha" id="senha" class="form-control">
                </div>

                <div class="mb-3">
                  <button type="submit" name="create_usuario" class="btn btn-primary">Salvar</button>
                </div>

              </form>
            </div>

          </div>
        </div>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
  </body>
</html>
