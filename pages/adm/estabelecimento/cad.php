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
    //var_dump($_GET);
        //echo "<br>";
    //var_dump($_POST);
?>
        <br>
    <div class="panel panel-default">
        <div class="panel-heading"><i class="fa fa-bar-chart-o fa-fw"></i> Cadastro de Estabelecimentos</div>
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
                            <label class="form-label" for="cnpj">CNPJ</label>
                            <input class="form-control" type="text" name="cnpj" id="cnpj" placeholder="Informe o CNPJ" required
                            value="<?php if ($acao == 'editar') echo $dados['cnpj'];?>">
                        </div>
                        <div class="col-lg-4">
                            <label class="form-label" for="cep">CEP</label>
                            <input class="form-control" type="text" name="cep" id="cep" placeholder="Informe o CEP" required
                            value="<?php if ($acao == 'editar') echo $dados['cep'];?>">
                        </div>
                    </div>
                    <div class="row">
                        <center>
                        <div class="col-lg-3">
                                <br>
                            <label class="form-label" for="estiloculinaria">Estilo de Culinaria</label>
                            <select class="form-select" name="estiloculinaria_codigo" id="estiloculinaria_codigo">
                                <?php
                                    $conexao = Conexao::getInstance();
                                    $consulta=$conexao->query("SELECT*FROM estiloculinaria;");
                                    while($linha=$consulta->fetch(PDO::FETCH_ASSOC)){
                                        if ($linha['codigo'] == $dados['estiloculinaria_codigo']) {
                                            echo "<option value='".$linha['codigo']."' selected>".$linha['descricao']."</option>";
                                        }else{
                                            echo "<option value='".$linha['codigo']."'>".$linha['descricao']."</option>";
                                        }
                                    }

                                ?>
                            </select> 
                        </div>
                        <div class="col-lg-3">
                                <br>
                            <label class="form-label" for="usuario">Dono</label>
                            <select class="form-select" name="usuario_codigo" id="usuario_codigo">
                                <?php
                                    $conexao = Conexao::getInstance();
                                    $consulta=$conexao->query("SELECT*FROM usuario;");
                                    while($linha=$consulta->fetch(PDO::FETCH_ASSOC)){
                                        if ($linha['codigo'] == $dados['usuario_codigo']) {
                                            echo "<option value='".$linha['codigo']."' selected>".$linha['nome']."</option>";
                                        }else{
                                            echo "<option value='".$linha['codigo']."'>".$linha['nome']."</option>";
                                        }
                                    }

                                ?>
                            </select> 
                        </div>
                        </center>
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
