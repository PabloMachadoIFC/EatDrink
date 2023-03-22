<?php 
    require_once "../../../conf/Conexao.php";
    include '../header.php'; 

	//var_dump($_SESSION);

	$user = $_SESSION['usuario'];
	$conexao = Conexao::getInstance();
	$consulta=$conexao->query("SELECT * FROM `usuario` WHERE usuario = '$user';");
	$linha=$consulta->fetch(PDO::FETCH_ASSOC);
	$conexao = Conexao::getInstance();

	$conexaoB = Conexao::getInstance();
	$consultaB=$conexaoB->query("SELECT estabelecimento.nome as NomeEstabelecimento, estiloculinaria.descricao as NomeCulinaria FROM estabelecimento LEFT JOIN estiloculinaria ON estabelecimento.estiloculinaria = estiloculinaria.codigo;");
	$linhaB=$consultaB->fetch(PDO::FETCH_ASSOC);
	$conexaoB = Conexao::getInstance();

?>

	<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
	<link rel='stylesheet' href='//cdn.muicss.com/mui-0.9.17/css/mui.min.css'><link rel="stylesheet" href="./style.css">
		<br>
	<div class="panel panel-default">
        <div class="panel-heading"><i class="fa fa-bar-chart-o fa-fw"></i>Perfil Cliente</div>
        	<div class="panel-body">
			<!-- partial:index.partial.html -->
			<div id="perfil">
				<!-- Capa do Perfil -->
				<div class="header">
					<!-- Botão "Alterar Fundo" -->
					<button class="mui-btn">
						<div class="text">ALTERAR FUNDO</div>
						<i class="fa fa-picture-o" aria-hidden="true"></i>
					</button>
				</div>

				<!-- Avatar do Utilizador -->
				<div class="avatar">
				</div>
						
				<!-- Opções de Conta -->
				<div class="">
					<center>
						<!-- Botão "Editar Perfil" -->
						<button class="mui-btn mui-btn--primary">
							<div class="text">ALTERAR FOTO</div>
						</button>

					</center>
				</div>

				<!-- Título do Perfil -->
				<div class="tituloperfil">
					<!-- Nome do Utilizador -->
					<h1><?php
						$nome = explode(" ",$linha['nome']);
						echo $nome[0]; ?>
					</h1>
					<div class="bigbriefing">
						<!-- Briefing do Candidato -->
						<p>
							<b>Idade:</b>
							<?php 
								$Data = $linha['dataNascimento'];
								//var_dump($Data);
								$dataNascimento = ($Data);
								$date = new DateTime($dataNascimento );
								$interval = $date->diff( new DateTime( date('Y-m-d') ) );
								if ($interval = '0000-00-00') {
									echo "Não Cadastrado! ";
								}else {
									echo $interval->format( '%Y anos' );
								}
								
							?>
								<b>|</b>
							<b>Distrito:</b>Porto 
								<b>|</b>
							<b>Tipo Usuário:</b> (<?php echo $linha['tipoUsuario_codigo']; ?>)
						</p>
					</div>
				</div><br/>

				<div class="infocandidato">
					<form class="mui-form">

						<h1 class="title-2">Sobre o Candidato</h1>

						<div class="mui-textfield mui-textfield--float-label">
							<textarea>Apresente-se à comunidade com um pequeno texto a falar um pouco mais sobre si.</textarea>
						</div>
						<br/>

						<h1 class="title-2">Estabelecimentos</h1>

						<center>
							<div class="expsoftware">
								
								<div class="software 1">
									<img src="https://th.bing.com/th/id/OIP.b8TwWX3AxqOQReIP4Vnz6AHaE8?pid=ImgDet&rs=1" />
									<?php 
										
										echo "<br/><span><b>{$linhaB['NomeEstabelecimento']}</b><br>{$linhaB['NomeCulinaria']}</span><br/>"

									?>
									
									<i class="fa fa-star" aria-hidden="true"></i>
									<i class="fa fa-star" aria-hidden="true"></i>
									<i class="fa fa-star" aria-hidden="true"></i>
									<div class="exp 1">
										<b>AVANÇADO</b>
									</div>
								</div>
							<!-- Softwares do Utilizador
								<div class="software 2">
									<img src="https://s17.postimg.org/pjkevegkv/image.png" />
									<br/><span><b>AUTODESK</b><br>NAVISWORKS</span><br/>
									<i class="fa fa-star" aria-hidden="true"></i>
									<i class="fa fa-star-o" aria-hidden="true"></i>
									<i class="fa fa-star-o" aria-hidden="true"></i>
									<div class="exp 2">
										<b>BÁSICO</b>
									</div>
								</div>

								<div class="software 3">
									<img src="https://s17.postimg.org/ttz2qzlnz/image.png " />
									<br/><span><b>TEKLA</b><br>STRUCTURES</span><br/>
									<i class="fa fa-star" aria-hidden="true"></i>
									<i class="fa fa-star" aria-hidden="true"></i>
									<i class="fa fa-star-o" aria-hidden="true"></i>
									<div class="exp 3">
										<b>INTERMÉDIO</b>
									</div>
								</div>
								 -->
							</div>
						</center><br/><br>

						<h1 class="title-2">Informação do Candidato</h1>

						<div class="mui-textfield mui-textfield--float-label">
							<input type="text" value="<?php echo $linha['nome']; ?>">
							<label>Nome Completo</label>
						</div>

						<div class="mui-textfield mui-textfield--float-label">
							<input type="text" value="Desenhador">
							<label>Função que Exerce</label>
						</div>

						<div class="mui-select">
							<select>
								<option>Option 1</option>
								<option>Option 2</option>
								<option>Option 3</option>
								<option>Option 4</option>
							</select>
							<label>Distrito Onde Reside</label>
						</div><br/>

						<h1 class="title-2">Informação Pessoal</h1>

						<div class="mui-textfield mui-textfield--float-label">
							<input type="text" value="<?php echo $linha['email']; ?>">
							<label>Endereço de Email</label>
						</div>

						<div class="mui-textfield mui-textfield--float-label">
							<input type="text" value="<?php echo $linha['telefone']; ?>">
							<label>Número de Telefone</label>
						</div><br/>

						<button class="mui-btn mui-btn--raised">Alterar a Password</button>
						<button type="submit" class="mui-btn mui-btn--raised mui-btn--primary">Guardar Alterações</button>
					</form>
				</div> <br><br>
			</div>
		</div>
	</div>
  <script src='//cdn.muicss.com/mui-0.9.17/js/mui.min.js'></script>

<?php include('../footer.php'); ?>