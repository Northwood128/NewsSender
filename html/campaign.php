<?php
 
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		
		    <!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame
		    Remove this if you use the .htaccess -->
		    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		    <script src="../js/creator.js"></script>
		    <script src="../ckeditor/ckeditor.js"></script>
		    <title>Crear campaña</title>
		
		    <meta name="viewport" content="width=device-width; initial-scale=1.0">
		
		    <!-- Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
		    <link rel="shortcut icon" href="../favicon.ico">
		    <link rel="apple-touch-icon" href="../apple-touch-icon.png">
		    
		    <!-- Link to Boostrap Core CSS -->
		    <link href="../bootstrap/css/bootstrap.css" rel="stylesheet" />
		    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
		    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
		    <link href="../css/campaign-style.css" rel="stylesheet" />
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
	    </nav> <!-- End Top Menu -->
	    
	    <div class="container">
	    	<h1>Creador de campañas</h1>
	    	
		    	<form id="creator" action="../script/sendMail.php" method="post">
		    		<div class="container" id="ck-container">
		    			
			    		<div id="mailInputs">
				    		<p>
					    		<label for="subject">Asunto</label>
					    		<input type="text" class="form-control" placeholder="Asunto" name="subject" id="subject" />
					    	</p>
					    	
					    	<p>	
					    		<label for="mailBody">Cuerpo</label>
					    		<textarea placeholder="Redacte su correo aqui" name="mailBody" id="mailBody" class="ckeditor form-control"></textarea>
					    	</p>
					    	<div class="btn-group">
			    				<input type="submit" value="Enviar!" alt="Enviar!" title="Enviar!" class="btn btn-primary"/>
			    			</div>
				    	</div>
				    	
			    	</div>
			    	<div class="container" id="additionalInputs-container">
			    		<div id="additionalInputs">
				    		<label for="test">Email de prueba</label>
				    		<textarea cols="25" rows="2" placeholder="Mails de prueba" name="test" id="test" class="form-control">
				    		</textarea>
				    		
				    		<div class="radio">
				    			<h4>A quienes va dirigido este correo?</h4>
				    			<label>
				    				<input type="radio" name="who" value="all" id="optionalRadio1" checked="checked" />
				    				Enviar a todos
				    			</label>
				    		</div>
				    		
				    		<div class="radio">
				    			<label>
				    				<input type="radio" name="who" value="these" id="optionalRadio2" />
				    				Solo a estos:
				    			</label>
				    		</div>
				    		<div class="only-these">
				    			<textarea cols="25" rows="2" placeholder="Mails de prueba" name="these" id="these" class="form-control" disabled>
				    			</textarea>
			    			</div>
				    	</div>
			    	</div>
		    	</form>
			</div>
	    
	</body>
</html>
