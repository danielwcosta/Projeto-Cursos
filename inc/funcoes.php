<?php
// funções

function validarNome($nome){
    return strlen($nome) >0 && strlen($nome) <= 15;         //strlen mostra o tamanho da string
}

function validarCPF($cpf) {
    return strlen($cpf) == 11;
}

function validarNroCartao($nroCartao) {
    $primeiroNumero = substr($nroCartao, 0, 1);
    return $primeiroNumero == 4 || $primeiroNumero == 5 || $primeiroNumero == 6;
}

function validarData($data){
    $dataAtual = date("Y-m");   
    return $data >= $dataAtual;
}

function validarCvv($cvv) {
    return strlen($cvv) == 3;
}

function validarCompra($nome, $cpf, $nroCartao, $data, $cvv) {
   global $erros;

    if (!validarNome($nome)) {
        array_push($erros, "Preencha seu nome");
    }
    if (!validarCPF($cpf)) {
        array_push($erros, "Seu CPF precisa ter 11 caracteres");
    }
    if (!validarNroCartao($nroCartao)) {
        array_push($erros, "Seu cartão precisa começar com 4, 5 ou 6.");
    }
    if (!validarData($data)) {
        array_push($erros, "A validade precisa ser maior que a data atual");
    }
    if (!validarCvv($cvv)) {
        array_push($erros, "Seu CVV precisa ter 3 caracteres");
    }
}
?>