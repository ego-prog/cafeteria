<?php
if (!isset($_SESSION)) {
    session_start();
}
?>

<?php
include "head.php";
include 'variaveis.php';
?>

<body>
        <div class="container-fluid">
            <?php
                echo <<<_SAIR
                <div class="row">
                    <div class="col-md-12">
                        <form name = "sair" action="$sair" method="post">
                            <button type="submit" name="button" class="btn btn-danger">Sair</button>
                        </form>
                    </div>
                </div>
                _SAIR;
            ?>
            <div class="row">
                <div class="col-md-12">
                    <fieldset class="scheduler-border">
                        <legend class="scheduler-border">Menu</legend>
                        <nav class="navbar navbar-expand-lg navbar-light">
                            <div class="container-fluid">
                                <a class="navbar-brand" href="#"><img src="./img/logo.png" height="120" alt="Logo Lanchonete"></a>
                                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                </button>
                                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                                    <ul class="navbar-nav">
                                        <li class="nav-item">
                                            <a class="nav-link active" aria-current="page" href="#">Novo</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">Fechar Pedido</a>
                                        </li>
                                        <li class="nav-item">
                                        <button type="submit" class="btn btn-primary">Salvar</button>
                                        </li>
                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                Cadastros
                                            </a>
                                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                                <li><a class="dropdown-item" href="index_cliente.php">Clientes</a></li>
                                                <li><a class="dropdown-item" href="index_bebida.php">Bebidas</a></li>
                                                <li><a class="dropdown-item" href="index_adicional.php">Adicionais</a></li>
                                                <li><a class="dropdown-item" href="index_lanche.php">Lanches</a></li>
                                                <li><a class="dropdown-item" href="index_categoria.php">Categorias</a></li>
                                            </ul>
                                        </li>
                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                Relatórios
                                            </a>
                                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                                <li><a class="dropdown-item" href="#">Relatório</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </nav>
                    </fieldset>
                </div>
            </div>
            </div>
    </form>
</body>

</html>