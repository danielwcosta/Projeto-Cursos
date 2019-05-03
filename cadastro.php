<?php 
    require "req/database.php";
    require "req/funcoesLogin.php";
    include "inc/head.php";

    if($_REQUEST){
        $nome = $_REQUEST["nome"]; // REQUEST funciona com GET e POST
        $email = $_REQUEST["email"];
        $senha = $_REQUEST["senha"];
        $confirmarSenha = $_REQUEST["confirmarSenha"];
        
        //testes
        // $cadastro = md5($senha);
        // $login = md5($senha);
        // echo $cadstro . "<br>";
        // echo $login;
        // // exit;
        // $hash = password_hash($senha, PASSWORD_DEFAULT);
        // echo $hash;
        // exit;
            // verifica se a senha é igual a confirmar senha
            if ($senha == $confirmarSenha) {
                // criptografando a senha
                $senhaCript = password_hash($senha, PASSWORD_DEFAULT);
                
                // criando um novo usuario
                $novoUsuario = [
                    "nome" => $nome,
                    "email" => $email,
                    "senha" => $senhaCript,
                ];

                // cadastra meu usuario no json
                $cadastrou = cadastrarUsuario($novoUsuario);
            } else{
                $erro = "Senhas incopativeis";
            }


    }
?>
    <div class="page-center">
        <h2>Cadastre-se</h2>
        <!-- Verifica se a variavel cadastrou foi definida -->
        <?php if(isset($cadastrou) && $cadastrou) : ?>
            <div class="alert alert-success" role="alert">
                <span> Usuario cadastrado com sucesso!!</span>
            </div>
        <!-- Verifica se a variavel erro foi definida -->
        <?php elseif (isset($erro)) : ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $erro; ?>
            </div>

        <?php endif;?>
        <form action="cadastro.php" method="post" class="col-md-7">
            <div class="col-md-12">
                <label for="inputNome">Nome</label>
                <input type="text" name="nome" class="form-control" id="inputNome">
            </div>
            <div class="col-md-12">
                <label for="inputEmail">Email</label>
                <input type="email" name="email" class="form-control" id="inputEmail">
            </div>
            <div class="col-md-12">
                <label for="inputSenha">Senha</label>
                <input type="password" name="senha" class="form-control" id="inputSenha">
            </div>
            <div class="col-md-12">
                <label for="inputConfirmarSenha">Confirme sua senha</label>
                <input type="password" name="confirmarSenha" class="form-control" id="inputConfirmarSenha">
            </div>
            <div class="col-md-12">
                <button class="btn btn-primary" type="submit">Cadastrar</button>
                <a href="login.php" class="col-md-offset-9">Fazer Login!</a>
            </div>
        </form>
    </div>

<?php 
    include "inc/footer.php"
?>