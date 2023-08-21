<?php
include('../class/Cliente.php');
$clienteRepository=new Cliente();
$id=filter_input(INPUT_GET,'id',FILTER_DEFAULT);
$clienteRepository->deleteCliente($id);
return header('Location: /controller/ListClienteController.php');
