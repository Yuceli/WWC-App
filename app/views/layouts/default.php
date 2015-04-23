<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Women Who Code</title>

	<!-- Bootstrap CSS -->
	<link href="//netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body>
	<div class="wrapper">
		<nav class="navbar navbar-inverse navbar-fixed-top">
			<div class="container">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navigation">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand text-uppercase" href="<?= URL::to() ?>">Women Who Code</a>
				</div>

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="navigation">
					<ul class="nav navbar-nav navbar-right">
						<?php if(Session::read('user.role') === 'admin'): ?>

							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Acciones <span class="caret"></span></a>
								<ul class="dropdown-menu" role="menu">
									<li><a href="<?= URL::to('users.index') ?>">Ver todos los usuarios</a></li>
									<li><a href="<?= URL::to('users.add') ?>">Añadir nuevo usuario</a></li>
									<li class="divider"></li>
									<li><a href="<?= URL::to('workshops.add') ?>">Añadir nuevo taller</a></li>
								</ul>
							</li>

						<?php endif; ?>
						<?php if(Session::has('user.email')): ?>
							<li><a href="<?= URL::to('session.logout') ?>">Sign out</a></li>
						<?php else: ?>	
							<li><a href="<?= URL::to('session.login') ?>">Sign in</a></li>
						<?php endif; ?>
						<li><p class="navbar-text"><?= Session::read('user.email') ?></p></li>
					</ul>
				</div>
			</div>
		</nav>



		<div id="wrapper">
			<?php include $view; ?>
		</div>
	</div>

	<div class="container-fluid footer">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div class="pull-right">Todos los derechos reservados &copy; 2015 - WWC</div>
			</div>
		</div>
	</div>
	<!-- jQuery -->
	<script src="//code.jquery.com/jquery.js"></script>
	<!-- Bootstrap JavaScript -->
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
</body>
</html>