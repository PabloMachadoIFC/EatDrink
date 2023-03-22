    <?php 

      require_once "../../conf/Conexao.php";
      include 'header.php'; 

    ?>

      <div class="col-lg-12">
        <h1 class="page-header">Dashboard</h1>
      <!-- /.col-lg-12 -->
      </div>
    <!-- /.row -->
    <div class="row">
      <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
          <div class="panel-heading">
            <div class="row">
              <div class="col-xs-3">
                <i class="fa fa-user fa-5x"></i>
              </div>
              <div class="col-xs-9 text-right">
                  <div class="huge">
                    <?php 

                        $conexao = Conexao::getInstance();
                        $consulta=$conexao->query("SELECT COUNT(*) AS TotalUser FROM usuario;");
                        $linha=$consulta->fetch(PDO::FETCH_ASSOC);
                        echo $linha['TotalUser']; 
                    
                    ?>
                  </div>
                <div>Clientes</div>
              </div>
            </div>
          </div>
          <a href="user/index.php">
            <div class="panel-footer">
              <span class="pull-left">Detalhes</span>
              <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
              <div class="clearfix"></div>
            </div>
          </a>
        </div>
      </div>
      <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
          <div class="panel-heading">
            <div class="row">
              <div class="col-xs-3">
                <i class="fa fa-tasks fa-5x"></i>
              </div>
              <div class="col-xs-9 text-right">
                <div class="huge">
                  <?php 

                    $conexao = Conexao::getInstance();
                    if ($email == "admin") {
                      $consulta=$conexao->query("SELECT COUNT(*) AS TotalEst FROM estabelecimento;");
                      $linha=$consulta->fetch(PDO::FETCH_ASSOC);
                      echo $linha['TotalEst']; 
                    }
                    else {
                      $consulta=$conexao->query("SELECT COUNT(*) AS TotalEst FROM estabelecimento LEFT JOIN usuario ON estabelecimento.codigo_dono = usuario.codigo WHERE usuario.email = '$email';");
                      $linha=$consulta->fetch(PDO::FETCH_ASSOC);
                      echo $linha['TotalEst']; 
                    }

                  ?>
                </div>
                <div>Estabelecimentos</div>
              </div>
            </div>
          </div>
          <a href="<?=URL_BASE.'pages/adm/estabelecimento/'?>">
            <div class="panel-footer">
              <span class="pull-left">Destalhes</span>
              <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
              <div class="clearfix"></div>
            </div>
          </a>
        </div>
      </div>
      <div class="col-lg-3 col-md-6">
        <div class="panel panel-yellow">
          <div class="panel-heading">
            <div class="row">
              <div class="col-xs-3">
                <i class="fa fa-shopping-cart fa-5x"></i>
              </div>
              <div class="col-xs-9 text-right">

                <div class="huge">
                  <?php 

                    $conexao = Conexao::getInstance();
                    $consulta=$conexao->query("SELECT COUNT(*) AS TotalEst FROM estabelecimento;");
                    $linha=$consulta->fetch(PDO::FETCH_ASSOC);
                    echo $linha['TotalEst']; 

                  ?>
                </div>

                <div>Sites</div>

              </div>
            </div>
          </div>
          <a href="#">
            <div class="panel-footer">
              <span class="pull-left">Destalhes</span>
              <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
              <div class="clearfix"></div>
            </div>
          </a>
        </div>
      </div>
      <div class="col-lg-3 col-md-6">
        <div class="panel panel-red">
          <div class="panel-heading">
            <div class="row">
              <div class="col-xs-3">
                <i class="fa fa-support fa-5x"></i>
              </div>
              <div class="col-xs-9 text-right">
                
                <div class="huge">
                  <?php 

                    $conexao = Conexao::getInstance();
                    $consulta=$conexao->query("SELECT COUNT(*) AS TotalEst FROM estabelecimento;");
                    $linha=$consulta->fetch(PDO::FETCH_ASSOC);
                    echo $linha['TotalEst']; 

                  ?>
                </div>

                <div>Produtos</div>
                
              </div>
            </div>
          </div>
          <a href="#">
            <div class="panel-footer">
              <span class="pull-left">Destalhes</span>
              <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
              <div class="clearfix"></div>
            </div>
          </a>
        </div>
      </div>
    </div>
    <!-- /.row -->
    <div class="row">
      <div class="col-lg-8">
        <div class="panel panel-default">
          <div class="panel-heading">
            <i class="fa fa-bar-chart-o fa-fw"></i> Area Chart Example
            <div class="pull-right"></div>
          </div>
          <!-- /.panel-heading -->
          <div class="panel-body">
            <div>
              <?php 
                //include("graf.php");
              ?>
            </div>
          </div>
          <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
        <div class="panel panel-default">
          <div class="panel-heading">
            <i class="fa fa-bar-chart-o fa-fw"></i> Bar Chart Example
            <div class="pull-right">
            </div>
          </div>
          <!-- /.panel-heading -->
          <div class="panel-body">
            <div class="row">
              <div class="col-lg-4">
                <div id="morris-table-left-div" class="table-responsive">   
                </div>
                <!-- /.table-responsive -->
              </div>
              <!-- /.col-lg-4 (nested) -->
              <div class="col-lg-8">
              </div>
              <!-- /.col-lg-8 (nested) -->
            </div>
            <!-- /.row -->
            
          </div>
          <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
        <div class="panel panel-default">
          <div class="panel-heading">
            <i class="fa fa-clock-o fa-fw"></i> Responsive Timeline
          </div>
          <!-- /.panel-heading -->
          <div class="panel-body">
            
          </div>
          <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
      </div>
      <!-- /.col-lg-8 -->
      <div class="col-lg-4">
        <div class="panel panel-default">
          <div class="panel-heading">
            <i class="fa fa-bell fa-fw"></i> Notifications Panel
          </div>
          <!-- /.panel-heading -->
          <div class="panel-body">
          </div>
          <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
        <div class="panel panel-default">
          <div class="panel-heading">
            <i class="fa fa-bar-chart-o fa-fw"></i> Donut Chart Example
          </div>
          <div class="panel-body">
          </div>
          <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
        <div class="chat-panel panel panel-default">
          <div class="panel-heading">
            <i class="fa fa-comments fa-fw"></i> Chat
          </div>
          <!-- /.panel-heading -->
          <div class="panel-body">
          </div>
          <!-- /.panel-body -->
          <div class="panel-footer">
          </div>
          <!-- /.panel-footer -->
        </div>
        <!-- /.panel .chat-panel -->
      </div>
      <!-- /.col-lg-4 -->
    </div>
    <!-- /.row -->

    <?php include('footer.php'); ?>