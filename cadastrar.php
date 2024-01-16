<?php

// Include a conexao BD
include_once "conexao.php";


// Receber os dados enviado pelo JavaScript
$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if(empty($dados['nome'])){
    $retorna = ['status' => false, 'msg' => "<p style='color: #f00;'>Erro: Necessário preencher o campo nome!</p>"];
}elseif(empty($dados['nascimento'])){
    $retorna = ['status' => false, 'msg' => "<p style='color: #f00;'>Erro: Necessário preencher o campo nascimento!</p>"];
}elseif(empty($dados['cpf'])){
    $retorna = ['status' => false, 'msg' => "<p style='color: #f00;'>Erro: Necessário preencher o campo cpf!</p>"];
}elseif(empty($dados['celular'])){
    $retorna = ['status' => false, 'msg' => "<p style='color: #f00;'>Erro: Necessário preencher o campo celular!</p>"];
}elseif(empty($dados['email'])){
    $retorna = ['status' => false, 'msg' => "<p style='color: #f00;'>Erro: Necessário preencher o campo email!</p>"];
}elseif(empty($dados['endereco'])){
    $retorna = ['status' => false, 'msg' => "<p style='color: #f00;'>Erro: Necessário preencher o campo endereco!</p>"];
} else {
    // Todas as verificações passaram, então podemos realizar a inserção no banco de dados

    // insira os dados na tabela 'dados', cria um link com : e o nome da coluna, pois é mais seguro.
    $query_dados = "INSERT INTO dados (nome, nascimento, cpf, celular, email, endereco, observacao ) VALUES (:nome, :nascimento, :cpf, :celular, :email, :endereco, :observacao)";
    $cad_dados = $conn->prepare($query_dados);
    $cad_dados->bindParam(':nome', $dados['nome']);
    $cad_dados->bindParam(':nascimento', $dados['nascimento']);
    $cad_dados->bindParam(':cpf', $dados['cpf']);
    $cad_dados->bindParam(':celular', $dados['celular']);
    $cad_dados->bindParam(':email', $dados['email']);
    $cad_dados->bindParam(':endereco', $dados['endereco']);
    $cad_dados->bindParam(':observacao', $dados['observacao']);
   
    $cad_dados->execute();

    if($cad_dados->rowCount()){
        $retorna = ['status' => true, 'msg' => "<p style='color: green;'>Usuário cadastrado com sucesso!</p>"];
    }else{
        $retorna = ['status' => false, 'msg' => "<p style='color: #f00;'>Erro: Usuário não cadastrado com sucesso!</p>"];
    }    
    
}

ob_clean();
echo json_encode($retorna);



