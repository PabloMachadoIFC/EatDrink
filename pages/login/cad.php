<?php
    require_once "../../conf/Conexao.php";

    var_dump($_POST);
    var_dump($_GET);

    session_start();
    var_dump($_SESSION);
    
    $aviso = isset($_GET['aviso']) ? $_GET['aviso'] : ""; 
    $email = isset($_SESSION['email']) ? $_SESSION['email'] : "NULL"; 

    switch ($aviso) {
        case 'senhaDiferentes':
            $msg = "Senha não são Iguais!";
            alert($msg);
            break;
        case 'continuarcadastro':
            $msg = "Continue o Cadastro!";
            alert($msg);
            break;
        default:
            # code...
            break;
    }
    function alert($msg) {
        echo "<script type='text/javascript'>alert('$msg');</script>";
    }
    function confirm($msg) {
        echo "<script type='text/javascript'>confirm('$msg');</script>";
    }
?>
<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <title>Cadastro</title>
        <script src="<?=URL_BASE.'assets/js/script.js'?>" type="text/javascript"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        
            <style>
                @import url('https://fonts.googleapis.com/css2?family=Inter:wght@700&display=swap');
                h1{
                    font-size: clamp(12px,10vw,48px);
                }
                .logo{
                    margin-top: 2.5%;
                    margin-left: 2.5%; 
                }
                .txt{
                    font-family: 'Inter', sans-serif;
                    font-size: clamp(24px,10vw,30px);
                }
                .txtA{
                    font-family: 'Inter', sans-serif;
                    font-size: clamp(24px,10vw,8px);
                }
                .txtBlack{
                    color:black;
                }
                .fLaranja{
                    background-color: #F67B30;
                    color: white;
                    height: 5vh;
                    width: 14vh;
                    border-radius: 25px;
                    line-height: 30px;
                    padding: 0.7vh 20px;
                    text-transform: uppercase;
                    font-weight: bold;
                }

                .txtB{
                    margin-left: 50px;
                }
                .txtO{
                    font-size: clamp(24px,10vw,8px);
                }
                .erro{
                    display: none;
                    color: red;
                }
                
            </style>
    </head>
    <body class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <a href="<?=URL_BASE.'pages/index.php'?>"><img src="<?=URL_BASE.'assets/img/logoeatdrink.png'?>" alt="logo" width="15%" class="logo"></a>
                    </div>
                </div>
                    <br><br><br><br>
        <?php 
            echo "
                <div class='txtB'>
                    <div class='txt'>Olá! Boas vindas à EatDrink</div>
                    <div>Vamos configurar sua conta, leva só 1 minuto</div>
                        <br>
                    <form action='acao.php' method='post'>
                        <label for='' class='txtA'>Email</label>
                        <div class='col-6'>
                            <input type='text' class='form-control' placeholder='Endereço de e-mail' name='email' id='email' value = '' required>
                            <div class='erro' id='erroemail'>E-mail informado incorreto.</div>
                        </div>
                            <br><br>
                        <label for='' class='txtA'>Senha</label>
                        <div class='col-6'>
                            <input type='password' name='senha' placeholder='Digite sua senha' class='form-control' id='senha' required>
                        </div>
                            <br><br>
                        <label for='' class='txtA'>Confirmar Senha</label>
                        <div class='col-6'>
                            <input type='password' class='form-control' placeholder='Digite sua senha novamente' name='senhaConf' id='senhaConf' required>
                            <div class='erro' id='errosenha'>As senhas não são iguais.</div>
                        </div>
                            <br><br>
                        <a href='../index.php'class='txtBlack'><b><-Voltar</b></a>
                            <br><br><br>
                        <button type='submit' id='acao' class='btn fLaranja' name='acao' value='cadUm'>Avançar</button>
                    </form> 
                <div>
            ";
        ?>
    </body>
</html>
  