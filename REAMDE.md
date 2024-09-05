# Cadastro de Contatos

Este projeto é um sistema de cadastro de contatos, permitindo que usuários registrem, editem e visualizem informações de contato como nome, data de nascimento, e-mail, profissão, e números de telefone. Ele inclui uma interface com modais para facilitar a integração com um banco de dados MySQL.

## Funcionalidades

- **Cadastro de Contatos**: Permite adicionar novos contatos com informações detalhadas.
- **Edição de Contatos**: Os dados dos contatos existentes podem ser editados.
- **Listagem de Contatos**: Exibe todos os contatos cadastrados em uma tabela organizada.
- **Validação de Dados**: Os formulários incluem validações para garantir que todos os campos obrigatórios sejam preenchidos corretamente.
- **Notificações**: Os contatos podem optar por receber notificações via WhatsApp, SMS e E-mail.

## Tecnologias Utilizadas

- **HTML5**: Estrutura básica das páginas.
- **CSS3**: Estilização das páginas e formulários.
- **Bootstrap 5**: Framework CSS para estilização e criação de modais.
- **JavaScript**: Manipulação do DOM e interações do usuário.
- **PHP**: Lógica do servidor e manipulação de dados.
- **MySQL**: Banco de dados para armazenamento dos contatos.

## Estrutura do Projeto

- `index.php`: Página principal que exibe a listagem dos contatos.
- `editar_script.php`: Script para processar a edição dos contatos.
- `edicaonew.php`: Página de formulário para edição dos dados.
- `conexao.php`: Arquivo de configuração para conexão com o banco de dados.
- `styles.css`: Estilizações customizadas.
- `assets/`: Diretório contendo imagens e outros arquivos estáticos.
- `scripts.css`: Interatividade JavaScript
- `README.md`: Documentação do projeto.

## Instalação

1. Clone este repositório para o seu ambiente local:
    ```bash
    git clone https://github.com/franciscolima-pro/cadastro_contatos.git
    ```

2. Configure o arquivo `conexao.php` com os dados do seu banco de dados MySQL.

3. Abra o projeto em seu navegador. Você pode usar um servidor local como XAMPP, WAMP, ou MAMP para executar o projeto.

## Uso
- Acesse a página principal para cadastrar seus contatos.
- Acesse a página principal para visualizar a lista de contatos.
- Clique em "Editar" para edição de um contato.
- Após realizar as edições, clique em "Salvar" para atualizar os dados no banco de dados.

## Contribuição

Se você deseja contribuir com o projeto, siga os passos abaixo:

1. Faça um fork deste repositório.
2. Crie uma nova branch para a sua feature/bugfix:
    ```bash
    git checkout -b minha-feature
    ```
3. Commit suas alterações:
    ```bash
    git commit -m 'Minha nova feature'
    ```
4. Envie para a branch principal:
    ```bash
    git push origin minha-feature
    ```
5. Abra um Pull Request.

## Licença

Este projeto é licenciado sob a [MIT License](LICENSE).

---

**Autor:** Francisco Lima  
**Contato:** franciscolimapro@gmail.com
