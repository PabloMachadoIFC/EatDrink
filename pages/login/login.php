<?php
    $aviso = isset($_GET['aviso']) ? $_GET['aviso'] : ""; 
    $usuario = isset($_GET['usuario']) ? $_GET['usuario'] : "NULL"; 

    switch ($aviso) {
        case 'senhausererrado':
            $msg = "Senha ou Usuário Errado!";
            alert($msg);
            break;
        case 'semcadastro':
            $msg = "Email não cadastrado!";
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
                <a href="index.php"><img src="../../assets/img/logoeatdrink.png" alt="logo" width="15%" class="logo"></a>
            </div>
        </div>
        <div class="row">
            <div class="txtB">
                    <br><br><br><br>
                <div class="txt">Olá! Boas vindas novamente à EatDrink</div>
                <div>Realize seu login</div>
                    <br><br>
                <div>
                    <div class="col-md-6">
                        <form action="acao.php" method="post">
                            <label for="usuario" class="txtA">Digite seu Email</label>
                                <br>
                            <input type="text" class="form-control" name="usuario" id="usuario" placeholder="Digite seu email" value = "<?php if ($usuario == 'NULL') echo ""; else echo $usuario;  ?>" required>
                    </div>
                        
                    <div class="col-md-6">
                                <br><br>
                            <label for="senha" class="txtA">Digite sua senha</label>
                                <br>
                            <input type="password" class="form-control" name="senha" id="senha" placeholder="Digite sua senha" required>
                    </div>

                    <div class="row">
                        <div class="col-4">
                                <br>
                            <input type="checkbox" name="LembrarSenha"id=""> <label for="">Lembrar da senha</label>
                        </div>
                        <div class="col-6">
                                <br>
                            <a href="esqsenha.php" class="txtBlack">Esqueceu a Senha?</a>
                        </div>
                    </div>
                        <br><br>
                    <a href="../index.php" class="txtBlack"><b><-Voltar</b></a>
                        <br><br>
                    <div>
                        <button type="submit" id="acao" class="btn fLaranja" name="acao" value="login">Login</button>
                    </form>
                
                </div>
            </div>
        </div>

    </body>
</html>