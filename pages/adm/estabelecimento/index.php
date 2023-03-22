    <?php 
        require_once "../../../conf/Conexao.php";
        include '../header.php'; 

        //session_start();
        $email = $_SESSION['usuario'];
    
        
        //var_dump($_SESSION);

        $conexao = Conexao::getInstance();
                $filtro = isset($_GET['filtro']) ? $_GET['filtro']: "";
    ?>
        <br>
    <a class="form-control btn btn-primary" href="cad.php" >Cadastrar</a>
        <hr>
    <table class="table table-striped">
        <thead>
            <tr class='table-titulo'>
                <th>Código</th>
                <th>Nome</th>
                    <?php
                        if($email == "admin") {
                            echo "<th>Dono</th>";
                        }
                    ?>
                <th>Tipo Culinaria</th>
                <th>Detalhes</th>
                <th>Editar</th>
                <th>Excluir</th>
            </tr>
        </thead>
        <tbody>
            <?php
                
                
                if ($email == "admin") {
                    $consulta=$conexao->query("SELECT estabelecimento.codigo as EstCod,estabelecimento.nome as EstNome, usuario.codigo as UserCod,usuario.nome as UserNome FROM estabelecimento LEFT JOIN usuario ON estabelecimento.codigo_dono = usuario.codigo WHERE estabelecimento.nome LIKE '$filtro%';");
                    while($linha=$consulta->fetch(PDO::FETCH_ASSOC)){
                        echo "
                            <td>{$linha['EstCod']}</td>
                            <td>{$linha['EstNome']}</td>
                            <td>{$linha['UserNome']} ({$linha['UserCod']})</td>
                            <td>{$linha['EstNome']}</td>
                            <td><a class='btn btn-info' href='show.php?codigo={$linha['EstCod']}&codigoDono={$linha['UserCod']}'>Detalhes</a></td>
                            <td><a class='btn btn-warning' href='cad.php?acao=editar&codigo={$linha['EstCod']}'>Editar</a></td>
                            <td><a class='btn btn-danger' onClick = 'return excluir();' href='acao.php?acao=excluir&codigo={$linha['EstCod']}'.>Excluir</a></td>
                            </tr>\n
                        ";
                    
                    }
                }else{
                    $consulta=$conexao->query("SELECT estabelecimento.codigo as EstCod,estabelecimento.nome as EstNome, usuario.codigo as UserCod,usuario.nome as UserNome FROM estabelecimento LEFT JOIN usuario ON estabelecimento.codigo_dono = usuario.codigo WHERE usuario.email = '$email';");
                    while($linha=$consulta->fetch(PDO::FETCH_ASSOC)){
                        echo "
                            <td>{$linha['EstCod']}</td>
                            <td>{$linha['EstNome']}</td>
                            <td>{$linha['EstNome']}</td>
                            <td><a class='btn btn-info' href='show.php?codigo={$linha['EstCod']}'>Detalhes</a></td>
                            <td><a class='btn btn-warning' href='cad.php?acao=editar&codigo={$linha['EstCod']}'>Editar</a></td>
                            <td><a class='btn btn-danger' onClick = 'return excluir();' href='acao.php?acao=excluir&codigo={$linha['EstCod']}'.>Excluir</a></td>
                            </tr>\n
                        ";
                    
                    }
                }

            ?>
        </tbody>
    </table>

<?php include('../footer.php'); ?>