<?php
include "../include/topo.php";
include "../include/conexao.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $tipo_usuario = $_POST["tipo"];
        $sexo = $tipo_usuario === "funcionario" ? $_POST["sexo"] : null;
        $data_nascimento = $tipo_usuario === "funcionario" ? $_POST["data_nascimento"] : null;

        $sql = "INSERT INTO usuarios
            (id_usuario, nome, email, telefone, data_nascimento, sexo, cpf, endereco, bairro, cidade, estado, cep, senha)
            VALUES (NULL, :nome, :email, :telefone, :data_nascimento, :sexo, :cpf, :endereco, :bairro, :cidade, :estado, :cep, :senha)";

        $comando = $banco->prepare($sql);

        // Bind dos parâmetros
        $comando->bindParam(':nome', $_POST["nome"]);
        $comando->bindParam(':email', $_POST["email"]);
        $comando->bindParam(':telefone', $_POST["telefone"]);
        $comando->bindParam(':data_nascimento', $data_nascimento); // NULL para empresa
        $comando->bindParam(':sexo', $sexo); // NULL para empresa
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
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            function toggleFields() {
                const isFuncionario = document.getElementById('funcionario').checked;
                document.getElementById('employeeFields').style.display = isFuncionario ? 'block' : 'none';
            }

            document.getElementById('funcionario').addEventListener('change', toggleFields);
            document.getElementById('empresa').addEventListener('change', toggleFields);

            document.querySelector('form').onsubmit = function() {
                const senha = document.getElementById('senha').value;
                const confirmeSenha = document.getElementById('confirme_senha').value;

                if (senha !== confirmeSenha) {
                    alert("As senhas não coincidem. Por favor, verifique.");
                    return false;
                }
                return true;
            };
        });

        function buscarCep() {
            const cep = document.getElementById("cep").value.replace(/\D/g, '');

            if (cep.length === 8) {
                fetch(`https://viacep.com.br/ws/${cep}/json/`)
                    .then(response => response.json())
                    .then(data => {
                        if (!data.erro) {
                            document.getElementById("endereco").value = data.logradouro || '';
                            document.getElementById("bairro").value = data.bairro || '';
                            document.getElementById("cidade").value = data.localidade || '';
                            document.getElementById("estado").value = data.uf || '';
                        } else {
                            alert("CEP não encontrado.");
                        }
                    })
                    .catch(error => {
                        console.error("Erro ao buscar o CEP:", error);
                        alert("Erro ao buscar o CEP. Tente novamente.");
                    });
            } else {
                alert("Por favor, digite um CEP válido com 8 dígitos.");
            }
        }
    </script>
</head>

<body>
    <form method="POST">
        <h3>Cadastre-se</h3>

        <!-- Tipo de Usuário -->
        <label><input class="btn" type="radio" name="tipo" id="funcionario" value="funcionario" required> Funcionário</label>
        <label><input class="btn" type="radio" name="tipo" id="empresa" value="empresa"> Empresa</label>

        <label for="nome">Nome</label>
        <input type="text" name="nome" id="nome" placeholder="Digite seu nome completo" required>

        <label for="cpf">CPF</label>
        <input type="text" name="cpf" id="cpf" placeholder="Digite seu CPF" required>

        <div id="employeeFields" style="display: none;">
            <label for="sexo">Sexo</lab el>
            <select name="sexo" id="sexo">
                <option value="Feminino">Feminino</option>
                <option value="Masculino">Masculino</option>
            </select>

            <label for="data_nascimento">Data de Nascimento</label>
            <input type="date" name="data_nascimento" id="data_nascimento">
        </div>

        <label for="telefone">Telefone</label>
        <input type="text" name="telefone" id="telefone" placeholder="(XX) XXXX-XXXX" required>

        <label for="cep">CEP</label>
        <input type="text" name="cep" id="cep" placeholder="Digite seu CEP" required onblur="buscarCep()">

        <label for="estado">Estado</label>
        <input type="text" name="estado" id="estado" placeholder="Digite seu estado" required>

        <label for="endereco">Endereço</label>
        <input type="text" name="endereco" id="endereco" placeholder="Digite seu endereço completo" required>

        <label for="bairro">Bairro</label>
        <input type="text" name="bairro" id="bairro" placeholder="Digite seu bairro" required>

        <label for="cidade">Cidade</label>
        <input type="text" name="cidade" id="cidade" placeholder="Digite sua cidade" required>

        <label for="email">Email</label>
        <input type="email" name="email" id="email" placeholder="Digite seu email" required>

        <label for="senha">Senha</label>
        <input type="password" name="senha" id="senha" placeholder="Digite sua senha" required>

        <label for="confirme_senha">Confirme a Senha</label>
        <input type="password" name="confirme_senha" id="confirme_senha" placeholder="Confirme sua senha" required>

        <input type="submit" value="Continuar">
    </form>
</body>
</html>
