<?php
header('Content-Type: text/html; charset=utf-8');
require_once 'senhas_admin.php';
require_once 'funcoes.php';
$conexão = new mysqli($servidor, $usuario, $senha, $bd);
$tab = "usuarios";
$arq = "cadastraUsuario.php";
$sair = "sair.php";
if ($conexão->connect_error) die($conexão->connect_error);
include 'variaveis.php';
?>

<?php
echo <<< _HTMLCONTENT
<fieldset class="scheduler-border">
<legend class="scheduler-border">Registro de Usuários:</legend>
<pre>
<form action="$arq" method="post">
        Usuário:    <input type="text" name="usuario">
        
        Senha:      <input type="text" name="senha">

        Selecione:  <select name="privilegio" id="privilegio">
                <option value=1>Admistrador</option>
                <option value=2>Caixa</option>
            </select>
        
        <input type = "submit" value="Registrar">
</form>
</pre>
</fieldset>
_HTMLCONTENT;
?>
<?php
echo <<<_SAIR
<br>
<br>
<form name = "sair" action="$sair" method="post">
<button type="submit" name="button" class="btn btn-danger">Sair</button></form>
_SAIR;
?>

<?php
if (
    isset($_POST['usuario'])
    &&
    isset($_POST['senha'])
) {
    $usuario = get_post($conexão, 'usuario');
    $senha     = get_post($conexão, 'senha');
    $privilegio = get_post($conexão, 'privilegio');
    if ($privilegio == $administrador)
        $nivel = "Administrador";
    elseif ($privilegio == $caixa)
        $nivel = "caixa";
    else
        $nivel = "";

    $query    = "INSERT INTO $tab VALUES" . "('$usuario', '$senha', '$privilegio')";

    $resultado     = $conexão->query($query);
    if (!$resultado) echo "Erro ao inserir dados: $query<br>" .
        $conexão->error . "<br><br>";
}
?>

<?php
//  ************* Mostrar os Usuários existentes na tabela                *************
//  ************* Note que o botão de apagar é colocado para cada registro.*************

$query = "SELECT * FROM $tab";

$resultado = $conexão->query($query);

if (!$resultado) die("Erro de acesso à base de dados: " . $conexão->error);

$linhas = $resultado->num_rows;
echo "        ------------------------";
echo "<br>";
echo "Usuários Cadastrados:";
echo "<br>";
for ($j = 0; $j < $linhas; ++$j) {
    $resultado->data_seek($j);
    $linha = $resultado->fetch_array(MYSQLI_NUM);
    if ($linha[2] == $administrador)
        $nivel = "Administrador";
    elseif ($linha[2] == $caixa)
        $nivel = "Caixa";
    else
        $nivel = "Erro de Nível";
    echo <<<_END
<pre>
Usuario:    $linha[0]
Nivel:      $nivel
	
</pre>
	<form action="$arq" method="post">
	<input type="hidden" name="apagar" value="yes">
	<input type="hidden" name="usuario" value="$linha[0]">
	<button type="submit" name="button" class="btn btn-primary">Apagar</button>
	</form>
_END;
    echo "        ------------------------";
}


?>


<?php
// ************* Apagar dados da tabela *************

if (isset($_POST['apagar']) && isset($_POST['usuario'])) {
    $usuario = get_post($conexão, 'usuario');
    $query = "DELETE FROM $tab WHERE `login`='$usuario'";
    $resultado = $conexão->query($query);

    if (!$resultado) echo "Erro ao remover dados: $query<br>" .
        $conexão->error . "<br><br>";
    else
    echo <<<_alerta2
        <script>alert("Usuário Excluído")</script>
    _alerta2;
}

?>