<?php
session_start();

// Verifica se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Dados do formulário
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Validação (exemplo simples, substitua pela sua lógica de autenticação)
    if ($username == "admin" && $password == "admin123") {
        $_SESSION["username"] = $username;
        // Salva o nome de usuário em um cookie por 1 hora
        setcookie("saved_username", $username, time() + 3600);
        header("Location: welcome.php");
        exit;
    } else {
        $error = "Erro: Nome de usuário ou senha incorretos.";
    }
}

// Limpar a sessão quando o usuário sai da página
if (isset($_POST["logout"])) {
    session_unset();
    session_destroy();
}

// Verifica se existe um cookie com o nome de usuário salvo
if (isset($_COOKIE["saved_username"])) {
    $saved_username = $_COOKIE["saved_username"];
} else {
    $saved_username = "";
}
?>

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
        <!-- Preenche o campo de usuário com o valor salvo do cookie -->
        <input type="text" required="required" name="username" size="40" value="<?php echo htmlspecialchars($saved_username); ?>">
      </div>
      <div class="cont">
        <label>Senha:</label>
        <input type="password" required="required" name="password" size="40">
      </div>
      <div id="button-container">
        <input type="submit" value="Acessar" class="botao"/>
        <input type="button" value="Limpar" class="botao" onclick="limparCampo()">
        <input type="button" value="Esqueci Senha" class="botao" onclick="forgotPassword()">
      </div> 
    </div>
    <?php if (isset($error)): ?>
        <p style='color:red;'><?php echo $error; ?></p>
    <?php endif; ?>
    </form>
  </div>
  
  <script>
    function limparCampo() {
      document.getElementsByName("username")[0].value = "";
      document.getElementsByName("password")[0].value = "";
    }
  </script>
</body>
</html>
