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
    $id = $_POST["id"]; 
    $nome = $_POST["nome"];
    $nascimento = $_POST["nascimento"];
    $email = $_POST["email"];
    $profissao = $_POST["profissao"];
    $telefone = $_POST["telefone"];
    $celular = $_POST["celular"];
    $whatsapp = isset($_POST['whatsapp']) ? 1 : 0;
    $notificacao_email = isset($_POST['notificacao_email']) ? 1 : 0; 
    $notificacao_sms = isset($_POST['notificacao_sms']) ? 1 : 0;
    
    
    //Armazenando os dados recebidos
    if(empty($nome) || empty($nascimento) || empty($email) || empty($profissao) || empty($telefone) || empty($celular)){
        echo "ATUALIZAÇÃO NÂO EFETUADA ⚠.</p>";
    }
    else{
        $sql = "UPDATE `contatos` SET `nome`= '$nome', `nascimento`= '$nascimento', `email`= '$email', `profissao` = '$profissao', `telefone`= '$telefone', `celular`= '$celular', `whatsapp`= '$whatsapp', `notificacao_email`= '$notificacao_email', `notificacao_sms`= '$notificacao_sms' WHERE `id` = '$id'";
        //Enviando os dados para o meu BD
        if(mysqli_query($conex, $sql)){
            //echo "Cadastro alterado com sucesso!";
        }else{
            echo "Erro ao alterar";
        };
    }
?> 
    <div class="alert alert-success d-flex align-items-center" role="alert">
        <svg class="bi flex-shrink-0 me-2" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
        <div>
            <h1>Cadastro atualizado com sucesso!</h1>
        </div>
        <img src="./assets/logo_rodape_alphacode.png" alt="logo_rodape_alphacode" id="logoFooter" class="img-fluid">
    </div>


    <!-- Estilo adicional -->
    <style>
  #volv{
            display: inline-block;
            font-weight: 400;
            text-align: center;
            white-space: nowrap;
            vertical-align: middle;
            user-select: none;
            border: 1px solid transparent;
            padding: 0.25rem 0.5rem; /* Espaçamento interno (padding) */
            margin: 1rem;
            font-size: 0.875rem; /* Tamanho da fonte */
            line-height: 1.5;
            border-radius: 0.25rem; /* Bordas arredondadas */
            color: #fff; /* Cor do texto */
            background-color: #078ED0; /* Cor de fundo */
            border-color: #078ED0; /* Cor da borda */
            text-decoration: none; /* Remove o sublinhado */
            cursor: pointer; /* Muda o cursor para uma mãozinha ao passar sobre o botão */;
        }
        body{
            background-color: #D1E7DD;
        }
        img{
            width: 15rem;
            position: absolute;
        }
    </style>

</body>

<input id="volv" type="button" class="btn btn-secondary btn-sm" value="Voltar" onclick="window.location.href='index.php';">

</html>