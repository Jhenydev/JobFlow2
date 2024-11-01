<?php
include "../include/topo.php";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $sql = "INSERT INTO usuarios
            (id_usuario, nome, email, telefone, data_nascimento, sexo, cpf, endereco, bairro, cidade, estado, cep, senha)
            VALUES (NULL, :nome, :email, :telefone, :data_nascimento, :sexo, :cpf, :endereco, :bairro, :cidade, :estado, :cep, :senha)";

        $comando = $banco->prepare($sql);

        // Bind dos parâmetros
        $comando->bindParam(':nome', $_POST["nome"]);
        $comando->bindParam(':email', $_POST["email"]);
        $comando->bindParam(':telefone', $_POST["telefone"]);
        $comando->bindParam(':data_nascimento', $_POST["data_nascimento"]);
        $comando->bindParam(':sexo', $_POST["sexo"]);
        $comando->bindParam(':cpf', $_POST["cpf"]);
        $comando->bindParam(':endereco', $_POST["endereco"]);
        $comando->bindParam(':bairro', $_POST["bairro"]);
        $comando->bindParam(':cidade', $_POST["cidade"]);
        $comando->bindParam(':estado', $_POST["estado"]);
        $comando->bindParam(':cep', $_POST["cep"]);
        $comando->bindParam(':senha', $_POST["senha"]);



        if ($comando->execute()) {
            echo "Cadastro efetuado com sucesso!";
        } else {
            echo "Erro ao cadastrar usuário.";
        }
    } catch (PDOException $e) {
        echo "Erro: " . $e->getMessage();
    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Cadastro</title>
    <link rel="stylesheet" href="cadastro2.css">
</head>

<body>
    <form method="POST" action="caralho.php" onsubmit="return validarSenhas()">
        <h3>Cadastre-se</h3>

        <label for="nome">Nome</label>
        <input type="text" name="nome" id="nome" placeholder="Digite seu nome completo" required>

        <label for="cpf">CPF</label>
        <input type="text" name="cpf" id="cpf" placeholder="Digite seu CPF" required>

        <div class="form-group">
            <div class="form-field">
                <label for="sexo">Sexo</label>
                <select name="sexo" id="sexo" required>
                    <option value="">Selecione</option>
                    <option value="Feminino">Feminino</option>
                    <option value="Masculino">Masculino</option>
                </select>
            </div>
            <div class="form-field">
                <label for="data_nascimento">Data de Nascimento</label>
                <input type="date" name="data_nascimento" id="data_nascimento" required>
            </div>
        </div>

        <label for="telefone">Telefone</label>
        <input type="text" name="telefone" id="telefone" placeholder="(XX) XXXX-XXXX" required>

        <div class="form-group">
            <div class="form-field">
                <label for="cep">CEP</label>
                <input type="text" name="cep" id="cep" placeholder="Digite seu CEP" required onblur="buscarCep()">
            </div>
            <div class="form-field">
                <label for="estado">Estado</label>
                <input type="text" name="estado" id="estado" placeholder="Digite seu estado" required>
            </div>
        </div>

        <label for="endereco">Endereço</label>
        <input type="text" name="endereco" id="endereco" placeholder="Digite seu endereço completo" required>

        <div class="form-group">
            <div class="form-field">
                <label for="bairro">Bairro</label>
                <input type="text" name="bairro" id="bairro" placeholder="Digite seu bairro" required>
            </div>
            <div class="form-field">
                <label for="cidade">Cidade</label>
                <input type="text" name="cidade" id="cidade" placeholder="Digite sua cidade" required>
            </div>
        </div>

        <label for="email">Email</label>
        <input type="email" name="email" id="email" placeholder="Digite seu email" required>

        <div class="password-container">
            <label for="senha">Senha</label>
            <input type="password" name="senha" id="senha" placeholder="Digite sua senha" required>
        </div>

        <div class="password-container">
            <label for="confirme_senha">Confirme a Senha</label>
            <input type="password" name="confirme_senha" id="confirme_senha" placeholder="Confirme sua senha" required>
        </div>

        <input type="submit" value="Continuar">
    </form>



</body>

</html