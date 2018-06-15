<?php include("conexao.php");
    $grupo = selectTodos();
    //var_dump($grupo);
?>

<table border="1">
    <thead>
        <tr>
            <th>Nome</th>
            <th>Nascimento</th>
            <th>Telefone</th>
            <th>Endereço</th>
            <th>Editar</th>
            <th>Excluir</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($grupo as $pessoa) { ?>
            <tr>
                <td><?=$pessoa["nome"]?></td>
                <td><?=$pessoa["nascimento"]?></td>
                <td><?=$pessoa["telefone"]?></td>
                <td><?=$pessoa["endereco"]?></td>
                <td>
                    <form nome="alterar" action="alterar.php" method="POST">
                        <input type="hidden" name="id" value=<?=$pessoa["id"]?> />
                        <input type="submit" name="Editar" value="Editar" />
                    </form>
                </td>
                <td>
                    <form name="excluir" action="conexao.php" method="POST">
                        <input type="hidden" name="id" value=<?=$pessoa["id"]?> />
                        <input type="submit" name="acao" value="Excluir" />
                    </form>    
                    
                </td>
            </tr>   

        <?php } ?>

    </tbody>
</table>
        
