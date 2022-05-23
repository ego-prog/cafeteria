<?php
if (!isset($_SESSION)) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
	<title>Livraria para Programação WEB</title>
	<link rel="stylesheet" href="./css/bootstrap.min.css">
	<link rel="stylesheet" href="./css/bootstrap-icons.css">
	<link rel="stylesheet" href="./css/css.css">

</head>

<body>
	<div class="container h-100">
		<div class="d-flex justify-content-center h-100">
			<div class="user_card">
				<div class="d-flex justify-content-center">
					<div class="brand_logo_container">
						<img src="./img/logo.png" class="brand_logo" alt="Logo">
					</div>
				</div>
                <?php
                    if(isset($_SESSION['error'])){
                        if($_SESSION['error'] == 1)
                            $msg_error = "Usuário e/ou Senha em branco";
                        elseif($_SESSION['error'] == 2)
                        $msg_error = "Usuário e/ou Senha errados";
                        echo <<<_ERROR
                        <div class="alert alert-danger" role="alert">
                        $msg_error
                        </div>
                        _ERROR;
                    };
                ?>
				<div class="d-flex justify-content-center form_container">
					<form name="usr" method="post" action="validaUsr.php">
						<div class="input-group mb-3">
							<div class="input-group-append">
								<span class="input-group-text"><i class="bi bi-person-fill"></i></span>
							</div>
							<input type="text" name="usuario" class="form-control input_user" value=""
								placeholder="Nome">
						</div>
						<div class="input-group mb-2">
							<div class="input-group-append">
								<span class="input-group-text"><i class="bi bi-key-fill"></i></span>
							</div>
							<input type="password" name="senha" class="form-control input_pass" value=""
								placeholder="Senha">
						</div>
						<div class="d-flex justify-content-center mt-3 login_container">
							<button type="submit" name="button" class="btn login_btn">Enviar</button>
						</div>
					</form>
				</div>


			</div>
		</div>
	</div>
   
</body>

</html>