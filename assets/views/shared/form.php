<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Form</title>
</head>
<body>
    <div class="container mt-5">
        <form action="/controller/AddClienteController.php" method="post">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="nome" class="form-label">Nome:</label>
                    <input type="text" name="Nome" class="form-control" required value="<?php echo @$nome; ?>">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" name="Email" class="form-control" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="profissao" class="form-label">Profissão:</label>
                    <input type="text" name="Profissao" class="form-control">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="telefone" class="form-label">Telefone:</label>
                    <input type="tel" name="telefone" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="celular" class="form-label">Celular:</label>
                    <input type="tel" name="celular" class="form-control">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="data_de_nascimento" class="form-label">Data de Nascimento:</label>
                    <input type="date" name="DataNascimento" class="form-control" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="cep" class="form-label">CEP:</label>
                    <input type="text" name="cep" id="cep" class="form-control" data-mask="00000-000" maxlength="9">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="rua" class="form-label">Rua:</label>
                    <input type="text" name="rua" id="rua" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="numero" class="form-label">Número:</label>
                    <input type="text" name="numero" id="numero" class="form-control">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="complemento" class="form-label">Complemento:</label>
                    <input type="text" name="complemento" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="bairro" class="form-label">Bairro:</label>
                    <input type="text" name="bairro" id="bairro" class="form-control">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="cidade" class="form-label">Cidade:</label>
                    <input type="text" name="cidade" id="cidade" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="estado" class="form-label">Estado:</label>
                    <input type="text" name="estado" id="estado" class="form-control">
                </div>
            </div>

<!-- Checkbox section -->
<div class="row">
    <div class="col-md-6 mb-3">
        <label class="form-label">Preferências:</label>
        <div class="row">
        <div class="col-md-4">
    <div class="form-check form-check-lg">
        <input class="form-check-input" type="checkbox" name="preferencia_email" value="1" id="preferencia1">
        <label class="form-check-label" for="preferencia1">
            Enviar notificações por E-mail
        </label>
    </div>
</div>
            <div class="col-md-4">
                <div class="form-check form-check-lg">
                    <input class="form-check-input" type="checkbox" name="celularWhatsapp" value="1" id="preferencia2">
                    <label class="form-check-label" for="preferencia2">
                        Número de celular possui Whatsapp
                    </label>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-check form-check-lg">
                    <input class="form-check-input" type="checkbox" name="preferenciaSms" value="1" id="preferencia3">
                    <label class="form-check-label" for="preferencia3">
                        Enviar notificações por SMS
                    </label>
                </div>
            </div>
        </div>
    </div>
</div>


            <button type="submit" class="btn btn-primary">Criar</button>
            <a href="/controller/ListClienteController.php" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            $("#cep").blur(function() {
                
                var cep = $(this).val().replace(/\D/g, '');
               
                if (cep.length === 8) {
                    $.getJSON(`https://viacep.com.br/ws/${cep}/json/`, function(data) {
                        if (!("erro" in data)) {
                            $("#rua").val(data.logradouro);
                            $("#bairro").val(data.bairro);
                            $("#cidade").val(data.localidade);
                            $("#estado").val(data.uf);
                            $("#numero").focus();
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'CEP não encontrado.'
                            });
                        }
                    }).fail(function() {
                        Swal.fire({
                            icon: 'error',
                            title: 'Erro',
                            text: 'Erro ao buscar o CEP.'
                        });
                    });
                } else {
                    Swal.fire({
                        icon: 'warning',
                        title: 'CEP inválido',
                        text: 'O CEP deve ter 8 dígitos.'
                    });
                }
            });
          
        
            
    
        });
    </script>
</body>
</html>
