/*let rowToDelete = null; // Variável para armazenar a linha a ser excluída

// Função para excluir uma linha
function excluirLinha() {
    if (rowToDelete) {
        rowToDelete.remove(); // Remove a linha armazenada
        rowToDelete = null; // Reseta a variável após a exclusão
    }
}

// Adiciona event listener aos botões "Excluir" já existentes no HTML
document.querySelectorAll('[data-bs-target="#eliminarUsuario"]').forEach(button => {
    button.addEventListener('click', function() {
        // Define a linha a ser excluída
        rowToDelete = this.closest('tr');
    });
});

// Adiciona um novo contato via formulário
/*document.getElementById('contact-form').addEventListener('submit', function(e) {
    e.preventDefault();*/

    // Pega os valores dos inputs
    /*let nome = document.getElementById('nome').value;
    let dataNascimento = document.getElementById('data-nascimento').value;
    let celular = document.getElementById('celular').value;
    let email = document.getElementById('email').value;*/

    // Cria uma nova linha na tabela
    /*let table = document.getElementById('contacts-list');
    let newRow = table.insertRow();*/

    /*newRow.innerHTML = `
        <td class="text-center">${nome}</td>
        <td class="text-center">${dataNascimento}</td>
        <td class="text-center">${email}</td>
        <td class="text-center">${celular}</td>
        <td class="text-center">
            <button type="button" class="btn btn-sm" data-bs-toggle="modal" data-bs-target="#editarUsuario"><img src="./assets/editar.png" alt="editar"></button>
            <button type="button" class="btn btn-sm" data-bs-toggle="modal" data-bs-target="#eliminarUsuario"><img src="./assets/excluir.png" alt="excluir"></button>
        </td>
    `;

    // Adiciona o event listener ao novo botão "Excluir"
    newRow.querySelector('[data-bs-target="#eliminarUsuario"]').addEventListener('click', function() {
        rowToDelete = this.closest('tr'); // Armazena a linha que será excluída
    });
        
    // Limpa os campos após submissão
    //document.getElementById('contact-form').reset();
//});

// Ação do botão "Sim" no modal de exclusão
document.getElementById('confirmar-exclusao').addEventListener('click', function() {
    excluirLinha(); // Chama a função para excluir a linha
});*/
