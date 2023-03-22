<?php
require_once "../../../conf/Conexao.php";
    
$acao = "";
switch($_SERVER['REQUEST_METHOD']) {
    case 'GET':  $acao = isset($_GET['acao']) ? $_GET['acao'] : ""; break;
    case 'POST': $acao = isset($_POST['acao']) ? $_POST['acao'] : ""; break;
}

switch($acao){
    case 'excluir': excluir(); break;
    case 'salvar': {
        $codigo = isset($_POST['codigo']) ? $_POST['codigo'] : "";
        if ($codigo == 0)
            salvar(); 
        else
            editar();
        break;
    }
}

function excluir(){    
    $codigo = isset($_GET['codigo']) ? $_GET['codigo']:0;
    $conexao = Conexao::getInstance();
    $stmt = $conexao->prepare("DELETE FROM usuario WHERE codigo = :codigo");
    $stmt->bindParam('codigo', $codigo, PDO::PARAM_INT);  
    $stmt->execute();
    header("location:index.php");
}

function editar(){
    
    $dados = formToArray();

    $conexao = Conexao::getInstance();

    $sql = "UPDATE usuario SET nome = '".$dados['nome']."',dataNascimento = '".$dados['dataNascimento']."',email = '".$dados['email']."',telefone = '".$dados['telefone']."',usuario = '".$dados['usuario']."', senha = '".$dados['senha']."', cpf = '".$dados['cpf']."', tipoUsuario_codigo = '".$dados['tipoUsuario_codigo']."' WHERE codigo = '".$dados['codigo']."';";

    $conexao = $conexao->query($sql);
    header("location:index.php");
}

function salvar(){
    
    $dados = formToArray();

    var_dump($dados);

    $conexao = Conexao::getInstance();

    $sql = "INSERT INTO usuario (codigo, nome, dataNascimento, email,telefone,usuario, senha, cpf, tipoUsuario_codigo) VALUES ('".$dados['codigo']."','".$dados['nome']."','".$dados['dataNascimento']."','".$dados['email']."','".$dados['telefone']."', '".$dados['usuario']."', '".$dados['senha']."', '".$dados['cpf']."', '".$dados['tipoUsuario_codigo']."')";
    
    $conexao = $conexao->query($sql);
    header("location:index.php");
}

function formToArray(){
    $codigo = isset($_POST['codigo']) ? $_POST['codigo']: 0;
    $nome = isset($_POST['nome']) ? $_POST['nome']: '';
    $usuario = isset($_POST['usuario']) ? $_POST['usuario']: '';
    $senha = isset($_POST['senha']) ? $_POST['senha']: '';
    $cpf = isset($_POST['cpf']) ? $_POST['cpf']: '';
    $email = isset($_POST['email']) ? $_POST['email']: '';
    $telefone = isset($_POST['telefone']) ? $_POST['telefone']: '';
    $dataNascimento = isset($_POST['dataNascimento']) ? $_POST['dataNascimento']: '';
    $tipoUsuario_codigo = isset($_POST['tipoUsuario_codigo']) ? $_POST['tipoUsuario_codigo']: '';

    $senha = sha1($senha);

    $dados = array(
        'codigo' => $codigo,
        'nome' => $nome,
        'dataNascimento' => $dataNascimento,
        'email' => $email,
        'telefone' => $telefone,
        'usuario' => $usuario,
        'senha' => $senha,
        'cpf' => $cpf,
        'tipoUsuario_codigo' => $tipoUsuario_codigo,
    );

    return $dados;

}

function findById($codigo){
    $conexao = Conexao::getInstance();
    $conexao = $conexao->query("SELECT*FROM usuario WHERE codigo = $codigo;");
    $result = $conexao->fetch(PDO::FETCH_ASSOC);
    return $result; 
}

?>