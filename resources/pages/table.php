
<table class="table m-3">
    <thead>
        <tr>
            <th>ID</th>
            <th>NOME</th>
            <th>EMAIL</th>
            <th>ATIVO</th>
            <th>OPÇÕES</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($pessoas as $pessoa): ?>
            <tr>
                <td><?= $pessoa['id']; ?></td>
                <td><?= $pessoa['nome']; ?></td>
                <td><?= $pessoa['email']; ?></td>
                <td><?= $pessoa['ativo'] == 1 ? "Ativo" : "Inativo"; ?></td>
                <td style="display: flex; flex-grow: row;">
                    <form action="novo.php" method="get">
                        <button data-id="<?= $pessoa['id']; ?>" name="editar">EDITAR</button>
                        <input type="hidden" name="id" value="<?= $pessoa['id']; ?>">

                    </form>
                    <form method="POST">
                        <input type="hidden" name="id" value="<?= $pessoa['id']; ?>">
                        <button name="deletar" data-id="<?= $pessoa['id']; ?>" onclick="confirm('Deseja excluir esse registro?')">DELETAR</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>

</table>
