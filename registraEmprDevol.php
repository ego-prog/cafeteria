<?php
header('Content-Type: text/html; charset=utf-8');
require_once 'senhas_admin.php';
require_once 'funcoes.php';
$conexão = new mysqli($servidor, $usuario, $senha, $bd);
$tab = "emprestimo";
$arq = "registraEmprDevol.php";
$sair = "sair.php";
if ($conexão->connect_error) die($conexão->connect_error);
?>
<?php
include "head.php";
?>

<?php
echo <<< _HTMLCONTENT

<div class="container-fluid">
<div class="row">
<div class="col-md-4">
<br>
<br>
<form name = "sair" action="$sair" method="post">
<button type="submit" name="button" class="btn btn-danger">Sair</button></form>
</div>
<div class="col-md-4">
</div>
<div class="col-md-4">
</div>
</div>

    <div class="row">
		<div class="col-md-4">
		</div>
		<div class="col-md-4">
        <fieldset class="scheduler-border">
            <legend class="scheduler-border">Registro de Empréstimo / Devolução:</legend>
                <form action="$arq" method="post">
                <pre>
Usuário:    <input type="text" name="usuario">
            
Tombo:      <input type="text" name="tombo">
                
Data Emprestimo:     <input type="date" name="dtEmprestimo">
                
Data Devolução:      <input type="date" name="dtDevolucao">

<input type = "submit" value="Registrar">
                </pre>
                </form>
        </fieldset>
		</div>
		<div class="col-md-4">
		</div>
	</div>

_HTMLCONTENT;
?>

<?php
if (
    isset($_POST['usuario'])
    &&
    isset($_POST['tombo'])
) {
    $usuario = get_post($conexão, 'usuario');
    $tombo     = get_post($conexão, 'tombo');
    isset($_POST['dtEmprestimo']) ? $dtEmprestimo = get_post($conexão, 'dtEmprestimo') : $dtEmprestimo = "";
    isset($_POST['dtDevolucao']) ? $dtDevolucao = get_post($conexão, 'dtDevolucao') : $dtDevolucao = "";


    $query    = "INSERT INTO $tab VALUES" . "(NULL, '$usuario', '$tombo', '$dtEmprestimo', '$dtDevolucao')";

    $resultado     = $conexão->query($query);
    if (!$resultado) echo "Erro ao inserir dados: $query<br>" .
        $conexão->error . "<br><br>";
    echo <<<_alerta

    <div class="row">
    <div class="col-md-4">
    </div>
    <div class="col-md-4">
    <script>alert("Registrado no BD")</script>
    <fieldset class="scheduler-border">
            <legend class="scheduler-border">Registro incluido no BD</legend>
<pre>
Usuario:            $usuario
Tombo:              $tombo
Data Emprestimo:    $dtEmprestimo
Data Devolução:     $dtDevolucao
</pre>
            </fieldset>
    </div>
    <div class="col-md-4">
    </div>
</div>

_alerta;
}
?>
<?php
include 'foot.php';
?>