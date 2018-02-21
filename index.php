<!-- hola panchito -->
<html>
<head>
	<title>SAM</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<link rel="stylesheet" href="vendor/framewoks/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
	<link rel="stylesheet" href="vendor/alertifyjs/css/alertify.min.css">
	<link href="https://fonts.googleapis.com/css?family=Rammetto+One" rel="stylesheet">
	<link rel="stylesheet" href="vendor/css/index.css">
	<link rel="stylesheet" href="vendor/css/forms.css">
	<link rel="shortcut icon"  href="vendor/img/logo-mini.png">
	<style>
		.escrito {
			text-align: justify;
			overflow-y: scroll;
			padding: 10px;
			border: 1px solid #000;
			height: 150px;
			font-size: 12px;
			margin-bottom: 20px;
		}
		.escrito h1{
			font-size: 14px;
		}
	</style>
</head>
<body lang="es">
		<nav id="nav" class="navbar navbar-expand-sm  fixed-top">
			<div class="container">
				<a class="navbar-brand" href="index.php">SAM</a>
				<button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#nav-index" >
	        <span class="sr-only">Boton</span><i class="fa fa-bars"></i>
	      </button>
	      <div class="collapse navbar-collapse" id="nav-index">
					<ul class="nav navbar-nav">
	          <li><a class="page-scroll" href="#como-funciona">&iquest;COMO FUNCIONA?</a></li>
						<li><a class="page-scroll" href="#paquetes">PAQUETES</a></li>
						<li><a class="page-scroll" href="#contactanos">CONTACTANOS</a></li>
						<li><a class="page-scroll" href="login.php">LOGIN</a></li>
	        </ul>
			  </div>
			</div>
		</nav>
		<div class="inicio">
			<div class="container">
				<div class="row">
					<div class="col-lg-6">
						<div class="titulo">
							<h1><img src="vendor/img/logo.png"></h1>
							<hr>
							<h4>Sociedad de Ayuda Mutua</h4>
						</div>

					</div>
					<div class="col-lg-6">
						<div class="registrar">
							<h1>Registro Rapido</h1>
							<div class="row">
								<div class="col-sm-6">
										<input id="nombres" type="text" class="control" placeholder="Nombres">
								</div>
								<div class="col-sm-6">
										<input id="apellidos" type="text" class="control" placeholder="Apellidos">
								</div>
								<div class="col-sm-12">
										<input id="email" type="text" class="control" placeholder="Email">
								</div>
								<div class="col-sm-6">
										<input id="dni" type="text" class="control" placeholder="DNI">
								</div>
								<div class="col-sm-6">
										<input id="celular" type="text" class="control" placeholder="celular">
								</div>
								<div class="col-sm-12">
									<div class="escrito">
										<?php include 'terminos-condiciones.php' ?>
									</div>
								</div>
								<div class="col-sm-12">
									<input id="terminos" type="checkbox"> Aceptar terminos y condiciones
								</div>
								<div class="col-sm-12">
										<button id="registrar" class="control bon-primario">REGISTRAR</button>
								</div>
							</div>
						</div>
					</div>
				</div>
		</div>
	</div>
		<section >
			<div class="container">
				<div class="row">
					<div id="noticias" class="col-sm-4">
						<h1 style="">NOTICIAS</h1>
						<img src="vendor/img/baner.jpg">
					</div>
					<div id="cuenta" class="col-sm-8">
						<h2>CUENTA CORRIENTE</h2>
						<h6>En Dolares</h6>
						<h4>CRIPTO INKA WORLD</h4>
						<div class="numerocuenta">
							<img src="vendor/img/bcp.png" alt="">
							<h6>290 2488682 0 92</h6>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section id="como-funciona" class="gris-claro">
			<div class=container>
				<div class="row">
					<div class="col-sm-6">
						<h1>¿Que es SAM?</h1>
				    <p>
				    Es una comunidad de apoyo solidario que se ayudan mutuamente de forma libre
				    y voluntaria, sin presión ni obligación; unidas entre si para superar la desigualdad
				    social y generar un nuevo estilo de vida diferente.
				    </p>
					</div>
					<div class="col-sm-6">
						<h1>Objetivo</h1>
				    <p>
				    Ayudar a todos los emprendedores del Perú a impulsar sus negocios a través
				    de la financiación solidaria que fomenta el emprendimiento del peruano, esto
				    genera mas progreso, con una educación financiera que le permitirá saber cuales
				    son las nuevas tendencias de mercado en una sociedad cada vez mas competitiva.
				    </p>
					</div>
				</div>
		  </div>
		</section>
		<section id=paquetes>
		  <div class=container>
		    <h1>PAQUETES DE INVERSIÓN</h1>
				<table class="table table-bordered">
					<thead>
						<tr>
							<td>Paquetes</td>
							<td>1° Mes</td>
							<td>2° Mes</td>
							<td>3° Mes</td>
							<td>4° Mes</td>
							<td>5° Mes</td>
							<td>6° Mes</td>
							<td>1° - 6° Mes</td>
						</tr>
					</thead>
					<tr>
						<td>$ 200</td>
						<td>$ 40</td>
						<td>$ 40</td>
						<td>$ 40</td>
						<td>$ 40</td>
						<td>$ 40</td>
						<td>$ 40</td>
						<td>$ 40 x Mes</td>
					</tr>
					<tr>
						<td>$ 300</td>
						<td>$ 60</td>
						<td>$ 60</td>
						<td>$ 60</td>
						<td>$ 60</td>
						<td>$ 60</td>
						<td>$ 60</td>
						<td>$ 60 x Mes</td>
					</tr>
					<tr>
						<td>$ 500</td>
						<td>$ 100</td>
						<td>$ 100</td>
						<td>$ 100</td>
						<td>$ 100</td>
						<td>$ 100</td>
						<td>$ 100</td>
						<td>$ 100 x Mes</td>
					</tr>
					<tr>
						<td>$ 1000</td>
						<td>$ 200</td>
						<td>$ 200</td>
						<td>$ 200</td>
						<td>$ 200</td>
						<td>$ 200</td>
						<td>$ 200</td>
						<td>$ 200 x Mes</td>
					</tr>
				</table>
		  </div>
		</section>
		<section id="contactanos" class="gris-claro contactanos">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-4">
					<div class="preguntas">
						<h5>¿Tienes una pregunta?</h5>
						<h5>¿Alguna Solicitud?</h5>
						<h5>¿Quieres decir Hola?</h5>
						<p>¡Escríbenos y te responderemos tan pronto podamos!</p>
					</div>
					<!--inicio de seccion de redes-->
					<div class="redes-inf">
						<!--div class="row">
							<div class="col-sm-4 col-4">
								<span>escríbenos:</span>
							</div>
							<div class="col-sm-8 social col-6">
								<div class="flecha"></div>
								<div class="nube">999 999 999</div>
								<a class="" >
									<i class="fa fa-whatsapp"></i>
								</a>
							</div>
						</div>
						<!--div class="row">
							<div class="col-sm-4 col-4">
								<span>síguenos:</span>
							</div>
							<div class="col-sm-8 social col-6">
								<a class="" href="#">
									<i class="fa fa-twitter"></i>
								</a>
								<a class="" target="_blank" href="https://www.facebook.com/lucami8?fref=ts">
									<i class="fa fa-facebook-official"></i>
								</a>
								<a class="" target="_blank" href="https://www.instagram.com/lucami8/">
									<i class="fa fa-instagram"></i>
								</a>
								<a class="" target="_blank" href="https://www.behance.net/lucami8">
									<i class="fa fa-behance"></i>
								</a>
							</div>
						</div-->
					</div>
					<!--fin de seccion de redes-->
				</div>
				<div id="mensajes" class="col-lg-8 col-md-8">
					<div  class="mensaje">
						<div class="row form-group has-success">
							<div class="col-sm-6">
								<label>Nombre / Name</label>
								<input id="txtnombre" type="text" name="" class="form-control form-control-warning" placeholder="escriba aquí">
							</div>
							<div class="col-sm-6">
								<label>Correo / email</label>
								<input id="txtemail" type="email" name="" class="form-control" placeholder="example@correo.com">
							</div>
						</div>
						<div class="row form-group">
							<div class="col-sm-3"></div>
							<div class="col-sm-6">
								<label>Teléfono / Phone</label>
								<input id="txttelefono" type="text" name="" class="form-control" placeholder="999 999 999">
							</div>
							<div class="col-sm-3"></div>
							<div class="col-sm-12">
								<label>Mensaje / Message</label>
								<textarea id="txtmensaje" rows="6" class="form-control"></textarea>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12 right">
								<button id="btnenviar" class="btn btn-black">Enviar</button>
							</div>
						</div>
						<div id="mostrar"></div>
					</div>
				</div>
				<div style="text-align:center" class="col-12">
					<br>
					<i class="fa fa-copyright"></i> 2018 ciwsam & Desarrollo 21 - <a href="terminos-condiciones.php">Términinos y condiciones</a>
				</div>
			</div>
		</div>
	</section>
</body>
<script type="text/javascript" src="vendor/framewoks/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="vendor/framewoks/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="vendor/alertifyjs/alertify.min.js"></script>
<script type="text/javascript" src="vendor/js/index.js"></script>
<script type="text/javascript" src="vendor/js/enviar.js"></script>
</html>
