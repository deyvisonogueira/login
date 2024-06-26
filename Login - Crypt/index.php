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

          // Criptografar a senha
          $hashed_password = crypt($password, 'senha_secreta'); // Use um salt adequado aqui

          // Validação (exemplo simples, substitua pela sua lógica de autenticação)
          if ($username == "admin" && $hashed_password == crypt("admin123", 'senha_secreta')) {
            echo "<p style='color:green;'>Bem-vindo, " . $username . "!</p>";
            echo "<p>Sua senha criptografada é: " . $hashed_password . "</p>";
          } else {
            echo "<p style='color:red;'>Erro: Nome de usuário ou senha incorretos.</p>";
            echo "<script>window.location.href = 'index.php';</script>"; // Retorne para a tela de login
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