<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Alteração cadastral</title>
</head>
<body>

<?php
    include "conexao.php";

    //Recebendo os meus valores do index/formulário.
    $id = $_POST["id"]; //ID Obrigatório para não sobrescrever todos os dados
    $nome = $_POST["nome"];
    $nascimento = $_POST["nascimento"];
    $email = $_POST["email"];
    $profissao = $_POST["profissao"];
    $telefone = $_POST["telefone"];
    $celular = $_POST["celular"];
    $whatsapp = isset($_POST['whatsapp']) ? 1 : 0; // Verifica se o checkbox foi marcado
    $notificacao_email = isset($_POST['notificacao_email']) ? 1 : 0; // Verifica se o checkbox foi marcado
    $notificacao_sms = isset($_POST['notificacao_sms']) ? 1 : 0;
    
    
    //Armazenando os dados recebidos
    if(empty($nome) || empty($nascimento) || empty($email) || empty($profissao) || empty($telefone) || empty($celular)){
        echo "ATUALIZAÇÃO não efetuadA ⚠.</p>";
    }
    else{
        $sql = "UPDATE `contatos` SET `nome`= '$nome', `nascimento`= '$nascimento', `email`= '$email', `profissao` = '$profissao', `telefone`= '$telefone', `celular`= '$celular', `whatsapp`= '$whatsapp', `notificacao_email`= '$notificacao_email', `notificacao_sms`= '$notificacao_sms' WHERE `id` = '$id'";
        //Enviando os dados para o meu BD
        if(mysqli_query($conex, $sql)){
            echo "Cadastro alterado com sucesso!";
        }else{
            echo "Erro ao alterar";
        };
    }
?>   
</body>
</html>