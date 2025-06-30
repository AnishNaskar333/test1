<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
	<meta name="author" content="Metawireco">
	<meta name="keywords"
		content="Metawireco, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="shortcut icon" href="<?= base_url('assets/img/icons/icon-48x48.png'); ?>" />

	<link rel="canonical" href="https://demo-basic.Metawireco.io/pages-sign-in.html" />

	<title>Sign In | Metawire.co</title>

	<link href="<?= base_url('assets/scss/app.css'); ?>" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>
	<main class="d-flex w-100">
		<div class="container d-flex flex-column">
			<div class="row vh-100">
				<div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
					<div class="d-table-cell align-middle">
						<div class="text-center mt-4">
							<h1 class="h2">Welcome back</h1>
							<p class="lead">
								Sign in to your account to continue
							</p>
						</div>
						<div class="card">
							<div class="card-body">
								<?php if(isset($error)): ?>

									<div class="alert alert-danger text-danger"><?= $error; ?></div>
								<?php endif; ?>

								<div class="m-sm-4">
									<form action="<?= base_url('login/admin_login')?>" method="post">
										<div class="mb-3">
											<label class="form-label">Email</label>
											<input class="form-control form-control-lg" type="email" name="email"
												placeholder="Enter your email" required/>
										</div>
										<div class="mb-3">
											<label class="form-label">Password</label>
											<input class="form-control form-control-lg" type="password" name="password"
												placeholder="Enter your password" required/>
											<small>
												<a href="javascript:void()">Forgot password?</a>
											</small>
										</div>
										<div>
											<label class="form-check">
												<input class="form-check-input" type="checkbox" value="remember-me"
													name="remember-me" checked>
												<span class="form-check-label">
													Remember me next time
												</span>
											</label>
										</div>
										<div class="text-center mt-3">
											<input type="submit" name="submit" class="btn btn-lg btn-primary" value="Sign in">
											<!-- <a href="dashboard.html" class="btn btn-lg btn-primary">Sign in</a> -->
										</div>
									</form>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</main>

	<script src="<?= base_url('assets/js/app.js'); ?>"></script>

</body>

</html>