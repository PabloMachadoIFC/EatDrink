<?php $path = '../conf/conf.inc.php';
    if (file_exists($path))
      include_once($path);
    $path = '../../conf/conf.inc.php';
    if (file_exists($path))
      include_once($path);  
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="style.css">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <title>EatDrink</title>
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
                font-size: clamp(24px,10vw,70px);
            }
            .txtA{
                font-family: 'Open Sans', sans-serif;
                font-size: clamp(24px,10vw,10px);
            }
            .laranja{
                color: #F67B30;
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
   
            .imgA{
                /* margin-top: -50%;
                margin-left: -57%;
                margin-right: -10%;
                margin-bottom: -10%; */
                width: 100%;
                
            }
            .b{
               background: url("<?=URL_BASE.'assets/img/xxx.png'?>") no-repeat  center;
               background-size: cover;
               height: 88.4vh;
            }
            .d{
                margin-top: 7%;
                /* margin-left: 2.5%; */
            }
            .h{
                margin-bottom: 2%;
            }
            .txtB{
                margin-left: 50px;
            }
        </style>
    </head>
    <body class="container-fluid b">
        <div class="row">
            <div class="col-12">
                <a href="<?=URL_BASE.'index.php'?>"><img src="<?=URL_BASE.'assets/img/logoeatdrink.png'?>" alt="logo" width="15%" class="logo"></a>
            </div>
        </div>

        <div class="row txtB">
            <div class="col-12 d">
                <div class="row">
                    <div class="col-8 h">
                        <h1 class="txt">Soluções <span class="txt laranja">digitais </span>para <br>
                        aumentar os <span class="txt laranja">lucros </span>e <span class="txt laranja">reduzir</span> <br>
                        as despesas</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 h">
                        <a type="button" class="btn fLaranja" href="<?=URL_BASE.'pages/login/login.php'?>">Entrar</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <p class="txtA"><b>Caso não tenha se cadastrado,</b> <a href="<?=URL_BASE.'pages/login/cad.php'?>" class="laranja" name="cad" value="NULL">FAZER CADASTRO</a></p> 
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>