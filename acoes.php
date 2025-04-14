<?php
session_start();
require 'conexao.php';

try {
    if (isset($_POST['create_usuario'])) {
        $nome = !empty($_POST['nome']) ? "'" . mysqli_real_escape_string($conexao, trim($_POST['nome'])) . "'" : "NULL";
        $email = !empty($_POST['email']) ? "'" . mysqli_real_escape_string($conexao, trim($_POST['email'])) . "'" : "NULL";
        $data_nascimento = !empty($_POST['data_nascimento']) ? "'" . mysqli_real_escape_string($conexao, trim($_POST['data_nascimento'])) . "'" : "NULL";
        $senha = !empty($_POST['senha']) 
            ? "'" . mysqli_real_escape_string($conexao, password_hash(trim($_POST['senha']), PASSWORD_DEFAULT)) . "'" 
            : "NULL";

        $sql = "INSERT INTO usuarios (nome, email, data_nascimento, senha) 
                VALUES ($nome, $email, $data_nascimento, $senha)";

        mysqli_query($conexao, $sql);

        $_SESSION['mensagem'] = "Usuário adicionado com sucesso!";
        header('Location: index.php');
        exit;
    }
} catch (mysqli_sql_exception $e) {
    $_SESSION['mensagem'] = "Erro ao adicionar usuário: " . $e->getMessage();
    header('Location: index.php');
    exit;
}

try {
    if (isset($_POST['update_usuario'])) {
        $usuario_id = mysqli_real_escape_string($conexao, $_POST['usuario_id']);

        $nome = !empty($_POST['nome']) ? "'" . mysqli_real_escape_string($conexao, trim($_POST['nome'])) . "'" : "NULL";
        $email = !empty($_POST['email']) ? "'" . mysqli_real_escape_string($conexao, trim($_POST['email'])) . "'" : "NULL";
        $data_nascimento = !empty($_POST['data_nascimento']) ? "'" . mysqli_real_escape_string($conexao, trim($_POST['data_nascimento'])) . "'" : "NULL";
        $senha = mysqli_real_escape_string($conexao, trim($_POST['senha']));

        $sql = "UPDATE usuarios SET 
                nome = $nome, 
                email = $email, 
                data_nascimento = $data_nascimento" .
                (!empty($senha) ? ", senha = '" . password_hash($senha, PASSWORD_DEFAULT) . "'" : "") .
                " WHERE id = '$usuario_id'";

        mysqli_query($conexao, $sql);

        if (mysqli_affected_rows($conexao) > 0) {
            $_SESSION['mensagem'] = "Usuário atualizado com sucesso!";
        header('Location: index.php');
        exit;
        } else {
            $_SESSION['mensagem'] = "Nenhuma alteração feita no usuário.";
            header('Location: index.php');
            exit;
        }
        
    }
} catch (mysqli_sql_exception $e) {
    $_SESSION['mensagem'] = "Erro ao atualizar usuário: " . $e->getMessage();
    header('Location: index.php');
    exit;
}

if (isset($_POST['delete_usuario'])) {
    $usuario_id = mysqli_real_escape_string($conexao, $_POST['delete_usuario']);

    $sql = "DELETE FROM usuarios WHERE id = '$usuario_id'";
    mysqli_query($conexao, $sql);

    if (mysqli_affected_rows($conexao) > 0) {
        $_SESSION['mensagem'] = "Usuário excluído com sucesso!";
        header('Location: index.php');
        exit;
    } else {
        $_SESSION['mensagem'] = "Erro ao excluir usuário.";
        header('Location: index.php');
        exit;
    }

}

?>

