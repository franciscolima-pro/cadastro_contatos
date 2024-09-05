<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Cadastro de Contatos</title>

    <link rel="stylesheet" href="styles.css">
    <!-- Fonte -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet"> 
    
</head>
<body>

<?php //PEGAR DADOS PARA / EDITAR CADASTRO
      include "conexao.php"; //Puxa minha conexão com o BD 

      $id = $_GET["id"] ?? '';
      $sql = "SELECT * FROM contatos WHERE id = $id"; 

      $dadoss = mysqli_query($conex, $sql); //Faz com que me conecte com o BD por: $conex e que execute o códiogo sql: $sql

      $linha = mysqli_fetch_assoc($dadoss);//Para o resultado ser mostrado ou retornado em uma linha de dados
?>


       <!--Modal de editar--> 
        <div >
           <div class="modal-dialog">
           <div class="modal-content w-100">
               <div class="modal-header">
               <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Contato</h1>
               
               </div>
               <div class="modal-body">
                   <form id="contact-form" action="editar_script.php" method="POST">
                       <div class="row">
                           <div class="mb-3 col-sm eachDivInput">
                               <input type="text" name="nome" id="nome" placeholder="Ex.: Letícia Pacheco dos Santos" required value="<?php echo $linha['nome']?>">
                               <label for="nome" class="form-label">Nome completo</label>
                           </div>
                           <div class="mb-3 col-sm eachDivInput">
                               <input type="date" id="data-nascimento" name="nascimento" required value="<?php echo $linha['nascimento']?>">
                               <label for="data-nascimento" class="form-label">Data de nascimento</label>
                           </div>
                         </div>
                       <div class="row">
                           <div class="mb-3 col-sm eachDivInput">
                               <input type="email" id="email" name="email" placeholder="Ex.: leticia@gmail.com" required value="<?php echo $linha['email']?>">
                               <label for="email" class="form-label">E-mail</label>
                           </div>
                           <div class="mb-3 col-sm eachDivInput">
                               <input type="text" id="profissao" name="profissao" placeholder="Ex.: Desenvolvedora Web" required value="<?php echo $linha['profissao']?>">
                               <label for="profissao" class="form-label">Profissão</label>
                           </div>
                       </div>
                       <div class="row">
                           <div class="mb-3 col-sm eachDivInput">
                               <input type="tel" id="telefone" name="telefone" placeholder="Ex.: (11) 4033-2019" required value="<?php echo $linha['telefone']?>">
                               <label for="telefone" class="form-label">Telefone para contato</label>
                           </div>
                           <div class="mb-3 col-sm eachDivInput">
                               <input type="tel" id="celular" name="celular" placeholder="Ex.: (11) 98493-2039" required value="<?php echo $linha['celular']?>">
                               <label for="celular" class="form-label">Celular para contato</label>
                           </div>       
                       </div>
           
                       <div class="row">
                           <div class="form-check mb-3 col-sm ms-3 d-flex align-items-center">
                               <input class="form-check-input" type="checkbox" id="notificacoes-wsp"  name="whatsapp" value="1" <?php if ($linha['whatsapp'] == 1) echo 'checked'; ?>>
                               <label class="form-check-label text-start ps-2" for="notificacoes-wsp">
                                   Número de celular possui Whatsapp
                               </label>
                           </div>
                           <div class="form-check mb-3 col-sm ms-3 d-flex align-items-center">
                               <input class="form-check-input" type="checkbox" id="notificacoes-sms"  name="notificacao_sms" value="1" <?php if ($linha['notificacao_sms'] == 1) echo 'checked'; ?>>
                               <label class="form-check-label text-start ps-2" for="notificacoes-sms">
                                   Enviar notificações por SMS
                               </label>
                           </div>
                       </div>
                       <div class="row">
                           <div class="form-check mb-3 col-sm ms-3 d-flex align-items-center">
                               <input class="form-check-input" type="checkbox" id="notificacoes-email" name="notificacao_email"  value="1" <?php if ($linha['notificacao_email'] == 1) echo 'checked'; ?>>
                               <label class="form-check-label text-start ps-2"  for="notificacoes-email">
                                   Enviar notificações por E-mail                        
                               </label>
                           </div>
                       </div>
                       <input type="hidden" id="ident" name="id" required value="<?php echo $linha['id']?>">
                       </div>
                        <div class="modal-footer">
                        <input id="volv" type="button" class="btn btn-secondary btn-sm" value="Voltar" onclick="window.location.href='index.php';">
                        <input id="salv" type="submit" class="btn btn-primary btn-sm" value="Salvar">
                        </div>
                   </form>
           </div>
           </div>
       </div>
       

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
    <!-- Estilo adicional -->
    <style>
        footer{
            display: flex;
            justify-content: center;
            text-align: center;
            /* align-items: center; */
        }
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
        background-color: #6c757d; /* Cor de fundo */
        border-color: #6c757d; /* Cor da borda */
        text-decoration: none; /* Remove o sublinhado */
        cursor: pointer; /* Muda o cursor para uma mãozinha ao passar sobre o botão */
        }
        #salv{
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

        #contact-form input
        {
        font-family: 'Noto Sans', sans-serif;
        font-weight: 100 900;
        font-stretch: 100%;
        font-size: 16px; /* Tamanho da fonte */
        color: #333; /* Cor do texto */}
    </style>
</body>
</html>