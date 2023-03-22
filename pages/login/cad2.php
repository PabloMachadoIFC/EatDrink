<?php
    require_once "../../conf/Conexao.php";

    var_dump($_POST);
    var_dump($_GET);

    session_start();
    var_dump($_SESSION);
    
    $aviso = isset($_SESSION['aviso']) ? $_SESSION['aviso'] : ""; 
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
            $usuario = isset($_GET['usuario']) ? $_GET['usuario'] : ""; 
            $email = isset($_GET['email']) ? $_GET['email'] : ""; 

            $conexao = Conexao::getInstance();
            $consulta=$conexao->query("SELECT*FROM `usuario` WHERE usuario.usuario = '$usuario' OR usuario.email = '{$_SESSION['email']}';");
            
            while($linha=$consulta->fetch(PDO::FETCH_ASSOC)){
                echo "
                <div class='txtB'>
                    <div class='row'>
                        <div class='col-6'>
                            <div class='txt'>Vamos cadastrar a sua empresa</div>
                            <div class='txtO'>Vamos Configurar sua Empresa, leva só 1 minuto</div>
                        </div>
                        <div class='col-6'>
                            <label for='cnpj' class='txtA'>Qual o número do CNPJ?</label>
                            <input type='text'  class='form-control' placeholder='XX. XXX. XXX/0001-XX' name='cnpj' id='cnpj' value='' required>
                        </div>
                    </div>
                        <br>
                    <form action='acao.php' method='post'>
                        
                        <input type='hidden' name='codigoUser' id='codigoUser' value = '{$linha['codigo']}'>
                        <input type='hidden' name='codigoEst' id='codigoEst' value = '' required>
                        
                        <div class='row'>
                            <div class='col-6'>
                                <label for='nome' class='txtA'>Nome Completo</label>
                                <input type='text' name='nome'  class='form-control' placeholder='Digite seu nome e sobrenome' id='nome' value='{$linha['nome']}' required>
                            </div>
                            <div class='col-6'>
                                <label for='cpf' class='txtA'>Qual o número do CPF?</label>
                                <input type='text'  class='form-control' placeholder='000.000.000-00' name='cpf' id='cpf' value='{$linha['cpf']}' required>
                            </div>
                        </div>
                            <br>
                        <div class='row'>
                            <div class='col-6'>
                                <label for='nomeEstabelecimento' class='txtA'>Nome do Estabelecimento</label>
                                <input type='text'  class='form-control' placeholder='Digite o nome do estabelecimento' name='nomeEstabelecimento' id='nomeEstabelecimento' value='' required>
                            </div>
                            <div class='col-6'>
                                <label for='cep' class='txtA'>CEP</label>
                                <input type='text'  class='form-control' placeholder='00.000-000' name='cep' id='cep' value='' required>
                            </div>
                        </div>
                            <br>
                        <div class='row'>
                            <div class='col-6'>
                                <label for='telefone' class='txtA'>Telefone de contato</label>
                                <input type='text'  class='form-control' placeholder='Endereço de e-mail' name='telefone' id='telefone' value='{$linha['telefone']}' required>
                            </div>
                            <div class='col-6'>
                                <label for='estiloCulinaria' class='txtA'>Qual o estilo de culinária?</label>
                                <select class='form-select' name='estiloculinaria_codigo' id='estiloculinaria_codigo'>";
                                $conexaoA = Conexao::getInstance();
                                $consultaA=$conexaoA->query("SELECT*FROM estiloculinaria;");
                                while($linhaA=$consultaA->fetch(PDO::FETCH_ASSOC)){
                                    echo "<option value='".$linhaA['codigo']."' selected>".$linhaA['descricao']."</option>";
                                } echo"
                                </select>
                            </div>
                        </div>
                            <br><br>
                        <a href='cad.php'class='txtBlack'><b><-Voltar</b></a>
                                <br><br><br>
                        <button type='submit' id='acao' name='acao' class='btn fLaranja' value='cadDois'>Cadastrar</button>
                        
                    </form> 
                ";
            }
        ?>
        
    </body>
</html>
  