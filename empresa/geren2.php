<?php
$css = "geren2.css";
$navbar = "navbarempresa.php";
include "../include/topo.php";

$mensagemToastr = "";

$id_funcionario = $_GET['id'] ?? null;

if (!$id_funcionario) {
    echo "<p>Funcionário não encontrado.</p>";
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cpf = $_POST["cpf"];

    if (isset($_POST["remover"])) {
        try {
            $sql_remover = "DELETE FROM cadastro_fun WHERE cpf = :cpf";
            $comando_remover = $banco->prepare($sql_remover);
            $comando_remover->bindParam(':cpf', $_POST["cpf"]);

            if ($comando_remover->execute()) {

                $mensagemToastr = "success|Funcionario removido com sucesso!";
                exit;
            } else {
                 $mensagemToastr = "error|Erro ao remover funcionário.";
            }
        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage();
        }
    } else {
        try {
            // Verificar se o funcionário já existe (com base no CPF)
            $sql_verifica = "SELECT * FROM cadastro_fun WHERE cpf = :cpf";
            $comando_verifica = $banco->prepare($sql_verifica);
            $comando_verifica->bindParam(':cpf', $cpf);
            $comando_verifica->execute();

            if ($comando_verifica->rowCount() > 0) {
                // Se o CPF já existe, fazer o UPDATE (edição)
                $sql = "UPDATE cadastro_fun SET nome = :nome, cargo = :cargo, cep = :cep, valor_hora = :valor_hora WHERE cpf = :cpf";
            } else {
                // Se o CPF não existe, fazer o INSERT (novo cadastro)
                $sql = "INSERT INTO cadastro_fun (id_funcionario, nome, cpf, cargo, cep, valor_hora)
                    VALUES (NULL, :nome, :cpf, :cargo, :cep, :valor_hora)";
            }

            $comando = $banco->prepare($sql);

            // Bind dos parâmetros
            $comando->bindParam(':nome', $_POST["nome"]);
            $comando->bindParam(':cpf', $_POST["cpf"]);
            $comando->bindParam(':cargo', $_POST["cargo"]);
            $comando->bindParam(':cep', $_POST["cep"]);
            $comando->bindParam(':valor_hora', $_POST["valor_hora"]);

            if ($comando->execute()) {
                $mensagemToastr = "success|Dados alterados com sucesso!";
            } else {
                $mensagemToastr = "error|Erro ao salvar os dados.";
            }
        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage();
        }
    }
}



?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
</head>

<body>
    <div class="header">
        EDITAR OU REMOVER FUNCIONÁRIO
    </div>

    <div class="container">

        <?php
        $sql = "SELECT * FROM cadastro_fun WHERE id_funcionario = :id";
        $comando = $banco->prepare($sql);
        $comando->bindParam(":id", $id_funcionario);
        $comando->execute();

        if ($registro = $comando->fetch()) {
            extract($registro, EXTR_PREFIX_ALL, "campo");
        } else {
            // Definir valores padrão ou exibir mensagem de erro
            $campo_nome = $campo_cpf = $campo_cargo = $campo_cep = $campo_valor_hora = "";
            echo "<p>Funcionário não encontrado.</p>";
        }
        ?>


        <div class="form-container">

            <h2>Editar Funcionário</h2>

            <form action="" method="POST">
                <a href="frequenciafun.php?id=<?php echo $id_funcionario; ?>" class="frequencia-button">Gerenciar Frequência</a>
                <a href="ganhosfun.php?id=<?php echo $id_funcionario; ?>&nome=<?php echo $campo_nome; ?>" class="frequencia-button">Ver ganhos</a>
                <input type="text" id="nome" name="nome" value="<?php echo $campo_nome; ?>" readonly>
                <input type="text" id="cpf" name="cpf" value="<?php echo $campo_cpf; ?>" readonly>
                <input type="text" id="cargo" name="cargo" value="<?php echo $campo_cargo; ?>" required>
                <div class="cep-valor-hora">
                    <input type="text" id="cep" name="cep" value="<?php echo $campo_cep; ?>" readonly>
                    <input type="number" id="valor_hora" name="valor_hora" value="<?php echo $campo_valor_hora; ?>" required>
                </div>

                <button class="salvar" type="submit">Salvar Alterações</button>
                <button type="submit" name="remover" class="remover-button">Remover Funcionário</button>
            </form>
        </div>

    </div>

    <?php
    include "../include/rodape.php";
    ?>

    <script>
        $(document).ready(function() {
            <?php
            if (!empty($mensagemToastr)) {
                list($tipo, $mensagem) = explode('|', $mensagemToastr);
                echo "toastr.$tipo('$mensagem');";
            }
            ?>
        });
    </script>       
</body>

</html>