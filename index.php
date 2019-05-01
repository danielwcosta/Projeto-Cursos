<?php
include "inc/head.php";
include "inc/header.php";
include "req/database.php";

try {
    $conexao = new PDO($dsn,$db_user, $db_pass); //Abre conexão


    $query = $conexao->query('SELECT * FROM cursos');// consulta banco de dados

    $cursos = $query->fetchAll(PDO::FETCH_ASSOC);//traz todas as linhas em array associativo
    var_dump($cursos);

}catch( PDOException $Exception){
    echo $Exception->getMessage();
}
    // $nomeCurso1 = "Full Stack";
    // $descricaoCurso1 = "Curso de desenvolvimento web";
    // $valorCurso1 = 1000.99;
    // $imagemCurso1 = "full.jpeg";

    // $nomeCurso2 = "Marketing Digital";
    // $descricaoCurso2 = "Curso de Marketing";
    // $valorCurso2 = 1000.98;
    // $imagemCurso2 = "marketing.jpg";

    // $cursos = [
    //     "Full Stack" => ["Curso de desenvolvimento web",1000.99,"full.jpeg","fullstack"],
    //     "Marketing" => ["Marketing Digital",1000.98,"marketing.jpg","marketing"],
    //     "UX" => ["Curso de User Experience",9000.98,"ux.jpg","ux"],
    //     "Mobile Android" => ["Curso de apps",100.97,"android.png","android"]
    // ];

?>

    

    <div class="container">
        <div class="row">
            <?php foreach ($cursos as $key => $infosCurso) : ?>
                <div class="col-sm-6 col-md-6">
                    <div class="thumbnail">
                        <!-- imagem curso -->
                        <img src="assets/img/<?php echo $infosCurso['image']; ?>" alt="Foto curso <?php echo  $infosCurso['nome']; ?>">
                                <div class="caption">
                            <h3><?php echo $infosCurso['nome']; ?></h3>
                            <!-- descriçao cruso -->
                            <p><?php echo $infosCurso['descricao']; ?></p>
                            <!-- Valor curso -->
                            <p>R$ <?php echo $infosCurso['preco']; ?></p>
                            <a href="#" class="btn btn-info" data-toggle="modal" data-target="#<?php echo $infosCurso['tag']; ?>" role="button">Comprar</a>
                        </div>
                    </div>
                </div>
            <?php endforeach;?>

            <?php foreach ($cursos as $key => $infosCurso) : ?>
            <!-- Modal -->
            <div class="modal fade" id="<?php echo $infosCurso['tag']; ?>" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Preecha os seus dados</h4>
                        </div>
                        <div class="modal-body">
                            <h4> Curso de: <?php echo $infosCurso['nome']; ?></h4>   
                            <h4>Preço: R$ <?php echo $infosCurso['preco']; ?></h4>
                            <form action="validarCompra.php" method="post">
                                <input id="nomeCurso" name="nomeCurso" type="hidden" value="<?php echo $nomeCurso; ?>">    
                                <input id="nomeCurso" name="precoCurso" type="hidden" value="<?php echo $infosCurso[1]; ?>">    
                               
                                <div class="input-group col-md-5">
                                    <label for="nomeCompleto">Nome Completo</label>
                                    <input id="nomeCompleto" name="nomeCompleto" type="text" class="form-control">
                                </div>
                                <div class="input-group col-md-5">
                                    <label for="CPF">CPF</label>
                                    <input id="cpf" name="cpf" type="number" class="form-control">
                                </div>
                                <div class="input-group col-md-5">
                                    <label for="nroCartao">Número do Cartão</label>
                                    <input id="nroCartao" name="nroCartao" type="number" class="form-control">
                                </div>
                                <div class="input-group col-md-5">
                                    <label for="validade">Validade</label>
                                    <input id="validade" name="validade" type="month" class="form-control">
                                </div>
                                <div class="input-group col-md-5">
                                    <label for="cvv">CVV</label>
                                    <input id="cvv" name="cvv" type="number" class="form-control">
                                </div>
                                <button class="btn btn-primary"type="submit">Comprar</button>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>

                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>

<?php include "inc/footer.php"; ?>

   