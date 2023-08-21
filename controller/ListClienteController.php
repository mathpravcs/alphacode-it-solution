<?php
include('../class/Cliente.php');

$clienteRepository = new Cliente();

$page       = array_key_exists('page', $_GET) ? $_GET['page'] : 1;
$totalClientes = $clienteRepository->getTotalClientes();

$clientes = $clienteRepository->getClientes($page);

require_once('../assets/views/index.php');