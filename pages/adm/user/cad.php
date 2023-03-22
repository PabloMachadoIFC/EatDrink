<?php 
    require_once "../../../conf/Conexao.php";
    include '../header.php';

    include 'acao.php';

    $acao = isset($_GET['acao']) ? $_GET['acao'] : '';
    $dados = array();
    if ($acao == 'editar'){
        $codigo = isset($_GET['codigo']) ? $_GET['codigo'] : '';
        $dados = findById($codigo);
        //var_dump($dados);
    }
?>
        <br>
    <div class="panel panel-default">
        <div class="panel-heading"><i class="fa fa-bar-chart-o fa-fw"></i>Cadastro de Cliente</div>
        <div class="panel-body">
            <div class="container-fluid">
                <form action="acao.php" method="post">
                    <div class="row">
                        <div class="col-lg-1">
                            <label class="form-label" for="codigo">Código</label>
                            <input class="form-control" type="text" name="codigo" id="codigo" readonly
                            value="<?php if ($acao == 'editar') echo $dados['codigo']; else echo '0'; ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <label class="form-label" for="nome">Nome</label>
                            <input class="form-control" type="text" name="nome" id="nome" placeholder="Informe o Nome Completo" required
                            value="<?php if ($acao == 'editar') echo $dados['nome'];?>">
                        </div>

                        <div class="col-lg-4">
                            <label class="form-label" for="telefone">Telefone</label>
                            <input class="form-control" type="text" name="telefone" id="telefone" placeholder="Informe o Telefone" required
                            value="<?php if ($acao == 'editar') echo $dados['telefone'];?>">
                        </div>
                        <div class="col-lg-4">
                            <label class="form-label" for="cpf">CPF</label>
                            <input class="form-control" type="text" name="cpf" id="cpf" placeholder="Informe o CPF" required
                            value="<?php if ($acao == 'editar') echo $dados['cpf'];?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <label class="form-label" for="usuario">Usuario</label>
                            <input class="form-control" type="text" name="usuario" id="usuario" placeholder="Informe o Usuario"required
                            value="<?php if ($acao == 'editar') echo $dados['usuario'];?>">
                        </div>
                        <div class="col-lg-6">
                            <label class="form-label" for="senha">Senha</label>
                            <?php if ($acao == 'editar'){
                                    echo "<input class='form-control' type='password' name='senha' id='senha' placeholder='Informe sua Senha' required value='".$dados['senha']."'>";
                                }else{
                                    echo "<input class='form-control' type='text' name='senha' id='senha' placeholder='Informe sua Senha' required value=''>";
                                }
                            ?>
                        </div>
                        <div class="col-lg-2">
                            <label class="form-label" for="dataNascimento">Data de Nascimento</label>
                            <input class="form-control" type="date" name="dataNascimento" id="dataNascimento" placeholder="Informe seu dataNascimento" required value="<?php if ($acao == 'editar') echo $dados['dataNascimento'];?>">
                        </div>
                        <div class="col-lg-7">
                            <label class="form-label" for="email">Email</label>
                            <input class="form-control" type="email" name="email" id="email" placeholder="Informe seu Email"required value="<?php if ($acao == 'editar') echo $dados['email'];?>">
                        </div>
                        <div class="col-lg-12">
                                <br>
                            <label class="form-label" for="tipoUsuario">Tipo de Usuário</label>
                            <select class="form-select" name="tipoUsuario_codigo" id="tipoUsuario_codigo">
                                <?php
                                    $conexao = Conexao::getInstance();
                                    $consulta=$conexao->query("SELECT*FROM tipoUsuario;");
                                    while($linha=$consulta->fetch(PDO::FETCH_ASSOC)){
                                        if ($linha['codigo'] == $dados['tipoUsuario_codigo']) {
                                            echo "<option value='".$linha['codigo']."' selected>".$linha['descricao']."</option>";
                                        }else{
                                            echo "<option value='".$linha['codigo']."'>".$linha['descricao']."</option>";
                                        }
                                    }

                                ?>
                            </select> 
                                    <br>
                            <label class="form-label" for="statusUsuario">Status de Usuário</label>
                            <select class="form-select" name="statusUsuario_codigo" id="statusUsuario_codigo">
                                <?php
                                    $conexao = Conexao::getInstance();
                                    $consulta=$conexao->query("SELECT*FROM statusUsuario;");
                                    while($linha=$consulta->fetch(PDO::FETCH_ASSOC)){
                                        if ($linha['codigo'] == $dados['statusUsuario_codigo']) {
                                            echo "<option value='".$linha['codigo']."' selected>".$linha['descricao']."</option>";
                                        }else{
                                            echo "<option value='".$linha['codigo']."'>".$linha['descricao']."</option>";
                                        }
                                    }

                                ?>
                            </select> 
                        </div>
                    </div>
                        <br>
                    <div class="row">  
                        <div class="col-lg-6">
                            <button class="form-control btn btn-success" type="submit" value="salvar" name="acao" id="acao"><?php if ($acao == 'editar') echo "Editar"; else echo "Inserir"?></button>
                        </div>
                        <div class="col-lg-6">
                            <!-- <a href="index.php"><button class="form-control btn btn-danger">Voltar</button></a> -->
                            <button type="button" class="form-control btn btn-danger" onclick="window.location.href='index.php';">Voltar</button> 
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php include('../footer.php'); ?>
