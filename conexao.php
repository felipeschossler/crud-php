<?php
    
    //VERIFICANDO VALOR DA ACAO PARA REDIRECIONAR PARA A DETERMINADA ACAO
    if(isset($_POST["acao"])){
        if ($_POST["acao"] == "Inserir"){
            inserirPessoa();
        }
        if ($_POST["acao"] == "Alterar"){
            alterarPessoa();
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
        
        $banco->close();
        return $grupo;

    }

    function selectIdPessoa($id){
        $banco = abrirBanco();
        $sql = "SELECT * FROM pessoa WHERE id =".$id;
        $resultado = $banco->query($sql);
        $banco->close();
        $pessoa = mysqli_fetch_assoc($resultado);
        return $pessoa;
    }
    
    function alterarPessoa(){
        $id = $_POST["id"];
        $nome = $_POST["nome"];
        $nascimento = $_POST["nascimento"];
        $endereco = $_POST["endereco"];
        $telefone = $_POST["telefone"];

        $banco = abrirBanco();
        $sql = "UPDATE pessoa SET nome='$nome',nascimento='$nascimento',endereco='$endereco',telefone='$telefone' WHERE id='$id'";
        $banco->query($sql);
        $banco->close();
        voltarIndex();
    }

?>