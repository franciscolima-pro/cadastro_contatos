<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exclusão cadastral</title>
</head>
<body>
<?php
    include "conexao.php"; //De onde vem os dados

    //Recebendo os meus valores do index/formulário. Para exclusão preciso apenas desses dois
    $id = $_POST["id"];
    //$nome = $_POST["nome"];

    $sql = "DELETE FROM `contatos` WHERE id = '$id'"; //só precisa do id pra excluir.
     //Enviando os dados para o meu BD
     if(mysqli_query($conex, $sql)){
        echo "Cadastro excluído com sucesso!";
   }else{
       echo "Erro ao excluir";
   };
    // aqui deve-se passar 2 parâmetros aconexão e o tipo de comando, no caso sql. 
?>
</body>
</html>