<?php
if (!isset($_SESSION)) {
    session_start();
}
?>
<?php
include 'variaveis.php';

//$_SESSION['usuarioDigitado'] = '';
//$_SESSION['senhaDigitada'] = '';
$usuarioDigitado = '';
$senhaDigitada = '';

session_destroy();
header("Location: $HOME");
?>