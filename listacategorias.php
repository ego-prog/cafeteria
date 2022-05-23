<?php
    include 'head.php';
?>

<?php
echo <<<_BODY

<div class="row">
        <div class="col-md-12">
            <h1> Cadastro de Bebidas</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <a class="btn btn-outline-danger" href="index.php">Voltar</a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Descrição</th>
                        <th scope="col">Valor</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($ListaBebidas = $dadosbebidas->fetch_object()) { ?>
                        <tr>
                            <th scope="row"><?php echo $ListaBebidas->id; ?></th>
                            <td><?php echo $ListaBebidas->descricao; ?></td>
                            <td><?php echo $ListaBebidas->valor; ?></td>

                            <td>
                                <a class="btn btn-primary" href="#" onclick="javascript: if (confirm('Você realmente deseja excluir este cliente?'))location.href='../controller/bebidasControler.php?id=<?php echo $ListaBebidas->codigo; ?>&acao=editar'">
                                    Editar</a>

                                <a class="btn btn-danger" href="#" onclick="javascript: if (confirm('Você realmente deseja excluir este cliente?'))location.href='../controller/bebidasControler.php?id=<?php echo $ListaBebidas->id; ?>&acao=excluir'">
                                    Excluir</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>


_BODY;
?>

<?php
    include 'footer.php';
?>