<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar</title>
</head>
<body>
<?php
    echo '<pre>';
    print_r($_POST);
    echo '</pre>';

    include "conexao.php"; //De onde vem os dados

    //Recebendo os meus valores do index/formulário.
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recebendo os valores do formulário e garantindo que eles existam
        $nome = $_POST["nome"] ;
        $nascimento = $_POST["nascimento"] ?? '';
        $email = $_POST["email"] ?? '';
        $profissao = $_POST["profissao"] ?? '';
        $telefone = $_POST["telefone"] ?? '';
        $celular = $_POST["celular"] ?? '';
        $whatsapp = isset($_POST['whatsapp']) ? 1 : 0;
        $notificacao_email = isset($_POST['notificacao_email']) ? 1 : 0;
        $notificacao_sms = isset($_POST['notificacao_sms']) ? 1 : 0;

        //Armazenando/validando os dados recebidos
        if(empty($nome) || empty($nascimento) || empty($email) || empty($profissao) || empty($telefone) || empty($celular)){
            echo "Cadastro não efetuado ⚠. <p>Por favor preencha todas as informações!</p>";}
        else{
            $sql = "INSERT INTO `contatos`(`nome`, `nascimento`, `email`, `profissao`, `telefone`, `celular`, `notificacao_sms`, `whatsapp`, `notificacao_email`) VALUES ('$nome','$nascimento','$email','$profissao','$telefone','$celular','$whatsapp','$notificacao_email','$notificacao_sms')"; //instrução que peguei do mysqladmin, o 'id' não é necessário, pois o banco de dados vai gerar autoincrement.

                //Enviando os dados para o meu BD
                if (mysqli_query($conex, $sql)) {
                    echo "$nome cadastrado com sucesso!";
                } else {
                    echo "Erro ao cadastrar: " . mysqli_error($conex);
                };
        };
    }else{
        echo "Nenhum dado foi enviado";
    } // aqui deve-se passar 2 parâmetros a conexão e o tipo de comando, no caso sql. 
?>   
</body>
</html>