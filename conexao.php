<?php 
define('HOST', '127.0.0.1');
define('USER', 'root');
define('PASSWORD', '');
define('DB', 'canalti');

$conexao = mysqli_connect(HOST, USER, PASSWORD, DB) or die("Erro de conexão: " . mysqli_connect_error());
if (!$conexao) {
    die("Connection failed: " . mysqli_connect_error());
} else {
    // echo "Connected successfully";
}
?>