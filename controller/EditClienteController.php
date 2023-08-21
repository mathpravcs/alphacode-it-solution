
<?php
include('../class/Cliente.php');
$objEvents = new Cliente();


$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
$dadosCliente = $objEvents->getClientesyId($id);


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $nome = $_POST['Nome'];
    $email = $_POST['Email'];
    $dataNascimento = $_POST ['DataNascimento'];
    $profissao= $_POST ['profissao'];
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

    $objEvents->updateCliente($id, $nome, $email, $dataNascimento, $profissao, $telefone, $celular, $cep, $rua, $numero, $complemento, $bairro, $cidade, $estado,$preferenciaEmail,$preferenciaCelular,$preferenciaSms);
}


 


require('../assets/views/update.php');
?>



