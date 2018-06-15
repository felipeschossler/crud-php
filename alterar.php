<?php 
include("conexao.php"); 
$pessoa = selectIdPessoa($_POST["id"]);
?>
<head>
    <title>Alterar Pessoa</title>
    <meta charset="utf-8">
</head>
<form name="dadosPessoa" action="conexao.php" method="POST">
    <table border="1">
        <tbody>
            <tr>
                <td>Nome</td>
                <td><input type="text" name="nome" value="<?=$pessoa["nome"]?>" size="20" /></td>
            </tr>   
            <tr>
                <td>Nascimento</td>
                <td><input type="date" name="nascimento" value="<?=$pessoa["nascimento"]?>" /></td>
            </tr>
            <tr>
                <td>Telefone</td>
                <td><input type="text" name="telefone" value="<?=$pessoa["telefone"]?>" size="20" /></td>
            </tr>
            <tr>
                <td>Endereço</td>
                <td><input type="text" name="endereco" value="<?=$pessoa["endereco"]?>" size="20" /></td>
            </tr>
            <tr>
                <td>
                    <input type="hidden" name="acao" value="Alterar" />
                    <input type="hidden" name="id" value="<?=$pessoa["id"]?>" />
                </td>
                <td><input type="submit" name="enviar" value="Alterar" /></td>
            </tr>
        </tbody>
    </table>
</form>
