<?php include('../assets/views/shared/header.php'); ?>
<link rel="stylesheet" href="/lib/css/listing.css">
<div class="container">
    <h2 class="mt-4">Lista de Usuarios </h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Data de Nascimento</th>
                <th>E-mail</th>
                <th>Celular para Contato</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($clientes as $cliente): ?>
            <tr>
            <td><?php echo $cliente['Nome']; ?></td>
            <td><?php echo date('d/m/Y', strtotime($cliente['DataNascimento'])); ?></td>
                <td><?php echo $cliente['Email']; ?></td>
                <td><?php echo $cliente['celular']; ?></td>
                <td><a href="/controller/EditClienteController.php?id=<?php echo $cliente['id']; ?>"title ="Editar">
                        <img src='../assets/imagens/editar.png' alt="Visualizar" />
                    </a> 
                    <a href="#" data-bs-toggle="modal" data-bs-target="#deleteModal<?php echo $cliente['id']; ?>" title="Excluir">
        <img src='../assets/imagens/excluir.png' alt="Excluir" />
    </a>

    <!-- Modal for Delete Confirmation -->
    <div class="modal fade" id="deleteModal<?php echo $cliente['id']; ?>" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Confirmar Exclusão</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Tem certeza de que deseja excluir este usuário?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <a href="/controller/DeleteClienteController.php?id=<?php echo $cliente['id']; ?>" class="btn btn-danger">Excluir</a>
                </div>
            </div>
        </div>
    </div>
</td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="row">
        <div class="col-6">
        <a href="/controller/AddClienteController.php" class="btn btn-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Adicionar usuário">
  <i class="fa fa-plus"></i>
</a>
        </div>
        <div class="col-6">
        <nav aria-label="...">
  <ul class="pagination pagination-sm">
    <?php if ($page > 1): ?>
      <li class="page-item">
        <a class="page-link" href="/controller/ListClienteController.php?page=<?php echo $page - 1; ?>" aria-label="Previous">
          <span aria-hidden="true">&laquo;</span>
        </a>
      </li>
    <?php endif; ?>
    
    <li class="page-item active" aria-current="page">
      <span class="page-link"><?php echo $page; ?></span>
    </li>
    
    <?php if ($page < $totalClientes / 10): ?>
      <li class="page-item">
        <a class="page-link" href="/controller/ListClienteController.php?page=<?php echo $page + 1; ?>" aria-label="Next">
          <span aria-hidden="true">&raquo;</span>
        </a>
      </li>
    <?php endif; ?>
  </ul>
</nav>
</div>

    </div>
    
<?php include('../assets/views/shared/footer.php'); ?>
</div>







