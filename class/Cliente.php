<?php
include('../model/ModelConect.php');

class Cliente extends ModelConect
{
    #Trazer os dados de eventos do banco
    public function getClientes($page)
    {
        $b=$this->conectDB()->prepare("select * from clientes order by id asc limit ". ($page - 1) * 10 . ", 10");
        $b->execute();
        $f = $b->fetchAll(\PDO::FETCH_ASSOC);
        return $f;
    }

    public function getTotalClientes()
    {
        $b=$this->conectDB()->prepare("select count(*) from clientes order by id asc");
        $b->execute();
        $f = $b->fetchAll(\PDO::FETCH_ASSOC);
        return intval($f[0]['count(*)']);
    }

    public function createCliente($nome, $email, $dataNascimento, $profissao, $telefone, $celular, $cep, $rua, $numero, $complemento, $bairro, $cidade, $estado, $preferenciaEmail,$preferenciaCelular,$preferenciaSms)
    {
        $b = $this->conectDB()->prepare("insert into clientes (Nome, Email, DataNascimento, Profissao, telefone, celular, cep, rua, numero, complemento, bairro, cidade, estado, preferenciaEmail,celularWhatsapp,preferenciaSMS) values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?,?)");
        $b->bindParam(1, $nome, \PDO::PARAM_STR);
        $b->bindParam(2, $email, \PDO::PARAM_STR);
        $b->bindParam(3, $dataNascimento, \PDO::PARAM_STR); 
        $b->bindParam(4, $profissao, \PDO::PARAM_STR); 
        $b->bindParam(5, $telefone, \PDO::PARAM_STR); 
        $b->bindParam(6, $celular, \PDO::PARAM_STR); 
        $b->bindParam(7, $cep, \PDO::PARAM_STR);
        $b->bindParam(8, $rua, \PDO::PARAM_STR);
        $b->bindParam(9, $numero, \PDO::PARAM_STR);
        $b->bindParam(10, $complemento, \PDO::PARAM_STR);
        $b->bindParam(11, $bairro, \PDO::PARAM_STR);
        $b->bindParam(12, $cidade, \PDO::PARAM_STR);
        $b->bindParam(13, $estado, \PDO::PARAM_STR);
        $b->bindParam(14, $preferenciaEmail, \PDO::PARAM_STR);
        $b->bindParam(15, $preferenciaCelular, \PDO::PARAM_STR);
        $b->bindParam(16, $preferenciaSms, \PDO::PARAM_STR);
        $b->execute();
    }
    

    #buscar clientes pelo id
    public function getClientesyId($id)
    {
        $b=$this->conectDB()->prepare("select * from clientes where id=?");
        $b->bindParam(1, $id, \PDO::PARAM_INT);
        $b->execute();
        return $b->fetch(\PDO::FETCH_ASSOC);
    }

    //
    public function updateCliente($id,$nome, $email, $dataNascimento, $profissao, $telefone, $celular, $cep, $rua, $numero, $complemento, $bairro, $cidade, $estado,$preferenciaEmail,$preferenciaCelular,$preferenciaSms)
    { 
        $dadosExistente = $this->getClientesyId($id);
     
        if (!$dadosExistente) {
            // Trate o caso de ID inválido ou dados não encontrados
            return header('Location: /controller/EditClienteController.php?id=' . $id);
        }

        
        $b = $this->conectDB()->prepare("UPDATE clientes SET Nome=?, Email=?, DataNascimento=?, Profissao=?, telefone=?, Celular=?, cep=?, rua=?, numero=?, complemento=?, bairro=?, cidade=?, estado=?,preferenciaEmail=?,celularWhatsapp=?,preferenciaSMS=? WHERE id=?");       
        $b->bindParam(1, $nome, \PDO::PARAM_STR);
        $b->bindParam(2, $email, \PDO::PARAM_STR);
        $b->bindParam(3, $dataNascimento, \PDO::PARAM_STR); 
        $b->bindParam(4, $profissao, \PDO::PARAM_STR); 
        $b->bindParam(5, $telefone, \PDO::PARAM_STR); 
        $b->bindParam(6, $celular, \PDO::PARAM_STR); 
        $b->bindParam(7, $cep, \PDO::PARAM_STR);
        $b->bindParam(8, $rua, \PDO::PARAM_STR);
        $b->bindParam(9, $numero, \PDO::PARAM_STR);
        $b->bindParam(10, $complemento, \PDO::PARAM_STR);
        $b->bindParam(11, $bairro, \PDO::PARAM_STR);
        $b->bindParam(12, $cidade, \PDO::PARAM_STR);
        $b->bindParam(13, $estado, \PDO::PARAM_STR);
        $b->bindParam(14, $preferenciaEmail, \PDO::PARAM_STR);
        $b->bindParam(15, $preferenciaCelular, \PDO::PARAM_STR);
        $b->bindParam(16, $preferenciaSms, \PDO::PARAM_STR);
        $b->bindParam(17, $id, \PDO::PARAM_STR);
        $b->execute();  
        return header('Location: /controller/ListClienteController.php');
    }



    #Deletar no banco de dados
    public function deleteCliente($id)
    {
        $b=$this->conectDB()->prepare("delete from clientes where id=?");
        $b->bindParam(1, $id, \PDO::PARAM_INT);
        $b->execute();
    }


}