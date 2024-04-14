<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="css/estiloform.css" rel="stylesheet" type="text/css" />
</head>
<body>
  <div id="tformulario">
   
    <div>
      <h1>Logar no Sistema</h1>
      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
      <div class="img">
        <img id="login-image" src="../login/img/user.jpg" alt="Login Image">
      </div>
    </div>
    <div class="conteudo">
      <div class="cont">
        <label>Nome de Usuário:</label>
        <input type="text" id="1" required="required" name="username" size="40" >
      </div>
      <div class="cont">
        <label>Senha:</label>
        <input type="password" id="2" required="required" name="password" size="40">
      </div>
      <div id="button-container">
        <input type="submit" value="Acessar" class="botao"/>
        <input type="button" value="Limpar" class="botao" onclick="limparCampo()">
      </div> 
    </div>

      <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
          // Dados do formulário
          $username = $_POST["username"];
          $password = $_POST["password"];

          // Validação (exemplo simples, substitua pela sua lógica de autenticação)
          if ($username == "admin" && $password == "admin123") {
            // Exibindo mensagem de boas-vindas
            echo "<p style='color:green;'>Bem-vindo, $username!</p>";

            // Calculando a data de ativação da conta (uma semana após o cadastro)
            $dataCadastro = time(); // Data atual em formato Unix timestamp
            $dataAtivacao = strtotime("+1 week", $dataCadastro); // Adicionando uma semana
            echo "<p>Sua conta será ativada em: " . date("d/m/Y", $dataAtivacao) . "</p>";
          } else {
            // Redirecionando de volta para a tela de login em caso de erro de autenticação
            header("Location: ".$_SERVER['PHP_SELF']);
            exit(); // Garantir que o script pare de ser executado após o redirecionamento
          }
        }
      ?>

      <script>
        function limparCampo() {
          document.getElementById("1").value = "";
          document.getElementById("2").value = "";
        }
      </script>
    </form>
  </div>
</body>
</html>