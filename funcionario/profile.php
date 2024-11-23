<?php
session_start();
include_once '../include/conexao.php';
include '../include/headerfuncionario.php';

if (isset($_POST['Gravar'])) {
  // Início da consulta SQL
  $sql = "UPDATE usuarios SET 
      nome = :nome,
      foto = :foto,
      sexo = :sexo,
      data_nascimento = :data_nascimento,
      cep = :cep,
      endereco = :endereco,
      bairro = :bairro,
      cidade = :cidade,
      estado = :estado,
      telefone = :telefone, 
      email = :email";

  // Verifica se o campo senha foi preenchido
  if (!empty($_POST['senha'])) {
    $sql .= ", senha = :senha";
  }

  $sql .= " WHERE id_usuario = :id_usuario";

  $comando = $banco->prepare($sql);

  // Bind dos parâmetros obrigatórios
  $comando->bindParam(':id_usuario', $_SESSION["usuario"]["id_usuario"]);
  $comando->bindParam(':nome', $_POST['nome']);
  $comando->bindParam(':foto', $_POST['foto']);
  $comando->bindParam(':sexo', $_POST['sexo']);
  $comando->bindParam(':data_nascimento', $_POST['data_nascimento']);
  $comando->bindParam(':cep', $_POST['cep']);
  $comando->bindParam(':endereco', $_POST['endereco']);
  $comando->bindParam(':bairro', $_POST['bairro']);
  $comando->bindParam(':cidade', $_POST['cidade']);
  $comando->bindParam(':estado', $_POST['estado']);
  $comando->bindParam(':telefone', $_POST['telefone']);
  $comando->bindParam(':email', $_POST['email']);

  // Bind do parâmetro de senha somente se for preenchido
  if (!empty($_POST['senha'])) {
    $comando->bindParam(':senha', $_POST['senha']);
  }

  // Execução da consulta
  if ($comando->execute()) {
    $aviso = "Dados atualizados com sucesso!";
  } else {
    $aviso = "Erro ao atualizar dados.";
  }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <!--  This file has been downloaded from bootdey.com @bootdey on twitter -->
  <!--  All snippets are MIT license http://bootdey.com/license -->
  <title>Edit profile page - Bootdey.com</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://netdna.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
  <div class="container bootstrap snippets bootdeys">
    <div class="row">
      <div class="col-xs-12 col-sm-9">
        <form class="form-horizontal" action="profile.php" method="POST">
          <div class="panel panel-default">
            <div class="panel-body text-center">
              <img id="cep" name="cep" value="<?php echo $_SESSION['usuario']['foto']; ?>
              class=" img-circle profile-avatar" alt="User avatar" style="width: 150px; height: 150px; object-fit: cover;">
              <br><br>
              <label for="upload-photo" class="btn btn-primary">Selecionar Foto</label>
              <input type="file" id="upload-photo" name="foto_usuario" accept="image/*" style="display: none;">
            </div>
          </div>

          <?php
          /*$sql = "SELECT * FROM usuarios WHERE id_funcionario = :id";
          $comando = $banco->prepare($sql);
          $comando->bindParam(":id", $id_funcionario);

          if ($registro = $comando->fetch()) {
            extract($registro, EXTR_PREFIX_ALL, "campo");
          } else {
            // Definir valores padrão ou exibir mensagem de erro
            $campo_nome = $campo_cpf =  $campo_data_nascimento = $campo_telefone = $campo_cep = $campo_endereco = $campo_bairro = $campo_cidade = $campo_estado = $campo_email = $campo_senha = "";
            echo "<p>Funcionário não encontrado.</p>";
          }
          */
          ?>
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="panel-title">informações do usuario</h4>
            </div>
            <div class="panel-body">
              <div class="form-group">
                <label class="col-sm-2 control-label">Nome</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="nome" name="nome" value="<?php echo $_SESSION['usuario']['nome'] ?>" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Sexualidade</label>
                <div class="col-sm-10">
                  <select class="form-control" nome="sexo">
                    <option value="<?php echo $_SESSION['usuario']['cpf']; ?>"></option>
                    <option>Masculina</option>
                    <option>Feminina</option>
                    <option>Outros</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Data de nascimento</label>
                <div class="col-sm-10">
                  <input type="date" class="form-control" name="data_nascimento" id="data_nascimento" value="<?php echo $_SESSION['usuario']['data_nascimento']; ?>" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">CPF</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="cpf" name="cpf" value="<?php echo $_SESSION['usuario']['cpf']; ?>" readonly>
                </div>
              </div>
            </div>
          </div>
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="panel-title">Localização</h4>
            </div>
            <div class="panel-body">
              <div class="form-group">
                <label class="col-sm-2 control-label">CEP</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="cep" name="cep" value="<?php echo $_SESSION['usuario']['cep']; ?>" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Endereco</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="endereco" name="endereco" value="<?php echo $_SESSION['usuario']['endereco']; ?>" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Bairro</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="bairro" name="bairro" value="<?php echo $_SESSION['usuario']['bairro']; ?>" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Cidade</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="cidade" name="cidade" value="<?php echo $_SESSION['usuario']['cidade']; ?>" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Estado</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="estado" name="estado" value="<?php echo $_SESSION['usuario']['estado']; ?>" required>
                </div>
              </div>
            </div>
          </div>
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="panel-title">Segurança</h4>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">Telefone</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="telefone" id="telefone" value="<?php echo $_SESSION['usuario']['telefone']; ?>" required>
              </div>
            </div>
            <div class="panel-body">
              <div class="form-group">
                <label class="col-sm-2 control-label">E-mail</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="email" name="email" value="<?php echo $_SESSION['usuario']['email']; ?>" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Senha Atual</label>
                <div class="col-sm-10">
                  <input type="password" class="form-control" id="senha" name="senha" value="">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Nova senha</label>
                <div class="col-sm-10">
                  <input type="password" class="form-control">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Confirme a nova senha</label>
                <div class="col-sm-10">
                  <input type="password" class="form-control">
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-10 col-sm-offset-2">
                  <input type="submit" value="Continuar" name="Gravar">
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
  <script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script type="text/javascript">

  </script>
</body>

</html>

<script>
  document.getElementById('upload-photo').addEventListener('change', function(event) {
    const reader = new FileReader();
    reader.onload = function(e) {
      document.getElementById('profile-avatar').src = e.target.result;
    };
    reader.readAsDataURL(event.target.files[0]);
  });
</script>