<?php 
require_once __DIR__."/../repositories/PessoaRepository.php";

class PessoaController{



    public function create($pessoa) {
        $repository = new PessoaRepository();
        $repository->create($pessoa);
    }

    public function read($id):Pessoa {
        $repository = new PessoaRepository();
        return $repository->read($id);
    }

    /**
         * Carregar pessoa do banco de dados
         * Setar os novos dados
         * Dar o update passando a pessoa nova e o id
         */
    public function update($pessoa, $id) {
        $repository = new PessoaRepository();
        $pessoaDb = $repository->read($id); //Pessoa do Banco de Dados
        $pessoaDb = $this->copyProperties($pessoaDb, $pessoa);
        $repository->update($pessoaDb, $id);
    }

    public function delete($id) {
        $repository = new PessoaRepository();
        $repository->delete($id);
    }

    public function readAll(): array {
        $repository = new PessoaRepository();
        return $repository->readAll();
    }

    private function copyProperties($pessoaDb, $pessoa) {
        $pessoaDb->nome = $pessoa->nome;
        $pessoaDb->email = $pessoa->email;
        $pessoaDb->ativo = $pessoa->ativo;
        $pessoaDb->nascimento = $pessoa->nascimento;
        return $pessoaDb;
    }
}

?>