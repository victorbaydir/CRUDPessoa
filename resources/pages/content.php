<?php 
require_once __DIR__."/../../src/controllers/PessoaController.php";
require_once __DIR__."/../../src/models/Pessoa.php";

$pessoaEditar = new Pessoa();
$pessoas = [];
$controller = new PessoaController();
//SEMPRE QUE A TELA CARREGAR (GET) CONSULTAR TODOS OS REGISTROS E MONTAR A TABELA
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if(isset($_POST['editar'])){
        $id = $_POST['id'];
        $pessoaEditar = $controller->read($id);//PREENCHER A PESSOA NO FORMULARIO
    } elseif(isset($_POST['deletar'])) {
        $controller->delete($_POST['id']);
    }
}
$pessoas = $controller->readAll();

include __DIR__."/table.php"

?>

<div>
    <button class="btn btn-primary m-3" onclick="redirecionarCadastro()">ADICIONAR</button>
</div>
