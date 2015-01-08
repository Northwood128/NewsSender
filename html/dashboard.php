<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		
		    <!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame
		    Remove this if you use the .htaccess -->
		    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
			<script src="../js/dash.js"></script>
		    <title>Dashboard</title>
		
		    <meta name="viewport" content="width=device-width; initial-scale=1.0">
		
		    <!-- Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
		    <link rel="shortcut icon" href="../favicon.ico">
		    <link rel="apple-touch-icon" href="../apple-touch-icon.png">
		    
		    <!-- Link to Boostrap Core CSS -->
		    <link href="../bootstrap/css/bootstrap.css" rel="stylesheet" />
		    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
		    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
		    <link href="../css/dashboard-style.css" rel="stylesheet" />
		    <link type="text/css" href="../css/font-awesome-animation.min.css" rel="stylesheet" />
		    
		      <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		      <!--[if lt IE 9]>
		          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		      <![endif]-->
	</head>

	<body>
	    <nav class="navbar navbar-fixed-top" role="navigation"> <!-- Top Menu -->
	      <div class="container-fluid">
	        <div class="navbar-header">
	          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
	            <span class="sr-only">Toggle navigation</span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	          </button>
	          <a class="navbar-brand" href="dashboard.php"><img src="logo-placeholder.png" width="150" height="100"></a>
	        </div>
	        <div class="navbar-collapse collapse">
	          <div class="navbar-container">
				
			  
	          <ul class="nav nav-tabs navbar-right">
	            <li class="active"><a href="#">Dashboard</a></li>
	            <li><a href="#">Configuracion</a></li>
	            <li>
	            	<ul class="nav nav-tabs navbar-right" role="tablist">
					  <li class="dropdown">
					    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
					      Perfil <span class="caret"></span>
					    </a>
					    <ul class="dropdown-menu" role="menu">
					      <li><a href="">Personalizar</a></li>
					      <li><a href="./script/logout.php">Salir</a></li>
					    </ul>
					    
					  </li>
					</ul>
				</li>
	            <li><a href="#">Ayuda</a></li>
	          </ul>
	          <form class="navbar-form navbar-right">
	            <input type="text" class="form-control search-input" placeholder="Buscar...">
	          </form>
	          </div>
	        </div>
	      </div>
	    </nav>
		<div class="info-sidebar">
			<h4><span class="fa fa-info-circle"></span> Descripción: </h4>
			<span class ="desc" id="desc-campaign">Cree una campaña de correos que sera enviada a todos los suscriptos a su lista de clientes</span>
			<span class ="desc" id="desc-mail">Envie correos electronicos de manera individual, utilizando su direccion de correo personal</span>
			<span class ="desc" id="desc-config">Modifique la configuracion de la herramienta</span>
			<span class ="desc" id="desc-profile">Personalice los detalles de su cuenta particular</span>
			<span class ="desc" id="desc-stats">Estadisticas detalladas sobre las ultimas campañas realizadas</span>
			<span class ="desc" id="desc-help">Ayuda y documentación de la herramienta</span>
		</div>
	    <div class="container">

		  <div class="dashboard-tiles">
			<button type="button" id="campaign" class="btn btn-default btn-lg tile faa-parent animated-hover">
			  <span class="fa fa-mail-forward faa-shake animated-hover fa-4x"></span> <div>Crear Campaña</div>
			</button>
			<button type="button" id="mail" class="btn btn-default btn-lg tile faa-parent animated-hover">
			  <span class="fa fa-envelope faa-horizontal fa-4x"></span> <div>Enviar Correo</div>
			</button>
			<button type="button" id="config" class="btn btn-default btn-lg tile faa-parent animated-hover">
			  <span class="fa fa-gear faa-spin fa-4x"> </span> <div><a href="config.html">Configuración</a></div>
			</button>
			<button type="button" id="profile" class="btn btn-default btn-lg tile faa-parent animated-hover">
			  <span class="fa fa-user faa-pulse fa-4x"></span> <div>Perfil</div>
			</button>
			<button type="button" id="stats" class="btn btn-default btn-lg tile faa-parent animated-hover">
			  <span class="fa fa-line-chart faa-bounce fa-4x"></span> <div>Estadisticas</div>
			</button>
			<button type="button" id="help" class="btn btn-default btn-lg tile faa-parent animated-hover">
			  <span class="fa fa-info-circle faa-flash  fa-4x"></span> <div>Ayuda</div>
			</button>
		  </div>

		</div>
		<script src="../bootstrap/js/bootstrap.min.js"></script>
		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
		<script src="../bootstrap/js/ie10-viewport-bug-workaround.js"></script>
	</body>
</html>
