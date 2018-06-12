<?php
    
    //VERIFICANDO SE A ACAO FOR INSERIR E SE VERDADEIRO CHAMA inserirPessoa()
    if ($_POST["enviar"] == "Enviar"){
        inserirPessoa();
    }

    function inserirPessoa(){

        //DECLARANDO O NOVO HOST DO BANCO PASSANDO O LOCAL, USUÁRIO, SENHA, E O BANCO
        $banco = new mysqli("localhost","root","","agenda");

        //DECLARANDO AS VARIÁVEIS USADAS NA INSERÇÃO DOS DADOS
        $nome = $_POST["nome"];
        $nascimento =  $_POST["nascimento"];
        $endereco = $_POST["endereco"];
        $telefone = $_POST["telefone"];

        //A CONSULTA SQL
        $sql = "INSERT INTO pessoa(nome,nascimento,endereco,telefone) VALUES ('$nome','$nascimento','$endereco','$telefone')";
        
        //EXECUTANDO A INCLUSÃO
        $banco->query($sql);
        //FECHANDO A CONEXÃO COM O BANCO
        $banco->close();
    }

    
?>