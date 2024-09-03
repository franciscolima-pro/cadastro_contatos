<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body> <?php //PEGAR DADOS PARA / EDITAR CADASTRO
      include "conexao.php"; //Puxa minha conexão para ser usada

      $id = $_GET["id"] ?? ''; //variável id recebe coluna id, senão receber, fica vazio
      $sql = "SELECT * FROM contatos WHERE id = $id";  //Pegar tudo de pessoas onde a tabela a variável id recebe os dados da coluna id

      $dados = mysqli_query($conex, $sql); //Faz com que me conecte com o BD por: $conex e que execute o códiogo sql: $sql

      $linha = mysqli_fetch_assoc($dados);//Para o resultado ser mostrado ou retornado em uma linha de dados
?>


       <!--Modal de editar--> 
        <div class="modal fade" id="editarUsuario" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
           <div class="modal-dialog">
           <div class="modal-content w-100">
               <div class="modal-header">
               <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Contato</h1>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <div class="modal-body">
                   <form id="contact-form" action="editar_script.php" method="POST">
                       <div class="row">
                           <div class="mb-3 col-sm eachDivInput">
                               <input type="text" name="nome" id="nome" placeholder="Ex.: Letícia Pacheco dos Santos" value="<?php echo $linha['nome']?>">
                               <label for="nome" class="form-label">Nome completo</label>
                           </div>
                           <div class="mb-3 col-sm eachDivInput">
                               <input type="date" id="data-nascimento" name="nascimento" value="<?php echo $linha['nascimento']?>">
                               <label for="data-nascimento" class="form-label">Data de nascimento</label>
                           </div>
                         </div>
                       <div class="row">
                           <div class="mb-3 col-sm eachDivInput">
                               <input type="email" id="email" name="email" placeholder="Ex.: leticia@gmail.com" value="<?php echo $linha['email']?>">
                               <label for="email" class="form-label">E-mail</label>
                           </div>
                           <div class="mb-3 col-sm eachDivInput">
                               <input type="text" id="profissao" name="profissao" placeholder="Ex.: Desenvolvedora Web" value="<?php echo $linha['profissao']?>">
                               <label for="profissao" class="form-label">Profissão</label>
                           </div>
                       </div>
                       <div class="row">
                           <div class="mb-3 col-sm eachDivInput">
                               <input type="tel" id="telefone" name="telefone" placeholder="Ex.: (11) 4033-2019" value="<?php echo $linha['telefone']?>">
                               <label for="telefone" class="form-label">Telefone para contato</label>
                           </div>
                           <div class="mb-3 col-sm eachDivInput">
                               <input type="tel" id="celular" name="celular" placeholder="Ex.: (11) 98493-2039" value="<?php echo $linha['celular']?>">
                               <label for="celular" class="form-label">Celular para contato</label>
                           </div>       
                       </div>
           
                       <div class="row">
                           <div class="form-check mb-3 col-sm ms-3 d-flex align-items-center">
                               <input class="form-check-input" type="checkbox" id="notificacoes-wsp" name="whatsapp" value="<?php echo $linha['whatsapp']?>">
                               <label class="form-check-label text-start ps-2" for="notificacoes-wsp">
                                   Número de celular possui Whatsapp
                               </label>
                           </div>
                           <div class="form-check mb-3 col-sm ms-3 d-flex align-items-center">
                               <input class="form-check-input" type="checkbox" id="notificacoes-sms" name="notificacao_sms" value="<?php echo $linha['notificacao_sms']?>">
                               <label class="form-check-label text-start ps-2" for="notificacoes-sms">
                                   Enviar notificações por SMS
                               </label>
                           </div>
                       </div>
                       <div class="row">
                           <div class="form-check mb-3 col-sm ms-3 d-flex align-items-center">
                               <input class="form-check-input" type="checkbox" id="notificacoes-email" name="notificacao_email" value="<?php echo $linha['notificacao_email']?>">
                               <label class="form-check-label text-start ps-2"  for="notificacoes-email">
                                   Enviar notificações por E-mail                        
                               </label>
                           </div>
                       </div>
                       <input type="text" id="ident" name="id" value="<?php echo $linha['id']?>">Campo oculto para o ID -->
                       <b id="nome_pessoa"> Campo de texto para o nome 
                       </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                        <input type="submit" class="btn btn-primary" value="Salvar">
                        </div>
                        <!--Minhas variáveis de ARMAZENAMENTO-->
                        <input type="hidden" name="nome" id="nome_excluir" value="">
                   </form>
           </div>
           </div>
       </div>

       <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html> 