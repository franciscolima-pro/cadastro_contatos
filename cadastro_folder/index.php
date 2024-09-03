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



<?php //EXIBIR DADOS
    //Definimos a variável para receber os dados digitados em pesquisa.
      $pesquisa = $_POST["busca"] ?? '';
      $id = $_GET["id"] ?? '';

      // Agora acessamos os dados do php
      include "conexao.php";
      //Agora usamos o comando para obtê-los
      
      $sql = "SELECT * FROM contatos WHERE nome LIKE '%$pesquisa%' ";
      // Seleciona tudo de 'pessoas' onde o campo 'nome' dentro da variável '$pesquisa' LIKE/da maneira, pode ser escrito de qualquer maneira maius ou minus '% %'
      $dados = mysqli_query($conex, $sql);
      //Definimos a variável para receber os dados do banco de dados. e passo os dois parametros, minha conexão e a instrução sql
     

      //EDITAR / PEGAR DADOS / variável id recebe coluna id, senão receber, fica vazio
      $sql2 = "SELECT * FROM contatos WHERE id = $id";  //Pegar tudo de pessoas onde a tabela a variável id recebe os dados da coluna id

      $dados_preenche_modal = mysqli_query($conex, $sql2); //Faz com que me conecte com o BD por: $conex e que execute o códiogo sql: $sql

      $linha2 = mysqli_fetch_assoc($dados_preenche_modal);
      //EDITAR / PEGAR DADOS /


