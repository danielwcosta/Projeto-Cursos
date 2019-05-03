<?php
    require "req/dataBase.php";
    require "req/funcoesLogin.php";
    include "inc/head.php";
    
    if($_REQUEST) {
        // pegando os valores dos inputs
        $email = $_REQUEST["email"];
        $senha = $_REQUEST["senha"];
        // verificando se o usuario esta logado através da função
        $infoLogado = logarUsuario($email, $senha);

        if($infoLogado == true) {
            
            // criando a sessão
            session_start();

            // criando o campo nome ne sessão
            $_SESSION["nome"] = $infoLogado['nomeUsuario'];

            // criando o campo email
            $_SESSION["email"] = $email;

            // criando o campo nivelAcesso
            $_SESSION["nivelAcesso"] = $infoLogado['tipoUsuario'];

            // criando o campo logado na sessão
            $_SESSION["logado"] = true;

            // redirecionando o usuario para o index.php
            header ("location: index.php");
        }   else {
            $erro = "Seu usuario não foi encontrado!";
        }
    }
?>

<div class="page-center">
    <h2>Login</h2>
        <!-- mostra a menssagem de erro caso a variavel $erro esteja definida -->
        <?php if (isset($erro)) :?>
            <div class="alert alert-danger">
                <span> <?php echo $erro; ?></span>
            </div>
        <?php endif; ?>
        <form action="login.php" method="post" class="col-md-7">
            <div class="col-md-12">
                <label for="inputEmail">Email</label>
                <input type="email" name="email" class="form-control" id="inputEmail">
            </div>
            <div class="col-md-12">
                <label for="inputSenha">Senha</label>
                <input type="password" name="senha" class="form-control" id="inputSenha">
            </div>
            <div class="col-md-12">
                <button class="btn btn-primary" type="submit">Entrar</button>
                <a href="cadastro.php" class="col-md-offset-9">Fazer Cadastro!</a>
            </div>
        </form>
</div>



<?php 
    include "inc/footer.php";
?>