<?php
    session_start();
    if (!isset($_SESSION['usuario']))
        header("location:login.php");
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Página Principal</title>
</head>
<body>
    <h1>Página Principal</h1>
    <a href="acao.php?acao=logoff">Logoff</a>
    <?php
        echo "Bem-vindo <b>".$_SESSION['usuario']."<b>";
    ?>
            <br>
    <a href="../adm/user/">Usuário</a>
            <br>
    <a href="../adm/tipouser/">Tipo Usuário</a>
        <br>
    <a href="../adm/user/">user</a>
        <br>
    <a href="../adm/user/">user</a>
        <br>
    <a href="../adm/user/">user</a>
    
</body>
</html>