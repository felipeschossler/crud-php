<?php
    
    //VERIFICANDO SE A ACAO FOR INSERIR E SE VERDADEIRO CHAMA inserirPessoa()
    if(isset($_POST["enviar"])){
        if ($_POST["enviar"] == "Enviar"){
            inserirPessoa();
        }
    }
    
    function abrirBanco(){
        $conexao = new mysqli("localhost","root","","agenda");
        return $conexao;
    }

    function voltarIndex(){
        header("location:index.html");
    }

    function inserirPessoa(){

        //DECLARANDO O NOVO HOST DO BANCO PASSANDO O LOCAL, USUÁRIO, SENHA, E O BANCO
        $banco = abrirBanco();

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
        voltarIndex();
    }

    function selectTodos(){
        $banco = abrirBanco();
        $sql = "SELECT * FROM pessoa ORDER BY nome";
        $resultado = $banco->query($sql);
        while ($row = mysqli_fetch_array($resultado)){
            $grupo [] = $row;
        }
        
        return $grupo;

    }

?>