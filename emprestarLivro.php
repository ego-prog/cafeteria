<?php
header('Content-Type: text/html; charset=utf-8');
$arq0="senhas.php";
$arq = "RegistroDeEmprestimos.txt";
$arq1 = "validaUsr";
$arq2 = "emprestarLivro.php";
$arq3="sair.php";
require_once("$arq0");
include "head.php";

echo <<<_SAIR
<div class="container-fluid">
<div class="row">
		<div class="col-md-4">
			<br>
			<form name = "sair" action="$arq3" method="post">
				<button type="submit" name="button" class="btn btn-danger">Sair</button>
			</form>
			<br>
		</div>
		<div class="col-md-4">
		</div>
		<div class="col-md-4">
		</div>
</div>
_SAIR;

if ($_usuarioDigitado = '' or $senhaDigitada = '')
	header("Location: $arq1");
else
{
	$tab="livros";

	$conexão = new mysqli($servidor, $usuario, $senha, $bd);
	if ($conexão->connect_error) die($conexão->connect_error);

	$tombo = mostraLivros($tab, $arq2, $conexão);

	// $handle ---> modo a+: escrita; cursor no fim; o texto existente não é sobrescrito
	$handle = fopen("$arq","a+");

	if($tombo!=0) {
		echo "<br> Gravando em arquivo:<br>";
		echo "<br>------------------------------------------------------------------------------";

		fwrite($handle,"Livro: $tombo\n>");
		fclose($handle);

		echo "<br>";
		echo "O livro de tombo $tombo foi emprestado";
		echo "<br>------------------------------------------------------------------------------";
		echo "<br>";
	}

}

function mostraLivros($tab, $arq, $conexão)
{
		//  ************* Mostrar os livros existentes *************
		$query= "SELECT * FROM $tab";
		$resultado = $conexão->query($query);
		if (!$resultado) die ("Erro de acesso à base de dados: " . $conexão->error);
		$linhas = $resultado->num_rows;
		$falta=3;
		echo '<div class="row">';
		for ($j = 0 ; $j < $linhas ; ++$j)
		{
		$resultado->data_seek($j);
		$linha = $resultado->fetch_array(MYSQLI_NUM);
        $falta--;
        if($falta<0)
            $falta = 2;
		echo <<<_TEXTO
        <div class="col-md-4">
        <fieldset class="scheduler-border">
		<pre>
		Autor	$linha[0]
		Título	$linha[1]
		Área	$linha[2]
		Ano	$linha[3]
		Tombo	$linha[4]
		<form name = "emprestar" action="$arq" method="post"><input type ="hidden" name="Tombo" value="$linha[4]">
		<button type="submit" name="button" class="btn btn-primary">Emprestar</button></form>
		</pre>
        </fieldset>
        </div>
_TEXTO;
if((($j+1)%3)==0)
{
    echo '</div> <div class="row">';
}
		}
        for ($i = 0 ; $i < $falta ; ++$i)
		{
            echo '<div class="col-md-4"> </div>';
        }
        echo '</div> <div class="row">';
        if (isset ($_POST['Tombo'])) $tombo = $_POST['Tombo'];
		else $tombo = "0";
	        return ($tombo);
}?>
<?php
	echo '</div>';
	include 'foot.php';
?>