<?php 
    include "inc/head.php";
    include "inc/header.php";
    include "inc/funcoes.php";

    //variaveis
    $nome = $_REQUEST["nomeCompleto"];
    $cpf = $_REQUEST["cpf"];
    $nroCartao = $_REQUEST["nroCartao"];
    $validade = $_REQUEST["validade"];
    $cvv = $_REQUEST["cvv"];
    $nomeCurso = $_REQUEST["nomeCurso"];
    $precoCurso = $_REQUEST["precoCurso"];
    $erros = [];


    validarCompra($nome, $cpf, $nroCartao, $validade, $cvv);

    //  var_dump(validarNome($nome));
    //  var_dump(validarCPF($cpf));
    //  var_dump(validarnroCartao($nroCartao));
    //  var_dump(validarData($validade));
    //  var_dump(validarCvv($cvv));


   
?>


    <div class="container">
        <div class="col-md-6 col-md-offset-3">
            <?php if (count($erros) > 0) : ?>
                <div class="panel panel-danger">
                    <div class="panel-heading">
                        <span>Preecha seus dados corretamente!</span>
                    </div>
                    <div class="panel-body">
                        <ul class="list-group">
                            <?php foreach ($erros as $chave => $valorErro) : ?> 
                                <li class="list-group-item">
                                    <?= $valorErro; ?> 
                                </li>
                            <?php endforeach; ?>    
                        </ul>
                        <div class="center">
                            <a href="index.php">Voltar para home</a>
                        </div>
                    </div>
                </div>  
            <?php else : ?>      
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <span>Compra realizada com sucesso!</span>
                    </div>
                    <div class="panel-body">
                        <ul class="list-group">
                            <li class="list-group-item"><strong>Nome Curso: </strong> <?= $nomeCurso; ?></li>
                            <li class="list-group-item"><strong>Preço: R$</strong> <?= $precoCurso; ?></li>
                            <li class="list-group-item"><strong>Nome Completo: </strong> <?php echo $nome; ?></li>
                        </ul>
                        <div class="center">
                            <a href="index.php">Voltar para home</a>
                        </div>
                    </div>
                </div>      
            <?php endif; ?>
        </div>
    
    </div>
<?php include "inc/footer.php"; ?>