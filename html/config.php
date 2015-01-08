<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
		<meta charset="utf-8">
		
		    <!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame
		    Remove this if you use the .htaccess -->
		    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		    <script src="../js/jquery.min.js"></script>
		    <script type="text/javascript" charset="utf-8" src="tester/tester.js"></script>
		    <title>Configuracion</title>
		
		    <meta name="viewport" content="width=device-width; initial-scale=1.0">
		
		    <!-- Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
		    <link rel="shortcut icon" href="../favicon.ico">
		    <link rel="apple-touch-icon" href="../apple-touch-icon.png">
		    
		    <!-- Link to Boostrap Core CSS -->
		    <link href="../bootstrap/css/bootstrap.css" rel="stylesheet" />
		    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
		    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
		    <link href="../css/config-style.css" rel="stylesheet" />
		    <link type="text/css" href="../css/font-awesome-animation.min.css" rel="stylesheet" />
		    <link type="text/css" href="../css/font-awesome-corp.css" rel="stylesheet" />
		    
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
    <div class="container">

		<div class="config-tiles">
			<button type="button" id="users" class="btn btn-default btn-lg tile faa-parent animated-hover" data-toggle="modal" data-target="#adminUsuario">
			  <span class="fa fa-user faa-pulse fa-4x"></span> <div>Administrar usuarios</div>
			</button>
			<button type="button" id="amazon" class="btn btn-default btn-lg tile faa-parent animated-hover" data-toggle="modal" data-target="#amazonSettings">
			  <span class="fa icon-amazon-sign faa-tada fa-4x"></span> <div>Configuracion de Amazon</div>
			</button>
			<button type="button" id="appconfig" class="btn btn-default btn-lg tile faa-parent animated-hover" data-toggle="modal" data-target="#appConfig">
			  <span class="fa fa-gear faa-spin fa-4x"> </span> <div><a href="config.html">Configuración de la aplicacion</a></div>
			</button>
		  </div>
	<!-- Modal para agregar nuevos usuarios -->
	<div class="modal fade" id="adminUsuario">
	  <div class="modal-dialog">
	    <div class="modal-content">
	    	
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Cerrar</span></button>
	        <h4 class="modal-title">Agregar usuario:</h4>
	      </div>
	      
	      <div class="modal-body">
	      	<ul class="nav nav-pills nav-justified" role="tablist" id="usertabs">
			  <li class="active"><a href="#add" data-toggle="tab">Agregar usuarios</a></li>
			  <li><a href="#del" data-toggle="tab">Borrar usuario</a></li>
			  <li><a href="#mod" data-toggle="tab">Modificar usuario</a></li>
			</ul>
			<div class="tab-content">
				<div class="tab-pane fade in active" id="add">
					<form id="new-user-form" action="../script/new_user.php" method="post">
						
						<input type="email" name="new_user_mail" class="form-control" placeholder="Correo electronico" required autofocus />
						<input type="text" name="new_user_name" class="form-control" placeholder="Nombre" required autofocus />
						<input type="password" name="new_user_password" class="form-control" placeholder="Password" required>
						
						<span class="help-block">El password debe tener una longitud minima de 6 caracteres
							 y <strong>debe</strong> estar compuesto por caracteres de A-Z, a-z, 0 al 9 y opcionalmente simbolos(!"#$%&/()=?¡)</span>
							 
						<input type="password" name="check-pwd" class="form-control" placeholder="Confirme Password" required>
						
							
							<label for="user_select">Tipo de Usuario</label>
							<select class="form-control" id="user_select" name="new_user_class">
							  <option value="user" selected="selected">Usuario</option>
							  <option value="admin">Administrador</option>					  
							</select>
							<span class="help-block">El tipo de usuario determina el nivel de permisos que tendrá ese usuario</span>
							
						<div class="modal-footer">
					        <button type="button" id="close" class="btn btn-default" data-dismiss="modal">Cerrar</button>
					        <input type="submit" class="btn btn-primary" value="Guardar cambios"/>
				      	</div>
					</form>
				</div>
				<div class="tab-pane fade" id="del">
					<form id="del-user-form" action="../script/del_user.php" method="post">
						<label for="delinput">Usuario</label>
						<input type="text" name="new_user_name" class="form-control" placeholder="Usuario" id="delinput" required autofocus />
						
						<p class="bg-danger">Tenga en cuenta que esta accion es permanente</p>
							
						<div class="modal-footer">
					        <button type="button" id="close" class="btn btn-default" data-dismiss="modal">Cerrar</button>
					        <input type="submit" class="btn btn-primary" value="Borrar"/>
				      	</div>
					</form>
				</div>
				<div class="tab-pane fade" id="mod">
					<form id="del-user-form" action="../script/mod_user.php" method="post">
						<label for="modinput">Usuario</label>
						
						
							
						<div class="modal-footer">
					        <button type="button" id="close" class="btn btn-default" data-dismiss="modal">Cerrar</button>
					        <input type="submit" class="btn btn-primary" value="Borrar"/>
				      	</div>
					</form>
				</div>
			</div>
	      </div>

	    </div><!-- /.modal-content -->
	  </div><!-- /.modal-dialog -->
	</div><!-- /.modal -->

		<!-- Modal para configurar los parametros de AWS -->
	<div class="modal fade" id="amazonSettings">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Cerrar</span></button>
	        <h4 class="modal-title">Configuracion de Amazon:</h4>
	      </div>
	      <div class="modal-body">
	      	<ul class="nav nav-pills nav-justified" role="tablist" id="amazontabs">
			  <li class="active"><a href="#rds" data-toggle="tab">Amazon RDS</a></li>
			  <li><a href="#ses" data-toggle="tab">Amazon SES</a></li>
			</ul>
			<div class="tab-content">
				<div class="tab-pane fade in active" id="rds">
					<form id="rdsform" action="../script/save_config.php" method="post">
						<div class="form-group" id="rds-inputs">
							<label for="rdsendpoint">Endpoint: (sin :3306)</label>
							<input type="text" class="form-control" placeholder="Endpoint" name="rdsendpoint" id="rdsendpoint">
							
							<label for="rdsusername">Username:</label>
							<input type="text" class="form-control" placeholder="Username" name="rdsusername" id="rdsusername">  
							
							<label for="rdspassword">Password: </label>
							<input type="password" class="form-control" placeholder="Password" name="rdspassword" id="rdspassword">  
						</div>
						<input type="hidden" name="formid" value="rds">
						<div class="modal-footer">
							<!-- El boton test debe hacrer una llamada con Ajax a un script que instancia un objeto PDO
								con los datos del formulario y si la conexion es correcta, le agrega al boton la clase .green. 
								si la conexion falla, agrega la clase .red
								 -->
							<button type="button" id="test" class="btn btn-default">Probar!</button>
							<button type="button" id="close" class="btn btn-default" data-dismiss="modal">Cerrar</button>
					        <input type="submit" class="btn btn-primary" value="Guardar cambios"/>
						</div>
					</form>
				</div>
				<div class="tab-pane fade" id="ses">
					<p class="bg-danger">Utiliza esta opcion si NewsSender corre fuera de una instancia EC2.<br />
						Te recomendamos que leas este articulo. <a href="http://docs.aws.amazon.com/aws-sdk-php/guide/latest/credentials.html#instance-profile-credentials" target="_blank" alt="Configuracion del cliente de AWS SDK">Configuracion del cliente de AWS SDK</a>
					</p>
				  	<form id="sesform" action="../script/save_config.php" method="post">
						<div class="form-group" id="rds-inputs">
							<label for="awsak">AWS Access Key</label>
							<input type="text" class="form-control" placeholder="AWS Access Key" name="awsak" id="awsak">
							
							<label for="awssk">AWS Secret Key</label>
							<input type="password" class="form-control" placeholder="AWS Secret Key" name="awssk" id="awssk">
						</div>
						<input type="hidden" name="formid" value="ses">
						<div class="modal-footer">
							<button type="button" id="close" class="btn btn-default" data-dismiss="modal">Cerrar</button>
					        <input type="submit" class="btn btn-primary" value="Guardar cambios"/>
						</div>
					</form>
				</div>				  			
			</div>
	      </div>

	    </div><!-- /.modal-content -->
	  </div><!-- /.modal-dialog -->
	</div><!-- /Amazon.modal -->
	
	<div class="modal fade" id="appConfig">
	  <div class="modal-dialog">
	    <div class="modal-content">
	    	
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Cerrar</span></button>
	        <h4 class="modal-title">Agregar usuario:</h4>
	      </div>
	      
	      <div class="modal-body">
	      	<ul class="nav nav-pills nav-justified" role="tablist" id="usertabs">
			  <li class="active"><a href="#add" data-toggle="tab">Agregar usuarios</a></li>
			  <li><a href="#del" data-toggle="tab">Borrar usuario</a></li>
			  <li><a href="#mod" data-toggle="tab">Modificar usuario</a></li>
			</ul>
			<div class="tab-content">
				<div class="tab-pane fade in active" id="add">
					<form id="new-user-form" action="../script/new_user.php" method="post">
						
						<input type="email" name="new_user_mail" class="form-control" placeholder="Correo electronico" required autofocus />
						<input type="text" name="new_user_name" class="form-control" placeholder="Nombre" required autofocus />
						<input type="password" name="new_user_password" class="form-control" placeholder="Password" required>
						
						<span class="help-block">El password debe tener una longitud minima de 6 caracteres
							 y <strong>debe</strong> estar compuesto por caracteres de A-Z, a-z, 0 al 9 y opcionalmente simbolos(!"#$%&/()=?¡)</span>
							 
						<input type="password" name="check-pwd" class="form-control" placeholder="Confirme Password" required>
						
							
							<label for="user_select">Tipo de Usuario</label>
							<select class="form-control" id="user_select" name="new_user_class">
							  <option value="user" selected="selected">Usuario</option>
							  <option value="admin">Administrador</option>					  
							</select>
							<span class="help-block">El tipo de usuario determina el nivel de permisos que tendrá ese usuario</span>
							
						<div class="modal-footer">
					        <button type="button" id="close" class="btn btn-default" data-dismiss="modal">Cerrar</button>
					        <input type="submit" class="btn btn-primary" value="Guardar cambios"/>
				      	</div>
					</form>
				</div>
				<div class="tab-pane fade" id="del">
					<form id="del-user-form" action="../script/del_user.php" method="post">
						<label for="delinput">Usuario</label>
						<input type="text" name="new_user_name" class="form-control" placeholder="Usuario" id="delinput" required autofocus />
						
						<p class="bg-danger">Tenga en cuenta que esta accion es permanente</p>
							
						<div class="modal-footer">
					        <button type="button" id="close" class="btn btn-default" data-dismiss="modal">Cerrar</button>
					        <input type="submit" class="btn btn-primary" value="Borrar"/>
				      	</div>
					</form>
				</div>
				<div class="tab-pane fade" id="mod">
					<form id="del-user-form" action="../script/mod_user.php" method="post">
						<label for="modinput">Usuario</label>
						
						
							
						<div class="modal-footer">
					        <button type="button" id="close" class="btn btn-default" data-dismiss="modal">Cerrar</button>
					        <input type="submit" class="btn btn-primary" value="Borrar"/>
				      	</div>
					</form>
				</div>
			</div>
	      </div>

	    </div><!-- /.modal-content -->
	  </div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
    </div><!-- /container -->
    
    
    
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <script>
    $('#tabbes a').click(function(e) {
  		e.preventDefault();
  		$(this).tab('show');
	});
    </script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../bootstrap/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
