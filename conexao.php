<?php
    
    //verificando valor da acao para redirecionar para a determinada acao
    if(isset($_POST["acao"])){
        if ($_POST["acao"] == "Enviar"){
            inserirPessoa();
        }
        if ($_POST["acao"] == "Alterar"){
            alterarPessoa();
        }
    }
    
    //funcao que passa o local e as credenciais para logar no banco
    function abrirBanco(){
        $conexao = new mysqli("localhost","root","","agenda");
        return $conexao;
    }

    //funcao que redireciona para a página inicial
    function voltarIndex(){
        header("location:index.html");
    }

    //funcao que insere pessoa
    function inserirPessoa(){

        $banco = abrirBanco();
        //declarando as variáveis usadas na inserção dos dados
        $nome = $_POST["nome"];
        $nascimento =  $_POST["nascimento"];
        $endereco = $_POST["endereco"];
        $telefone = $_POST["telefone"];

        //a consulta sql
        $sql = "INSERT INTO pessoa(nome,nascimento,endereco,telefone) VALUES ('$nome','$nascimento','$endereco','$telefone')";
        
        //executando a inclusão
        $banco->query($sql);
        //fechando a conexao com o banco
        $banco->close();
        voltarIndex();

    }

    function selectTodos(){
        
        $banco = abrirBanco();
        //a consulta sql
        $sql = "SELECT * FROM pessoa ORDER BY nome";
        //executando a consulta
        $resultado = $banco->query($sql);
        //mostra todos os usuários dentro do array
        
        while ($row = mysqli_fetch_array($resultado)){
            $grupo [] = $row;
        }

        $banco->close();
        return $grupo;

    }

    //funcao que mostra os usuário já preenchido para a alteração
    function selectIdPessoa($id){
        
        $banco = abrirBanco();
        //a consulta sql
        $sql = "SELECT * FROM pessoa WHERE id =".$id;
        $resultado = $banco->query($sql);
        $banco->close();
        $pessoa = mysqli_fetch_assoc($resultado);
        return $pessoa;

    }
    
    //funcao que altera um único usuário específico
    function alterarPessoa(){
        
        $banco = abrirBanco();
        
        //declarando as variáveis usadas no update
        $id = $_POST["id"];
        $nome = $_POST["nome"];
        $nascimento = $_POST["nascimento"];
        $endereco = $_POST["endereco"];
        $telefone = $_POST["telefone"];

        //update no usuario especifico no qual já deve existir a informação
        $sql = "UPDATE pessoa SET nome='$nome',nascimento='$nascimento',endereco='$endereco',telefone='$telefone' WHERE id='$id'";
        $banco->query($sql);
        $banco->close();
        voltarIndex();

    }

?>