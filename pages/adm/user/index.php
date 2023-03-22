    <?php 
        require_once "../../../conf/Conexao.php";
        include '../header.php'; 
    ?>
        <br>
    <a class="form-control btn btn-primary" href="cad.php" >Cadastrar</a>
        <hr>
    <table class="table table-striped">
        <thead>
            <tr class='table-titulo'>
                <th>Código</th>
                <th>Nome</th>
                <th>User</th> 
                <th>Tipo Usuário</th>
                <th>Detalhes</th>
                <th>Editar</th>
                <th>Excluir</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $conexao = Conexao::getInstance();
                $filtro = isset($_GET['filtro']) ? $_GET['filtro']: "";
                $consulta=$conexao->query("SELECT *FROM usuario WHERE nome like '$filtro%';");
                while($linha=$consulta->fetch(PDO::FETCH_ASSOC)){
                    echo "
                        <td>{$linha['codigo']}</td>
                        <td>{$linha['nome']}</td>
                        <td>{$linha['usuario']}</td>
                        <td>{$linha['email']}</td>
                        <td><a class='btn btn-info' href='show.php?codigo={$linha['codigo']}'>Detalhes</a></td>
                        <td><a class='btn btn-warning' href='cad.php?acao=editar&codigo={$linha['codigo']}'>Editar</a></td>
                        <td><a class='btn btn-danger' onClick = 'return excluir();' href='acao.php?acao=excluir&codigo={$linha['codigo']}'.>Excluir</a></td>
                        </tr>\n
                    ";
                
                }
            ?>
        </tbody>
    </table>

<?php include('../footer.php'); ?>