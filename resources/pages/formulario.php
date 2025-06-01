<?php
require_once __DIR__ . "/../../src/controllers/PessoaController.php";
require_once __DIR__ . "/../../src/models/Pessoa.php";

$id;
$pessoa = new Pessoa();
$pessoas = [];
$controller = new PessoaController();
//SEMPRE QUE A TELA CARREGAR (GET) CONSULTAR TODOS OS REGISTROS E MONTAR A TABELA
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['salvar']) && !isset($_POST['id'])) {
        if (isset($_POST['nome'], $_POST['email'], $_POST['nascimento'])) {
            $pessoa->nome = $_POST['nome'];
            $pessoa->email = $_POST['email'];
            $pessoa->nascimento = $_POST['nascimento'];
            $pessoa->ativo = isset($_POST['ativo']) ? '1' : '0';
            $controller->create($pessoa);
        }
    } else {
        $pessoa->nome = $_POST['nome'];
        $pessoa->email = $_POST['email'];
        $pessoa->nascimento = $_POST['nascimento'];
        $pessoa->ativo = isset($_POST['ativo']) ? '1' : '0';
        $controller->update($pessoa, $_POST['id']);
    }
} else if ($_SERVER['REQUEST_METHOD'] == "GET") {
    if (isset($_GET['editar'])) {
        $pessoa->id = $_GET['id'];
        $pessoa = $controller->read(id: $pessoa->id);
    }
}


?>

<form method="post">
    <input type="hidden" name="id" id="id" value="<?= $pessoa->id ?>">
    <div>
        <label for="nome">Nome</label>
        <input type="text" name="nome" id="nome" required value="<?= $pessoa->nome ?>">
    </div>
    <div>
        <label for="email">Email</label>
        <input type="email" name="email" id="email" required value="<?= $pessoa->email ?>">
    </div>
    <div>
        <label for="nascimento">Data Nascimento</label>
        <input type="date" name="nascimento" id="nascimento" required value="<?= $pessoa->nascimento ?>">
    </div>
    <div>
        <label for="ativo">Ativo</label>
        <input type="checkbox" name="ativo" id="ativo" <?= $pessoa->ativo == 1 ? 'checked' : '' ?>>
    </div>
    <div>
        <button type="submit" name="salvar">SALVAR</button>
        <button type="button" onclick="window.location.href='index.php'; " name="voltar">VOLTAR</button>
    </div>
</form>