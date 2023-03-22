<?php

    $path = '../conf/conf.inc.php';
    if (file_exists($path))
      include_once($path);
    $path = '../../conf/conf.inc.php';
    if (file_exists($path))
      include_once($path);  

    $aviso = isset($_GET['aviso']) ? $_GET['aviso'] : ""; 
    $usuario = isset($_GET['usuario']) ? $_GET['usuario'] : "NULL"; 

    switch ($aviso) {
        case 'scad':
            $msg = "Email não Cadastrado!";
            alert($msg);
            break;
        case 'envCod':
            $msg = "Enviamos o seu Código de Recuperação para o seu Email!";
            alert($msg);
            break;
        default:
            # code...
            break;
    }
    function alert($msg) {
        echo "<script type='text/javascript'>alert('$msg');</script>";
    }
?>
<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
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
            // var_dump($_POST);
            $email = isset($_GET['email']) ? $_GET['email']: '';
            $esq = isset($_GET['esq']) ? $_GET['esq'] : "NULL"; 
            if($esq == 'NULL'){
                echo"
                    <div class='txtB'>
                        <div class='txt'>Esqueceu sua senha?</div>
                        <div>Enviaremos um link por e-mail para você alterar sua senha</div>
                            <br>
                        <form action='acao.php' method='post'>
                            <label for='email' class='txtA'>Endereço de e-mail</label>
                                <br><br>
                            <div class='col-6'>
                                <input type='text' class='form-control' placeholder='Endereço de e-mail' name='email' id='email' value='$email'required>
                            </div>
                                <br><br>
                            <a href='login.php'class='txtBlack'><b><-Voltar</b></a>
                                <br><br><br>
                            <button type='submit' id='acao' class='btn fLaranja'  name='esqsenha' value='Um'>Avançar</button>
                        </form>
                    </div>
                ";
            }elseif ($esq == 'Dois') {
                $codUser = isset($_GET['codUser']) ? $_GET['codUser'] : 0;
                //var_dump($codUser);
                echo"
                    <div class='txtB'>
                        <div class='txt'>Esqueceu sua senha?</div>
                        <div>Digite o código que foi enviado a você</div>
                            <br>
                        <form action='acao.php' method='post'>
                            <input type='hidden' name='codUser' value='$codUser'>

                            <label for='email' class='txtA'>Código</label>
                                <br><br>
                            <div class='col-6'>
                                <input type='text'class='form-control'  placeholder='Digite o código' name='cod' id='cod' required>
                            </div>
                                <br><br>
                            <a href='esqsenha.php?=NULL&email=$email'class='txtBlack'><b><-Voltar</b></a>
                                <br><br><br>
                            <button type='submit' id='acao' class='btn fLaranja' name='esqsenha' value='Dois'>Avançar</button>
                        </form>
                    </div>
                ";
            }elseif ($esq == 'Tres'){
                $codUser = isset($_GET['codUser']) ? $_GET['codUser'] : 0;
                echo"
                    <div class='txtB'>
                        <div class='txt'>Esqueceu sua senha?</div>
                        <div>Digite a sua nova senha</div>
                            <br>
                        <form action='acao.php' method='post'>
                            <input type='hidden' name='codUser' value='$codUser'>

                            <label for='senha' class='txtA'>Digite sua nova senha</label>
                            <div class='col-6'>
                                <input type='text' class='form-control' placeholder='Senha' name='senha' id='senha' required>
                            </div>
                                <br><br>
                            <label for='senhaConf' class='txtA'>Digite novamente sua nova senha</label>
                            <div class='col-6'>
                                <input type='text' class='form-control' placeholder='Senha' name='senhaConf' id='senhaConf' required>
                            </div>
                                <br><br>
                            <a href='esqsenha.php?esq=Dois'class='txtBlack'><b><-Voltar</b></a>
                                <br><br><br>
                            <button type='submit' id='acao' class='btn fLaranja' name='esqsenha' value='Tres'>Pronto!</button>
                        </form>
                    </div>
                ";
            }
        ?>
    </body>
</html>