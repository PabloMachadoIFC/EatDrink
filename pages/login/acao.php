<?php
    require_once "../../conf/Conexao.php";
    $acao = "";
    switch($_SERVER['REQUEST_METHOD']) {
        case 'GET':  
            $acao = isset($_GET['acao']) ? $_GET['acao'] : ""; 
            break;
        case 'POST': 
            $acao = isset($_POST['acao']) ? $_POST['acao'] : ""; 
            break;
    }

    if ($acao == "login"){
        $usuario = isset($_POST['usuario']) ? $_POST['usuario'] : "NULL";
        $email = $usuario;
        $senha = isset($_POST['senha']) ? $_POST['senha'] : "NULL";

        if ($usuario == 'admin' and $senha == 'admin') {
            session_start();
            $_SESSION['usuario'] = $usuario;
                header('Location:../adm/index.php');
        }elseif ($usuario != 'NULL' || $senha != 'NULL') { 
            $conexao = Conexao::getInstance();
            $consulta=$conexao->query("SELECT * FROM `usuario` WHERE usuario = '$usuario' and senha = '$senha';");
            $linha=$consulta->fetch(PDO::FETCH_ASSOC);
            if(($usuario == $linha['usuario'] and $senha == $linha['senha']) AND ($linha['email'] == NULL || $linha['nome'] == NULL)){
                echo "<input type='hidden' name='senha' value='$senha'/>";
                session_start();
                $_SESSION['codigo'] = $codigo;
                $_SESSION['email'] = $email;
                $_SESSION['aviso'] = "continuarcadastro";
                header("location: ".URL_BASE.'pages/login/cad2.php');
            }elseif($usuario == $linha['usuario'] and $senha == $linha['senha']){
                session_start();
                    $_SESSION['usuario'] = $usuario;
                header("location: ".URL_BASE.'pages/adm'."");
            }elseif(($usuario == $linha['usuario'] and $senha == $linha['senha']) == NULL){
                header('Location:login.php?aviso=semcadastro');
            }else{
                header('Location:login.php?aviso=senhausererrado');
            }
        }else{
            header('Location:login.php');
        }
    }elseif ($acao == "logoff"){
        session_start();
        session_destroy();
            header('Location:login.php');
    }elseif ($acao == "cadUm"){
        $codigo = isset($_POST['codigo']) ? $_POST['codigo'] : 0;
        $nome = isset($_POST['nome']) ? $_POST['nome'] : "";
        $dataNascimento = isset($_POST['dataNascimento']) ? $_POST['dataNascimento'] : "";
        $telefone = isset($_POST['telefone']) ? $_POST['telefone'] : "";
        $email = isset($_POST['email']) ? $_POST['email'] : "";
        $usuario = $email;
        $senha = isset($_POST['senha']) ? $_POST['senha'] : "";
        $senhaConf = isset($_POST['senhaConf']) ? $_POST['senhaConf'] : "";
        $cpf = isset($_POST['cpf']) ? $_POST['cpf'] : "";
        $tipoUsuario_codigo = 2;

        $conexao = Conexao::getInstance();
        $consulta=$conexao->query("SELECT * FROM `usuario` WHERE email = '$email' and senha = '$senha';");
        $linha=$consulta->fetch(PDO::FETCH_ASSOC);
        if($email == $linha['email'] and $senha == $linha['senha']){
            // $codigoA = $_SESSION['codigo'];
            // $emailA = $_SESSION['email'];
            $_SESSION['codigo'] = $codigo;
            $_SESSION['email'] = $email;
            //header("location: ".URL_BASE.'pages/login/cad.php?cad=Dois&codigo='.$codigo."&aviso=continuarcadastro&email=".$email);
            header("location: ".URL_BASE.'pages/login/cad2.php');
        }
        elseif($senha == $senhaConf){
            $conexao = conexao::getInstance();
            $sql = "INSERT INTO `usuario` (`codigo`, `nome`,`dataNascimento`,`email`,`telefone`, `usuario`, `senha`,`cpf`,  `tipoUsuario_codigo`) VALUES ('$codigo', '$nome','$dataNascimento','$email','$telefone', '$usuario', '$senha','$cpf',  '$tipoUsuario_codigo')";
            $conexao = $conexao->query($sql);

            session_start();
            $_SESSION['codigo'] = $codigo;
            $_SESSION['email'] = $email;
            header("location: ".URL_BASE."pages/login/cad2.php");
        }else{
            header('Location:cad.php?aviso=senhaDiferentes');
        }
        
    }elseif ($acao == "cadDois"){
        $codigo = isset($_POST['codigoUser']) ? $_POST['codigoUser'] : 0;
        $nome = isset($_POST['nome']) ? $_POST['nome'] : "";
        $dataNascimento = isset($_POST['dataNascimento']) ? $_POST['dataNascimento'] : "";
        $telefone = isset($_POST['telefone']) ? $_POST['telefone'] : "";
        $usuario = isset($_POST['usuario']) ? $_POST['usuario'] : "";
        $cpf = isset($_POST['cpf']) ? $_POST['cpf'] : "";
        $tipoUsuario_codigo = 2;

        $codigoC = 0;
        $nomeEstabelecimento = isset($_POST['nomeEstabelecimento']) ? $_POST['nomeEstabelecimento'] : "";
        $cnpj = isset($_POST['cnpj']) ? $_POST['cnpj'] : "";
        $cep = isset($_POST['cep']) ? $_POST['cep'] : "";
        $estiloCulinaria = isset($_POST['estiloCulinaria']) ? $_POST['estiloCulinaria'] : "";
        $codigoSite = '';

        $codigoD = 0;
        $cep = preg_replace("/[^0-9]/", "", $cep);
        $endereco = get_endereco($cep);

        var_dump($_GET);
        echo"<br>";
        var_dump($_POST);

        $acao = isset($_POST['acaoDois']) ? $_POST['acaoDois'] : "";

        $conexaoB = conexao::getInstance();
        $sqlB = "INSERT INTO `map` (`codigo`, `cep`, `rua`, `bairro`, `cidade`, `estado`) VALUES ('$codigoD', '$endereco->cep', '$endereco->logradouro', '$endereco->bairro', '$endereco->localidade', '$endereco->uf');";
        $conexaoB = $conexaoB->query($sqlB);

        $conexaoA = conexao::getInstance();
        $sqlA = "INSERT INTO `estabelecimento` (`codigo`, `nome`, `cnpj`, `cep`, `estiloculinaria`, `codigo_dono`, `codigo_site`) VALUES ('$codigoC', '$nomeEstabelecimento', '$cnpj', '$cep', '$estiloCulinaria', '$codigo', '$codigoSite');";
        $conexaoA = $conexaoA->query($sqlA);

        $conexao = conexao::getInstance();
        
        $sql = "UPDATE `usuario` SET `codigo` = '$codigo', `nome` = '$nome', `dataNascimento` = '$dataNascimento', `telefone` = '$telefone', `cpf` = '$cpf' WHERE (`codigo` = '$codigo');";
        $conexao = $conexao->query($sql);
        session_start();
        session_destroy();
        header('Location:login.php');

    }
    
    $esqsenha = isset($_POST['esqsenha']) ? $_POST['esqsenha']:'';
    $cod = isset($_POST['cod']) ? $_POST['cod']:'';
    switch ($esqsenha) {
        case 'Um':
            $email = isset($_POST['email']) ? $_POST['email'] : "";

            $conexao = Conexao::getInstance();
            $consulta=$conexao->query("SELECT * FROM `usuario` WHERE email = '$email';");
            $linha=$consulta->fetch(PDO::FETCH_ASSOC);

            if ($linha['email'] == NULL){
                header('Location:esqsenha.php?esq=NULL&aviso=scad');
            }else {
                $codRec = str_pad(rand(1,999999), 6, "0", STR_PAD_LEFT);
                    var_dump($codRec);
                $codUser = $linha['codigo'];
                header('Location:esqsenha.php?esq=Dois&aviso=envCod&cod='.$codRec.'&codUser='.$codUser);
            }
            break;
        case 'Dois':
            $codUser = isset($_POST['codUser']) ? $_POST['codUser']: 0;
            if ($cod == $codRec) {
                header('Location:esqsenha.php?esq=Dois&aviso=coderrado&codUser='.$codUser);
            }else{
                var_dump($_POST);
                header('Location:esqsenha.php?esq=Tres&codUser='.$codUser);
            }
            break;
        case 'Tres':
            $codUser = isset($_POST['codUser']) ? $_POST['codUser']: 0;
            $senha = isset($_POST['senha']) ? $_POST['senha']: ''; 
            $senhaConf = isset($_POST['senhaConf']) ? $_POST['senhaConf']: ''; 

            $conexao = conexao::getInstance();
            if ($senha == $senhaConf) {
                var_dump($_POST);
                $sql = "UPDATE `usuario` SET `senha` = '$senha' WHERE (`codigo` = '$codUser');";
                $conexao = $conexao->query($sql);
            }
            header('Location:login.php');
            break;
        
        default:
            # code...
            break;
    }
    function get_endereco($cep){
        // formatar o cep removendo caracteres nao numericos
        $url = "http://viacep.com.br/ws/$cep/xml/";

        $xml = simplexml_load_file($url);

        //var_dump();

        return $xml;
      }
?>