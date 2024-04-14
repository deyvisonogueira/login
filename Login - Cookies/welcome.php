<?php
session_start();

// Verifica se o usuário está logado, se não estiver, redireciona para a página de login
if (!isset($_SESSION["username"])) {
    header("Location: index.php");
    exit;
}

// Limpa a sessão quando o usuário faz logout
if (isset($_POST["logout"])) {
    session_unset();
    session_destroy();
    header("Location: index.php");
    exit;
}

// Obtém o nome do usuário da sessão
$username = $_SESSION["username"];
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bem-vindo</title>
  <link href="css/estiloform.css" rel="stylesheet" type="text/css" />
</head>
<body>
  <div id="welcome">
    <h1>Bem-vindo, <?php echo $username; ?>!</h1>
    <p>Você está logado com sucesso.</p>
    <form action="welcome.php" method="post">
      <input type="submit" value="Sair" name="logout" class="botao" />
    </form>
  </div>
</body>
</html>