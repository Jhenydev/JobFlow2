<?php
session_start();
include_once '../include/conexao.php';
include '../include/headerfuncionario.php';

if (isset($_POST['Gravar'])) {
  $sql = "UPDATE usuarios SET 
        nome = :nome,
        sexo = :sexo,
        data_nascimento = :data_nascimento,
        cep = :cep,
        endereco = :endereco,
        bairro = :bairro,
        cidade = :cidade,
        estado = :estado,
        telefone = :telefone,
        email = :email";

  $sql .= " WHERE id_usuario = :id_usuario";

  $comando = $banco->prepare($sql);
  $comando->bindParam(':id_usuario', $_SESSION["usuario"]["id_usuario"]);
  $comando->bindParam(':nome', $_POST['nome']);
  $comando->bindParam(':sexo', $_POST['sexo']);
  $comando->bindParam(':data_nascimento', $_POST['data_nascimento']);
  $comando->bindParam(':cep', $_POST['cep']);
  $comando->bindParam(':endereco', $_POST['endereco']);
  $comando->bindParam(':bairro', $_POST['bairro']);
  $comando->bindParam(':cidade', $_POST['cidade']);
  $comando->bindParam(':estado', $_POST['estado']);
  $comando->bindParam(':telefone', $_POST['telefone']);
  $comando->bindParam(':email', $_POST['email']);

  // Execução da consulta
  if ($comando->execute()) {
    $aviso = "Dados atualizados com sucesso!";
  } else {
    $aviso = "Erro ao atualizar dados.";
  }
}
if (isset($_POST['Gravar_Senha'])) {


  $sql = "SELECT * FROM usuarios WHERE id_usuario = :id_usuario and senha = :senha";
  $comando = $banco->prepare($sql);
  $comando->bindParam(':id_usuario', $_SESSION["usuario"]["id_usuario"]);
  $comando->bindParam(':senha', $_POST['senha']);
  $comando->execute();
  if ($registro = $comando->fetch()) {
    $sql = "UPDATE usuarios SET 
      senha = :nova_senha
     WHERE id_usuario = :id_usuario";

    $comando = $banco->prepare($sql);
    $comando->bindParam(':id_usuario', $_SESSION["usuario"]["id_usuario"]);
    $comando->bindParam(':nova_senha', $_POST['nova_senha']);

    // Execução da consulta
    if ($comando->execute()) {
      $aviso = "Senha atualizada com sucesso!";
    } else {
      $aviso = "Erro ao atualizar senha.";
    }
  } else {
    $aviso = "Senha atual incorreta.!";
  }

  echo $aviso;
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
              <img src="https://bootdey.com/img/Content/avatar/avatar6.png" class="img-circle profile-avatar" alt="User avatar">
            </div>
          </div>
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
                  <input type="text" class="form-control" name="sexo" id="sexo" value="<?php echo $_SESSION['usuario']['sexo']; ?>" required>
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
              <div class="form-group">
                <label class="col-sm-2 control-label">Telefone</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="telefone" id="telefone" value="<?php echo $_SESSION['usuario']['telefone']; ?>" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">E-mail</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="email" name="email" value="<?php echo $_SESSION['usuario']['email']; ?>" required>
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
          <div class="form-group">
            <div class="col-sm-10 col-sm-offset-2">
              <input type="submit" value="Alterar dados " name="Gravar">
            </div>
          </div>
        </form>
        <form class="form-horizontal" action="profile.php" method="POST" id="form_senha">
          <input type="hidden" name="Gravar_Senha" value="1">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="panel-title">Segurança</h4>
            </div>
            <div class="panel-body">
              <div class="form-group">
                <label class="col-sm-2 control-label">Senha Atual</label>
                <div class="col-sm-10">
                  <input type="password" class="form-control" id="senha" name="senha" value="">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Nova senha</label>
                <div class="col-sm-10">
                  <input type="password" class="form-control" name="nova_senha" id="nova_senha">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Confirme a nova senha</label>
                <div class="col-sm-10">
                  <input type="password" class="form-control" id="confirma_senha">
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-10 col-sm-offset-2">
                  <input type="submit" id="trocar_senha" value="Trocar">
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
    const submit = document.getElementById("trocar_senha");

    submit.addEventListener("click", validate);

    function validate(e) {
      e.preventDefault();

      var senha_atual = document.getElementById("senha").value;
      var nova_senha = document.getElementById("nova_senha").value;
      var confirma_senha = document.getElementById("confirma_senha").value;

      if (!senha_atual || !nova_senha || !confirma_senha) {
        alert("Informe todas as senhas.");
        return false;
      } else if (nova_senha != confirma_senha) {
        alert("As senhas não conferem.");
        return false;
      } else {
        document.getElementById("form_senha").submit()
        return true;
      }
    }
  </script>
</body>

</html>