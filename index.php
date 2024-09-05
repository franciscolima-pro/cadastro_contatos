<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="barra-horizontal">
<?php //CADASTRAR

include "conexao.php"; //De onde vem os dados


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nome2 = $_POST["nome"] ; //REMOVER O POST DO NOME QUANDO VÂO FICAR NA MESMA PÀGINA È CRUCIAL
    $nascimento = $_POST["nascimento"] ?? '';
    $email = $_POST["email"] ?? '';
    $profissao = $_POST["profissao"] ?? '';
    $telefone = $_POST["telefone"] ?? '';
    $celular = $_POST["celular"] ?? '';
    $whatsapp = isset($_POST['whatsapp']) ? 1 : 0;
    $notificacao_email = isset($_POST['notificacao_email']) ? 1 : 0;
    $notificacao_sms = isset($_POST['notificacao_sms']) ? 1 : 0;

    if(empty($nome2) || empty($nascimento) || empty($email) || empty($profissao) || empty($telefone) || empty($celular)){
        /*echo "Cadastro não efetuado ⚠. <p>Por favor preencha todas as informações!</p>";*/}
    else{
        $sql = "INSERT INTO `contatos`(`nome`, `nascimento`, `email`, `profissao`, `telefone`, `celular`, `notificacao_sms`, `whatsapp`, `notificacao_email`) VALUES ('$nome2','$nascimento','$email','$profissao','$telefone','$celular','$whatsapp','$notificacao_email','$notificacao_sms')"; 

            //Enviando os dados para o meu BD
            if (mysqli_query($conex, $sql)) {
               //echo " cadastrado com sucesso!";
            } else {
               //echo "Erro ao cadastrar: " . mysqli_error($conex);
            };
    };
}else{
   //echo "Nenhum dado foi enviado";
}  
?>   

<?php
   include "conexao.php"; //De onde vem os dados

   //Recebendo os meus valores do index/formulário. Para exclusão preciso apenas desses dois
   $id = $_POST['id'];
   //$nome = $_POST["nome"];

   $sql = "DELETE FROM `contatos` WHERE id = '$id'"; //só precisa do id pra excluir.
    //Enviando os dados para o meu BD
    if(mysqli_query($conex, $sql)){
       //echo "Cadastro excluído com sucesso!";
  }else{
      //echo "Erro ao excluir";
  };
   // aqui deve-se passar 2 parâmetros aconexão e o tipo de comando, no caso sql. 
?>

<?php //EXIBIR DADOS
   //Definimos a variável para receber os dados digitados em pesquisa.
   //$pesquisa = $_POST["busca"] ?? '';
   $id = $_GET["id"] ?? '';
     // Agora acessamos os dados do php
     include "conexao.php";
     //Agora usamos o comando para obtê-los
     
     $sql = "SELECT * FROM contatos";
     // Seleciona tudo de 'pessoas' onde o campo 'nome' dentro da variável '$pesquisa' LIKE/da maneira, pode ser escrito de qualquer maneira maius ou minus '% %'
     $dados = mysqli_query($conex, $sql);
     //Definimos a variável para receber os dados do banco de dados. e passo os dois parametros, minha conexão e a instrução sql
?>
</div>
<style>
    .barra-horizontal {
        width: 100%; /* Largura total da página */
        height: 0.2px; /* Altura fina, ajuste conforme necessário */
        background-color: blue; /* Cor de fundo da div */
        text-align: center; /* Centraliza o texto horizontalmente */
        line-height: 10px; /* Alinha o texto verticalmente no centro */
        color: #078ED0; /* Cor do texto */
        font-size: 0.1px; /* Tamanho da fonte, ajuste conforme necessário */
    }
</style>
</body>
</html>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Cadastro de Contatos</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="styles.css">
    <!-- Fonte -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    