?>


    <!--PÁGINA DE CADASTRO-->
    <header class="d-flex align-items-center">
        <img class="" src="./assets/logo_alphacode.png" alt="logoHeader">
        <h1 class="text-center">Cadastro de Contatos</h1>
    </header>

    <div class="container">
        <form id="contact-form" class="mt-5" action="cadastro_script.php" method="POST">
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
                
                <?php
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
                                <a href=\"index.php?id=$ident\" class=\"btn-close\" data-bs-toggle=\"modal\" data-bs-target=\"#editarUsuario\" 
                                onclick=\"pegar_id('$linha[id]')\">
                                <img src='./assets/editar.png' alt='editar'>
                                </a>
                                <a href='#' data-bs-toggle=\"modal\" data-bs-target=\"#eliminarUsuario\" onclick=\"pegar_nome('$ident', '$nome')\"><img src='./assets/excluir.png' alt='excluir'></a>
                                </td>                              
                            </tr>"; //Uso o id no botão de editar para identificar o cadastro que quero editar, para mostrar os dados dele para edição, uso a variável GET
                            //No botão Excluir, preciso passar o parametro que chma afunção JS que pega o nome, para mostarr o nome, mas precisa ser com aspas duplas o que é difícil pois terá conflitos com outras aspas duplas, por isso a necessidade da concatenação desta maneira function pegar_nome(id, 'nome')
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
        
        <!--Modal de editar--> 
        <div class="modal fade" id="editarUsuario" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
           <div class="modal-dialog">
           <div class="modal-content w-100">
               <div class="modal-header">
               <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Contato</h1>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <div class="modal-body">
                   <form id="contact-form" action="index.php" method="POST">
                       <div class="row">
                           <div class="mb-3 col-sm eachDivInput">
                               <input type="text" name="nome" id="nome" placeholder="Ex.: Letícia Pacheco dos Santos" value="<?php echo $linha2['nome']?>">
                               <label for="nome" class="form-label">Nome completo</label>
                           </div>
                           <div class="mb-3 col-sm eachDivInput">
                               <input type="date" id="data-nascimento" name="nascimento" value="<?php echo $linha2['nascimento']?>">
                               <label for="data-nascimento" class="form-label">Data de nascimento</label>
                           </div>
                         </div>
                       <div class="row">
                           <div class="mb-3 col-sm eachDivInput">
                               <input type="email" id="email" name="email" placeholder="Ex.: leticia@gmail.com" value="<?php echo $linha2['email']?>">
                               <label for="email" class="form-label">E-mail</label>
                           </div>
                           <div class="mb-3 col-sm eachDivInput">
                               <input type="text" id="profissao" name="profissao" placeholder="Ex.: Desenvolvedora Web" value="<?php echo $linha2['profissao']?>">
                               <label for="profissao" class="form-label">Profissão</label>
                           </div>
                       </div>
                       <div class="row">
                           <div class="mb-3 col-sm eachDivInput">
                               <input type="tel" id="telefone" name="telefone" placeholder="Ex.: (11) 4033-2019" value="<?php echo $linha2['telefone']?>">
                               <label for="telefone" class="form-label">Telefone para contato</label>
                           </div>
                           <div class="mb-3 col-sm eachDivInput">
                               <input type="tel" id="celular" name="celular" placeholder="Ex.: (11) 98493-2039" value="<?php echo $linha2['celular']?>">
                               <label for="celular" class="form-label">Celular para contato</label>
                           </div>       
                       </div>
           
                       <div class="row">
                           <div class="form-check mb-3 col-sm ms-3 d-flex align-items-center">
                               <input class="form-check-input" type="checkbox" id="notificacoes-wsp" name="whatsapp" value="<?php echo $linha2['whatsapp']?>">
                               <label class="form-check-label text-start ps-2" for="notificacoes-wsp">
                                   Número de celular possui Whatsapp
                               </label>
                           </div>
                           <div class="form-check mb-3 col-sm ms-3 d-flex align-items-center">
                               <input class="form-check-input" type="checkbox" id="notificacoes-sms" name="notificacao_sms" value="<?php echo $linha2['notificacao_sms']?>">
                               <label class="form-check-label text-start ps-2" for="notificacoes-sms">
                                   Enviar notificações por SMS
                               </label>
                           </div>
                       </div>
                       <div class="row">
                           <div class="form-check mb-3 col-sm ms-3 d-flex align-items-center">
                               <input class="form-check-input" type="checkbox" id="notificacoes-email" name="notificacao_email" value="<?php echo $linha2['notificacao_email']?>">
                               <label class="form-check-label text-start ps-2"  for="notificacoes-email">
                                   Enviar notificações por E-mail                        
                               </label>
                           </div>
                       </div>
                       <input type="hidden" id="ident" name="id" value="<?php echo $linha2['id']?>">
                       </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                        <input type="submit" class="btn btn-primary" value="Salvar">
                        </div>
                        <!--Minhas variáveis de ARMAZENAMENTO-->
                   </form>
           </div>
           </div>
       </div>

        
        <!-- Modal de excluir -->
       <div class="modal fade" id="eliminarUsuario" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
           <div class="modal-dialog">
           <div class="modal-content w-100">
               <div class="modal-header">
               <h1 class="modal-title fs-5" id="exampleModalLabel">Eliminar Contato</h1>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <form action="eliminar_script.php" method="POST">
               <div class="modal-body">
                    <p class="text-center">Tem certeza que deseja eliminar o contato?</p>
               </div>
               <div class="modal-footer">
               <button type="submit" class="btn btn-secondary" id="confirmar-exclusao" data-bs-dismiss="modal" onclick="location.reload()">Sim</button>
               <button type="button" class="btn btn-primary">Não</button>
               <input type="hidden" name="id" id="identi" value=""><!--Esse input envia o id da pessoa, para podermos excluir-->
               <input type="text" name="nom" id="nomex" value=""><!--Esse input envia o nome da pessoa, para podermos identificar e excluir-->
               </div>
               </form>
           </div>
           </div>
       </div>
       
       <script type="text/javascript">
        function pegar_id(id){
        document.getElementById('ident').value = id; // Define o id no campo hidden para edição
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
    <!-- Custom JS 
    <script src="scripts.js"></script>-->
</body>
</html>