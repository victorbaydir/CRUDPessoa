<?php 

require_once __DIR__."/../conexao/Conexao.php";
require_once __DIR__."/../models/Pessoa.php";

//CLASSE RESPONSAVEL PELAS OPERAÇÔES DO CRUD
class PessoaRepository{

    public function create($pessoa) {
        $conn = (new Conexao())->getInstancia();
        $query="INSERT INTO pessoa(nome, email, ativo, nascimento) VALUES (?,?,?,?)";
        $stmt= $conn->prepare($query);
        $stmt->bindParam(1, $pessoa->nome, PDO::PARAM_STR);
        $stmt->bindParam(2, $pessoa->email, PDO::PARAM_STR);
        $stmt->bindParam(3, $pessoa->ativo, PDO::PARAM_BOOL);
        $stmt->bindParam(4, $pessoa->nascimento, PDO::PARAM_STR);
        $stmt->execute();
    }

    public function read($id):Pessoa {
        $conn = (new Conexao())->getInstancia();
        $query="SELECT * FROM pessoa WHERE id = ?";
        $stmt=$conn->prepare($query);
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchObject(Pessoa::class);
    }
    public function update($pessoa, $id) {
        $conn = (new Conexao())->getInstancia();
        $query="UPDATE pessoa SET nome=?, email=?, ativo=?, nascimento=? WHERE id=?";
        $stmt=$conn->prepare($query);
        $stmt->bindParam(1, $pessoa->nome, PDO::PARAM_STR);
        $stmt->bindParam(2, $pessoa->email, PDO::PARAM_STR);
        $stmt->bindParam(3, $pessoa->ativo, PDO::PARAM_BOOL);
        $stmt->bindParam(4, $pessoa->nascimento, PDO::PARAM_STR);
        $stmt->bindParam(5, $id, PDO::PARAM_INT);
        $stmt->execute();
    }
    public function delete($id) {
        
        $conn = (new Conexao())->getInstancia();
        $query="DELETE FROM pessoa WHERE id=?";
        $stmt=$conn->prepare($query);
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        $stmt->execute();
    }
    public function readAll():array {
        $conn = (new Conexao())->getInstancia();
        $query="SELECT * FROM pessoa";
        $stmt=$conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }

}

?>