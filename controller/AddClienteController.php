<?php
include('../class/Cliente.php');
$clienteRepository = new Cliente();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $nome = $_POST['Nome'];
    $email = $_POST['Email'];
    $dataNascimento = $_POST['DataNascimento'];
    $profissao= $_POST ['Profissao'];
    $telefone = $_POST ['telefone'];
    $celular = $_POST['celular'];
    $cep = $_POST['cep'];
    $rua = $_POST ['rua'];
    $numero = $_POST ['numero'];
    $complemento =$_POST ['complemento'];
    $bairro = $_POST['bairro'];
    $cidade=$_POST['cidade'];
    $estado = $_POST ['estado'];

    $preferenciaEmail = 0;
    if (array_key_exists('preferencia_email', $_POST)) {
        $preferenciaEmail = 1;
    }

    $preferenciaCelular = 0;
    if (array_key_exists('celularWhatsapp', $_POST)) {
        $preferenciaCelular = 1;
    }

    $preferenciaSms = 0;
    if (array_key_exists('preferenciaSms', $_POST)) {
        $preferenciaSms = 1;
    }

   

    $clienteRepository->createCliente($nome, $email, $dataNascimento,$profissao,$telefone,$celular,$cep,$rua,$numero,$complemento,$bairro,$cidade,$estado,$preferenciaEmail,$preferenciaCelular,$preferenciaSms);

    return header('Location: /controller/ListClienteController.php');  
}
require_once('../assets/views/create.php');
?>