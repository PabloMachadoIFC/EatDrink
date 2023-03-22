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
        <div class="panel-heading"><i class="fa fa-bar-chart-o fa-fw"></i> Cadastro de Estilo de Culinaria</div>
        <div class="panel-body">
            <div class="container-fluid">
                <form action="acao.php" method="post">
                    <div class="row">
                        <div class="col-lg-1">
                            <label class="form-label" for="codigo">Código</label>
                            <input class="form-control" type="text" name="codigo" id="codigo" readonly value="<?php if ($acao == 'editar') echo $dados['codigo']; else echo '0'; ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <label class="form-label" for="descricao">Descrição</label>
                            <input class="form-control" type="text" name="descricao" id="descricao" placeholder="Informe a Descrição" required value="<?php if ($acao == 'editar') echo $dados['descricao'];?>">
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
