<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="./css/style.css">
    <title>Banco_de_dados</title>
    
</head>

<body>
<div class="container">
    <h2>Cadastro de Clientes</h2>
    <span id="msgAlerta"></span>

    <form method="POST" id="form-cad-usuario">
        <label>Nome: </label>
        <input type="text" name="nome" id="nome" required pattern="[A-Za-zÀ-ÖØ-öø-ÿ\s]+" title="Somente letras com ou sem acento" placeholder="Nome completo">

        <label>Nascimento:</label>
        <input type="date" name="nascimento" id="nascimento" required>

        <label>CPF:</label>
        <input type="text" id="cpf" name="cpf"  maxlength="14" required>

        <label>Celular:</label>
        <input type="text" name="celular" id="celular" maxlength="15" autocomplete="tel" required>

        <label">E-mail:</label>
        <input type="text" name="email" id="email" required>

        <label>Endereço:</label>
        <input type="text" name="endereco" id="endereco" required>

        <label>Observação:</label>
        <textarea name="observacao" id="observacao" maxlength="300"></textarea>
        <button type="submit" value="Cadastrar">Cadastrar</button>
        </form>
        <input type="text" id="filtro" placeholder="Filtrar por Nome/Email" oninput="filtrarClientes()">
        <button type="filtrar" value="filtrar">Filtrar</button>
<ul id="listaClientes"></ul>
    </div>
    <script src="./js/script.js"></script>
</body>

</html>