</head>
<body>

    <!--PÁGINA DE CADASTRO-->
    <header class="d-flex align-items-center">
        <img class="" src="./assets/logo_alphacode.png" alt="logoHeader">
        <h1 class="text-center">Cadastro de Contatos</h1>
    </header>

    <div class="container">
        <form id="contact-form" class="mt-5" action="<?php $_SERVER['PHP_SELF']?>" method="POST">
        <input type="hidden" name="action" value="cadastro">
            <div class="row">
                <div class="mb-3 col-sm eachDivInput" >
                    <input type="text" id="nome" name="nome" placeholder="Ex.: Letícia Pacheco dos Santos" required>
                    <label for="nome" class="form-label" >Nome completo</label>
                </div>
                <div class="mb-3 col-sm eachDivInput">
                    <input type="date" id="data-nascimento" name="nascimento" required>
                    <label for="data-nascimento" class="form-label" >Data de nascimento</label>
                </div>
              </div>
            <div class="row">
                <div class="mb-3 col-sm eachDivInput">
                    <input type="email" id="email" name="email" placeholder="Ex.: leticia@gmail.com" required>
                    <label for="email" class="form-label" >E-mail</label>
                </div>
                <div class="mb-3 col-sm eachDivInput">
                    <input type="text" id="profissao" name="profissao" placeholder="Ex.: Desenvolvedora Web" required>
                    <label for="profissao" class="form-label" >Profissão</label>
                </div>
            </div>
            <div class="row">
                <div class="mb-3 col-sm eachDivInput">
                    <input type="tel" id="telefone" name="telefone" placeholder="Ex.: (11) 4033-2019" required>
                    <label for="telefone" class="form-label" >Telefone para contato</label>
                </div>
                <div class="mb-3 col-sm eachDivInput">
                    <input type="tel" id="celular" name="celular" placeholder="Ex.: (11) 98493-2039" required>
                    <label for="celular" class="form-label" >Celular para contato</label>
                </div>       
            </div>

            <div class="row">
                <div class="form-check mb-3 col-sm p-0">
                    <input class="form-check-input ms-3" type="checkbox" id="notificacoes-wsp" name="whatsapp">
                    <label class="form-check-label ps-1" for="notificacoes-wsp" >
                        Número de celular possui Whatsapp
                    </label>
                </div>
                <div class="form-check mb-3 col-sm p-0">
                    <input class="form-check-input ms-3" type="checkbox" id="notificacoes-sms" name="notificacao_sms">
                    <label class="form-check-label ps-1" for="notificacoes-sms" >
                        Enviar notificações por SMS
                    </label>
                </div>
            </div>
            <div class="row">
                <div class="form-check mb-3 col-sm p-0">
                    <input class="form-check-input ms-3" type="checkbox" id="notificacoes-email" name="notificacao_email">
                    <label class="form-check-label ps-1" for="notificacoes-email" >
                        Enviar notificações por E-mail
                    </label>
                </div>
            </div>
            <div class="d-flex justify-content-end">
                <input type="submit" class="btn" id="cadastrarButton" value="Cadastrar contato">
            </div>
        </form>

        <hr class="my-4">

         <!-- EXIBIR DADOS / Tabela de contatos cadastrados-->
        <div class="mt-5 table-responsive">
            <table class="table">
                <thead class="table-header-custom">
                    <tr>
                        <th class="text-center" style="background-color: #078ED0; color: white;">Nome</th>
                        <th class="text-center" style="background-color: #078ED0; color: white;">Data de nascimento</th>
                        <th class="text-center" style="background-color: #078ED0; color: white;">E-mail</th>
                        <th class="text-center" style="background-color: #078ED0; color: white;">Celular para contato</th>
                        <th class="text-center" style="background-color: #078ED0; color: white;">Ações</th>
                    </tr>
                </thead>
                <tbody id="contacts-list">
                
                <?php // EXIBE OS DADOS
                    //Essa função sql percorre toda a lista para enviar ela, e será usada em cada linha de cada coluna, por isso a variável.
                    
                    while($linha = mysqli_fetch_assoc($dados)){
                      $ident = $linha['id'];
                      $nome = $linha['nome'];
                      $nascimento = $linha['nascimento'];
                      $nascimento = padrao_data($nascimento);
                      $email = $linha['email'];
                      $celular = $linha['celular'];
                      
                        //pego o valor de nascimento e sobrescrevo pela minha função 

                      //Aqui ele imprime os dados acima nesse formato, na tabela.
                      echo "<tr>
                                <td class='text-center'>$nome</td>
                                <td class='text-center'>$nascimento</td>
                                <td class='text-center'>$email</td>
                                <td class='text-center'>$celular</td>
                                <td class='text-center'>
                                <a  href='edicaonew.php?id=$ident' ><img src='./assets/editar.png' alt='editar'></a>

                                <a href='#' data-bs-toggle=\"modal\" data-bs-target=\"#eliminarUsuario\" onclick=\"pegar_nome('$ident', '$nome')\"><img src='./assets/excluir.png' alt='excluir'></a>
                                </td>                              
                            </tr>"; 
                    };
                    function padrao_data($data){ //criar uma função para deixar a data de nascimento no padrão Brasil
                      $dt = explode("-", $data); //dt armazena  separada por -
                      $ordem = $dt[2] . "/" . $dt[1] . "/" . $dt[0]; //ordem, reordena a data e separa por /
                      return $ordem;
                    }
                  ?>               
                </tbody>
            </table>
        </div> 

        
        <!-- Modal de excluir -->
       <div class="modal fade" id="eliminarUsuario" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
           <div class="modal-dialog">
           <div class="modal-content w-100">
               <div class="modal-header">
               <h1 class="modal-title fs-5" id="exampleModalLabel">Eliminar Contato</h1>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <form action="<?php $_SERVER['PHP_SELF']?>" method="POST">
               <div class="modal-body">
                    <p class="text-center">Tem certeza que deseja eliminar o contato?</p>
               </div>
               <div class="modal-footer">
               <button type="submit" class="btn btn-secondary" id="confirmar-exclusao" data-bs-dismiss="modal" >Sim</button>
               <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Não</button>
               <input type="hidden" name="id" id="identi" value="">
               <input type="hidden" name="nom" id="nomex" value="">
               </div>
               </form>
           </div>
           </div>
       </div>
       
       <script type="text/javascript">
       
        function pegar_id(id){
            document.getElementById('ident').value = id;
        } 
        </script>
        <script type="text/javascript">
        function pegar_nome(id, nome){
        document.getElementById('nomex').value = nome; //comos estamos puxando de um input, usa-se 'value'
        document.getElementById('identi').value = id;
        }
        </script>

       

    </div>
    <footer class="d-flex flex-column flex-md-row align-items-center justify-content-around p-4 mt-5">
        <div class="text-center">Termos | Políticas</div>
        <div class="d-flex flex-column flex-md-row justify-content-center align-items-center text-center">
            <div class="pe-2">© Copyright 2022 | Desenvolvido por</div>
            <img src="./assets/logo_rodape_alphacode.png" alt="logo_rodape_alphacode" id="logoFooter" class="img-fluid">
        </div>
        <div class="text-center">©Alphacode IT Solutions 2022</div>
    </footer>


    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
    <!-- <script src="scripts.js"></script> -->
    
</body>
</html>
