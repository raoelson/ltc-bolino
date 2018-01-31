<!DOCTYPE html>
<html lang="fr">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<!-- Meta, title, CSS, favicons, etc. -->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>LTC-BOLINO | Login Page</title>

<!-- Bootstrap -->
<link
	href="<?php echo base_url() ?>assets/backend/vendors/bootstrap/dist/css/bootstrap.min.css"
	rel="stylesheet">
<!-- Font Awesome -->
<link
	href="<?php echo base_url() ?>assets/backend/vendors/font-awesome/css/font-awesome.min.css"
	rel="stylesheet">
<!-- NProgress -->
<link
	href="<?php echo base_url() ?>assets/backend/vendors/nprogress/nprogress.css"
	rel="stylesheet">
<!-- Animate.css -->
<link
	href="<?php echo base_url() ?>assets/backend/vendors/animate.css/animate.min.css"
	rel="stylesheet">

<!-- Custom Theme Style -->
<link href="<?php echo base_url() ?>assets/backend/css/custom.css"
	rel="stylesheet">
</head>

<body class="login">
	<div>
		<a class="hiddenanchor" id="signup"></a> <a class="hiddenanchor"
			id="signin"></a>

		<div class="login_wrapper">
			<div class="animate form login_form">
				<section class="login_content">
					<form method="post" action="<?php echo base_url('admin.php/user_verify');?>">
						<h1>Authentification</h1>
              <?php													
					if ($this->session->flashdata ( 'errors' )) {
						echo '<div class="alert alert-danger">';
						echo $this->session->flashdata ( 'errors' );
						echo "</div>";
					}				
			   ?>
              <div>
							<input type="text" name="login" class="form-control"
								placeholder="Login " />
						</div>
						<div>
							<input type="password" class="form-control"
								placeholder="Mot de passe" name="motdepasse"  />
						</div>
						<div>
							<button class="btn btn-default submit" type="submit"><i
								class="fa fa-key"></i> Connexion </button> 
								<a class="reset_pass"
								href="#">Mot de passe oublié?</a>
						</div>

						<div class="clearfix"></div>

						<div class="separator">
							<p class="change_link">
								<a href="#signup" class="to_register"> Nouveau sur le site <i
									class="fa fa-arrow-right"></i></a>
							</p>

							<div class="clearfix"></div>

						</div>
					</form>
				</section>
			</div>

			<div id="register" class="animate form registration_form">
				<section class="login_content">
					<form>
						<h1>Nouvel utilisateur</h1>
						<div>
							<input type="text" class="form-control" placeholder="Username"
								required="" />
						</div>
						<div>
							<input type="email" class="form-control" placeholder="Email"
								required="" />
						</div>
						<div>
							<input type="password" class="form-control"
								placeholder="Password" required="" />
						</div>
						<div>
							<a class="btn btn-default submit" href="index.html">S'enregister</a>
						</div>

						<div class="clearfix"></div>

						<div class="separator">
							<p class="change_link">
								<a href="#signin" class="to_register"><i
									class="fa fa-arrow-left"></i> Retour à la page
									d'authentification </a>
							</p>

							<div class="clearfix"></div>
							<br />

							<div>
								<h1>LTC-BOLINO</h1>

							</div>
						</div>
					</form>
				</section>
			</div>
		</div>
	</div>
</body>
</html>
