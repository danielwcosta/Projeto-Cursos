<?php
    // definindo o nome do arquivo
    $nomeArquivo = "usuarios.json";

    function cadastrarUsuario($usuario){
        // pegando a variavel para dentro da funcao
        global $nomeArquivo;
        
        // pegando o conteudo do arquivo usuarios.json e jogando na variavel $usuariosJson
        $usuariosJson = file_get_contents($nomeArquivo);
        
        // transformando o json em array associativo
        $arrayUsuarios = json_decode($usuariosJson, true);
        
        // adicionando um novo usuario para o array associativo
        array_push($arrayUsuarios["usuarios"], $usuario);
        
        //transformando o array associativo em json
        $usuariosJson = json_encode($arrayUsuarios);

            //colocando o json de volta para o arquivo usuario.json e faz uma validaçao gera um true ou false
        $cadastrou = file_put_contents($nomeArquivo,$usuariosJson);

        // retornando true ou false
        return $cadastrou;
    }

    function logarUsuario($email,$senha) {
        global $nomeArquivo;
        $nomeLogado = "";
        // pegando o conteudo do arquivo usuarios.json
        $usuariosJson = file_get_contents($nomeArquivo);
        
        // transformando o json em array associativo
        $arrayUsuarios = json_decode($usuariosJson, true);
        
        // verificando se o usuario existe no arquivo usuario.json
        foreach($arrayUsuarios["usuarios"] as $chave => $valor){
            
            // verificando se o email digitado é igual ao email do json
            // verificando se a senha digitada é igual a senha do json
            if ($valor["email"] == $email && password_verify($senha,$valor["senha"])) {
                $nomeLogado = $valor["nome"];
                break;
            }
        }
        return $nomeLogado;
    }

?>