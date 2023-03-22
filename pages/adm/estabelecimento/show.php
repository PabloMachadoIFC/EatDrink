<?php 
    require_once "../../../conf/Conexao.php";
    include '../header.php' 
?> 
        <br>
    <center>
        <div class="panel panel-default">
            <div class="panel-heading"><i class="fa fa-info-circle fa-fw"></i><b>Detalhes do Estabelecimento</b></div>
            <div class="panel-body">
                <div class="container-fluid">
                    <div class="card" style="width: 18rem;">
                        <?php
                            $codigo = isset($_GET['codigo']) ? $_GET['codigo']:0;

                            $conexao = Conexao::getInstance();
                            $consulta=$conexao->query("SELECT estabelecimento.codigo as EstCod,estabelecimento.nome as EstNome, usuario.codigo as UserCod,usuario.nome as UserNome FROM estabelecimento LEFT JOIN usuario ON estabelecimento.codigo_dono = usuario.codigo WHERE estabelecimento.codigo = '$codigo';");
                            
                            while($linha=$consulta->fetch(PDO::FETCH_ASSOC)){
                                echo "<div class='card-body'>";
                                echo "<div class='card-header'><b>Código:</b> ".$linha["EstCod"]."</div>";
                                echo "<h5 class='card-title'><b>Nome:</b> ".$linha["EstNome"]."</h5>";
                                echo "<p class='card-text'><b>Dono:</b> ".$linha["UserNome"]." (".$linha["UserCod"].")</p>";

                                echo 
                                    "<a class='btn btn-danger' onClick='return excluir();' href='acao.php?acao=excluir&codigo=".$linha['EstCod']."'.>Excluir</a>"."&nbsp;&nbsp;".
                                    "<a class='btn btn-warning' href='cad.php?acao=editar&codigo=".$linha['EstCod']."'.>Editar</a>"."&nbsp;&nbsp;".
                                    "<a class='btn btn-primary' href='index.php'.>Voltar</a>
                                ";
                            }
                        ?>  
                    </div>
                </div>
            </div>
        </div>
    </center>
<?php include '../footer.php' ?>