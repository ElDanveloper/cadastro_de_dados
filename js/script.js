// Mascara para o cpf
var input = document.getElementById('cpf');
if (input) {
    input.addEventListener('keypress', input);
} else {
    console.error('"cpf" não encontrado.');
}

input.addEventListener('keypress', () => {
    let inputLength = input.value.length
    if (inputLength == 3 || inputLength == 7) {
        input.value += '.'
    } else if (inputLength == 11) {
        input.value += '-'
    }

})
// Mascara para telefone
var telefoneInput = document.getElementById('celular');
if (telefoneInput) {
    input.addEventListener('keypress', input);
} else {
    console.error('"telefone" não encontrado.');
}
    telefoneInput.addEventListener('keypress', () => {
    let inputValue = telefoneInput.value.replace(/\D/g, ''); // Remove caracteres não numéricos
    let formattedValue = '';

    if (inputValue.length <= 11) {
        formattedValue = formatPhoneNumber(inputValue);
    } else {
        // Se o número for maior que 11 dígitos, trunca para os primeiros 11
        formattedValue = formatPhoneNumber(inputValue.substring(0, 11));
    }

    telefoneInput.value = formattedValue;
});

function formatPhoneNumber(phoneNumber) {
    const ddd = phoneNumber.substring(0, 2);
    const firstPart = phoneNumber.substring(2, 7);
    const secondPart = phoneNumber.substring(7, 11);

    return `(${ddd}) ${firstPart}-${secondPart}`;
}
//filtrar clientes
function filtrarClientes() {
    var filtro = document.getElementById('filtro').value.toLowerCase();
    
    // Fazer uma requisição AJAX para buscar os clientes filtrados
    // Exemplo usando Fetch API
    fetch('buscar_clientes.php?filtro=' + filtro)
        .then(response => response.json())
        .then(data => mostrarClientes(data));
}

function mostrarClientes(clientes) {
    var listaClientes = document.getElementById('listaClientes');
    listaClientes.innerHTML = '';

    clientes.forEach(cliente => {
        var li = document.createElement('li');
        li.textContent = `${cliente.nome} - ${cliente.email}`;

        // Adicionar botões de edição e exclusão
        var btnEditar = document.createElement('button');
        btnEditar.textContent = 'Editar';
        btnEditar.onclick = function() {
            // Implementar a lógica de edição
            alert('Implementar lógica de edição para o cliente com id ' + cliente.id);
        };

        var btnExcluir = document.createElement('button');
        btnExcluir.textContent = 'Excluir';
        btnExcluir.onclick = function() {
            // Implementar a lógica de exclusão
            alert('Implementar lógica de exclusão para o cliente com id ' + cliente.id);
        };

        li.appendChild(btnEditar);
        li.appendChild(btnExcluir);

        listaClientes.appendChild(li);
    });
}

// Carregar a lista inicial ao carregar a página
filtrarClientes();

// Cadastrar novo usuario no BD
const formCadUsuario = document.getElementById("form-cad-usuario");
if (formCadUsuario) {
    formCadUsuario.addEventListener("submit", async (event) => {
        event.preventDefault();
        // Receber os dados do formulario
        const dadosForm = new FormData(formCadUsuario);

        // Enviar os dados para o arquivo "cadastrar.php", deve salvar no BD
        const dados = await fetch("cadastrar.php", {
            method: "POST",
            body: dadosForm
        });
        const resposta = await dados.json();

        if (resposta['status']) {
            document.getElementById("msgAlerta").innerHTML = resposta['msg'];
            // formCadUsuario.reset();
        } else {
            document.getElementById("msgAlerta").innerHTML = resposta['msg'];
        }
    });
}