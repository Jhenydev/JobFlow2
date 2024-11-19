<?php
session_start();
include_once '../include/conexao.php';

include '../include/headerfuncionario.php';
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
        <form class="form-horizontal">
          <div class="panel panel-default">
            <div class="panel-body text-center">
              <img src="https://bootdey.com/img/Content/avatar/avatar6.png" class="img-circle profile-avatar" alt="User avatar">
            </div>
          </div>
          <?php
          $sql = "SELECT * FROM usuarios WHERE id_funcionario = :id";
          $comando = $banco->prepare($sql);
          $comando->bindParam(":id", $id_funcionario);
          $comando->execute();

          if ($registro = $comando->fetch()) {
            extract($registro, EXTR_PREFIX_ALL, "campo");
          } else {
            // Definir valores padrão ou exibir mensagem de erro
            $campo_nome = $campo_cpf =  $campo_data_nascimento = $campo_telefone = $campo_cep = $campo_endereco = $campo_bairro = $campo_cidade = $campo_estado = $campo_email = $campo_senha = "";
            echo "<p>Funcionário não encontrado.</p>";
          }
          ?>
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="panel-title">informações do usuario</h4>
            </div>
            <div class="panel-body">
              <div class="form-group">
                <label class="col-sm-2 control-label">Nome</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="nome" name="nome" value="<?php echo $campo_nome; ?>" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Sexualidade</label>
                <div class="col-sm-10">
                  <select class="form-control">
                    <option selected=""></option>
                    <option>Masculina</option>
                    <option>Feminina</option>
                    <option>Outros</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">cPF</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="cpf" name="cpf" value="<?php echo $campo_cpf; ?>" readonly>
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
                  <input type="text" class="form-control" id="cep" name="cep" value="<?php echo $campo_cep; ?>" readonly>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Endereco</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="endereco" name="endereco" value="<?php echo $campo_endereco; ?>" readonly>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Bairro</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="bairro" name="bairro" value="<?php echo $campo_bairro; ?>" readonly>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Cidade</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="cidade" name="cidade" value="<?php echo $campo_cidade; ?>" readonly>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Estado</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="estado" name="estado" value="<?php echo $campo_estado; ?>" readonly>
                </div>
              </div>
            </div>
          </div>
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="panel-title">Segurança</h4>
            </div>
            <div class="panel-body">
              <div class="form-group">
                <label class="col-sm-2 control-label">E-mail</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="email" name="email" value="<?php echo $campo_email; ?>" readonly>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Senha Atual</label>
                <div class="col-sm-10">
                  <input type="password" class="form-control" id="senha" name="senha" value="<?php echo $campo_senha; ?>" readonly>
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
                  <input type="submit" value="Continuar">
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